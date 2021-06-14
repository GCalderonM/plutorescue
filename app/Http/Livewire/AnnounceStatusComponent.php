<?php

namespace App\Http\Livewire;

use App\Models\AnnounceStatus;
use Livewire\Component;

class AnnounceStatusComponent extends Component
{
    public $statuses;

    public $selectedStatus = null;

    public function mount($selectedStatus = null) {
        $this->statuses = AnnounceStatus::all();
        if (!is_null($selectedStatus)) {
            $this->selectedStatus = $selectedStatus;
        }
    }

    public function render()
    {
        return view('livewire.announce-status-component');
    }
}
