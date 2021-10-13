<?php

namespace App\Http\Livewire\Container;

use App\Models\Container;
use Livewire\Component;

class Data extends Component
{
    public $container;
    public function mount(Container $container)
    {
        $this->container = $container;
    }
    public function render()
    {
        return view('livewire.container.data');
    }
}
