<?php

namespace App\Http\Livewire\Container\Data;

use App\Models\Container;
use App\Models\ContainerDistance;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

class Distance extends Component
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
        $containerValues = ContainerDistance::where('container_id',$this->containerId);
        if(($this->from != '')&&($this->to != '')){
            $containerValues->whereBetween('created_at',[$this->from,$this->to]);
        }
        $containerValuesComplete = (clone $containerValues)->orderBy('created_at','desc')->limit(10)->get();
        $distancesChart = (new lineChartModel())
            ->setAnimated(false)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setDataLabelsEnabled(true);
        foreach($containerValuesComplete->reverse() as $item){
            $distancesChart->addPoint($item->created_at->format('d/m/Y'), $item->distance/100, '#1ebabd');
        }

        return view('livewire.container.data.distance',[
            'containerValues' => $containerValues->orderBy('created_at','desc')->simplePaginate(10),
            'distancesChart' => $distancesChart
        ]);
    }
}
