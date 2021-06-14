<?php

namespace App\Http\Livewire;

use App\Models\AnimalType;
use Livewire\Component;

class AnimalTypeComponent extends Component
{
    public $types;

    public $selectedType = null;

    public function mount($selectedType = null) {
        $this->types = AnimalType::all();
        if (!is_null($selectedType)) {
            $this->selectedType = $selectedType;
        }
    }

    public function render()
    {
        return view('livewire.animal-type-component');
    }
}
