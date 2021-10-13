<?php

namespace App\Http\Livewire\Container;

use App\Models\Container;
use Livewire\Component;
use Mockery\Matcher\Contains;

class Table extends Component
{
    public $searchTerm = '';
    public function render()
    {
        $containers = Container::query();
        if($this->searchTerm != ''){
            $containers->where('code','like','%'.$this->searchTerm.'%')
                ->orWhere('city','like','%'.$this->searchTerm.'%')
                ->orWhere('state','like','%'.$this->searchTerm.'%')
                ->orWhere('address','like','%'.$this->searchTerm.'%');
        }

        return view('livewire.container.table',[
            'containers' => $containers->orderBy('created_at')->paginate(10),
        ]);
    }
}
