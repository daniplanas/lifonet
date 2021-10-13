<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\ContainerAlert;
use App\Models\ContainerDistance;
use App\Models\ContainerTemperature;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function apiProcessing(Request $request, $code = null)
    {
        $container = Container::where('code',$code)->first();
        if($container == null){
            return response()->json(false,500);
        }
        $requestData = json_decode($request->getContent(),true);
        if(isset($requestData['distance'])){

        }

        switch ($requestData['type']) {
            case 'd':
                $distance = ContainerDistance::create([
                    'container_id' => $container->id,
                    'distance' => (int)$requestData['v']
                ]);
                if($requestData['v']<3500){
                    ContainerAlert::create([
                        'container_id' => $container->id,
                        'type' => 1,
                        'alarmeable_type' => 'App\Models\ContainerDistance',
                        'alarmeable_id' => $distance->id
                    ]);
                }
                break;
            case 't':
                $temperature = ContainerTemperature::create([
                    'container_id' => $container->id,
                    'temperature' => (int)$requestData['v']
                ]);
                if($requestData['v']<3000){
                    ContainerAlert::create([
                        'container_id' => $container->id,
                        'type' => 1,
                        'alarmeable_type' => 'App\Models\ContainerTemperature',
                        'alarmeable_id' => $temperature->id
                    ]);
                }
                break;
            case 'a':
                $openning = ContainerTemperature::create([
                    'container_id' => $container->id,
                    'data' => now()->timestamp
                ]);
                if($requestData['v']<3000){
                    ContainerAlert::create([
                        'container_id' => $container->id,
                        'type' => 1,
                        'alarmeable_type' => 'App\Models\ContainerOpenning',
                        'alarmeable_id' => $openning->id
                    ]);
                }
                break;
            default:
                # code...
                break;
        }





        return response()->json(true,200);
    }
    public function getDeviceMessage($public_token = null,Request $request)
    {
        $device = Container::where('code', $public_token)->first();
        if ($device == null) {
            return response()->json(false, $this->errorStatus);
        }
        //dd($request);
        $requestData = json_decode($request->getContent(), true);
    }
}
