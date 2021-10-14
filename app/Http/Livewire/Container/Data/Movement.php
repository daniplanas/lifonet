<?php

namespace App\Http\Livewire\Container\Data;

use App\Models\Container;
use App\Models\ContainerDistance;
use App\Models\ContainerInclination;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

class Movement extends Component
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

        $containerValues = ContainerInclination::where('container_id',$this->containerId);
        if(($this->from != '')&&($this->to != '')){
            $containerValues->whereBetween('created_at',[$this->from,$this->to]);
        }
        $containerValuesComplete = (clone $containerValues)->orderBy('created_at','desc')->limit(100)->get();
        $inclinationChart = (new LineChartModel())
            ->setAnimated(false)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setDataLabelsEnabled(true);
        foreach($containerValuesComplete as $item){
            $inclinationChart->addPoint($item->created_at->format('d/m/Y'), $item->temperature, '#1ebabd');
        }

        return view('livewire.container.data.movement',[
            'inclinations' => $containerValues->orderBy('created_at','desc')->simplePaginate(10),
            'inclinationChart' => $inclinationChart
        ]);

    }
}
