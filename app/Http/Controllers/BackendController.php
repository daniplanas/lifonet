<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\ContainerAlert;
use App\Models\ContainerDistance;
use App\Models\Property;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function containerList()
    {
        return view('backend.container.index');
    }
    public function containerShow(Container $container)
    {
        return view('backend.container.show',[
            'container' => $container
        ]);
    }

    public function propertyList()
    {
        return view('backend.property.index');
    }
    public function propertyShow(Property $property)
    {
        return view('backend.property.show',[
            'property' => $property
        ]);
    }
}
