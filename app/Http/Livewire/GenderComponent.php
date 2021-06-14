<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use Livewire\Component;

class GenderComponent extends Component
{
    public $genders;

    public $selectedGender = null;

    public function mount($selectedGender = null) {
        $this->genders = Gender::all();
        if (!is_null($selectedGender)) {
            $this->selectedGender = $selectedGender;
        }
    }

    public function render()
    {
        return view('livewire.gender-component');
    }
}
