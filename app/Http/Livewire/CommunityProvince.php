<?php

namespace App\Http\Livewire;

use App\Models\Community;
use App\Models\Province;
use Livewire\Component;

class CommunityProvince extends Component
{
    public $communities;
    public $provinces;

    public $selectedCommunity = null;
    public $selectedProvince = null;

    public function mount($selectedCommunity = null) {
        $this->communities = Community::all()->sortBy('name');
        $this->provinces = collect();

        if (!is_null($selectedCommunity)) {
            $province = Province::with('community')->find($selectedCommunity);
            if ($province) {
                $this->provinces = Province::where('community_id', $province->community->id)->get();
                $this->selectedCommunity = $province->community->id;
                $this->selectedProvince = $province->id;
            }
        }
    }

    public function render()
    {
        return view('livewire.community-province');
    }

    public function updatedSelectedCommunity($community) {
        $this->provinces = Province::where('community_id', $community)->get();
    }
}
