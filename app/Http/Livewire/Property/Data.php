<?php

namespace App\Http\Livewire\Property;

use App\Models\Property;
use Livewire\Component;

class Data extends Component
{
    public $property;
    public function mount(Property $property)
    {
        $this->property = $property;
    }
    public function render()
    {
        return view('livewire.property.data');
    }
}
