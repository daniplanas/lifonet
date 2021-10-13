<?php

namespace App\Http\Livewire\Property;

use App\Models\Property;
use Livewire\Component;

class Table extends Component
{
    public $searchTerm = '';
    public function render()
    {
        $properties = Property::query();
        if($this->searchTerm != ''){
            $properties->where('id','like','%'.$this->searchTerm.'%')
                ->orWhere('city','like','%'.$this->searchTerm.'%')
                ->orWhere('state','like','%'.$this->searchTerm.'%')
                ->orWhere('address','like','%'.$this->searchTerm.'%');
        }

        return view('livewire.property.table',[
            'properties' => $properties->orderBy('created_at')->paginate(10),
        ]);
    }
}
