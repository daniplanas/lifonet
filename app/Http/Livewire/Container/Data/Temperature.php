<?php

namespace App\Http\Livewire\Container\Data;

use App\Models\ContainerDistance;
use App\Models\ContainerTemperature;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Temperature extends Component
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
        $containerValues = ContainerTemperature::where('container_id',$this->containerId);
        if(($this->from != '')&&($this->to != '')){
            $containerValues->whereBetween('created_at',[$this->from,$this->to]);
        }
        $containerValuesComplete = (clone $containerValues)->orderBy('created_at','desc')->limit(100)->get();
        $temperaturesChart = (new lineChartModel())
            ->setAnimated(false)
            ->setSmoothCurve()
            ->setXAxisVisible(false)
            ->setDataLabelsEnabled(true);
        foreach($containerValuesComplete as $item){
            $temperaturesChart->addPoint($item->created_at->format('d/m/Y'), $item->temperature, '#1ebabd');
        }

        return view('livewire.container.data.temperature',[
            'temperatures' => $containerValues->orderBy('created_at','desc')->paginate(10),
            'temperaturesChart' => $temperaturesChart
        ]);
    }
}
