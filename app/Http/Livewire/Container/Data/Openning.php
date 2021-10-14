<?php

namespace App\Http\Livewire\Container\Data;

use App\Models\ContainerDistance;
use App\Models\ContainerOpenning;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Openning extends Component
{
    public $containerId = null;
    public $from = '';
    public $to = '';
    public function mount($containerId)
    {
        $this->containerId = $containerId;
    }
    public function render()
    {
        $containerValues = ContainerOpenning::where('container_id',$this->containerId);
        if(($this->from != '')&&($this->to != '')){
            $containerValues->whereBetween('created_at',[$this->from,$this->to]);
        }
        $containerValuesComplete = (clone $containerValues)->orderBy('created_at','desc')->limit(100)->get();
        return view('livewire.container.data.openning',[
            'opennings' => $containerValues->orderBy('created_at','desc')->simplePaginate(10),
        ]);
    }
}
