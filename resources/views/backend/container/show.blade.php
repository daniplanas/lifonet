@extends('layouts.app',[
'pageTitle' => 'Contenedor: ' . $container->code
])

@section('content')
<div class="grid grid-cols-2 gap-4">
    <div class="my-5">
        @livewire('container.data',[
            'container' => $container
        ])
    </div>
    <div class="my-5" id="map">
    </div>
    <div class="my-5">
        @livewire('container.data.temperature',[
        'containerId' => $container->id
        ])
    </div>
    <div class="my-5">
        @livewire('container.data.distance',[
        'containerId' => $container->id
        ])
    </div>
    <div class="my-5">
        @livewire('container.data.movement',[
        'containerId' => $container->id
        ])
    </div>
    <div class="my-5">
        @livewire('container.data.openning',[
        'containerId' => $container->id
        ])
    </div>

</div>

@endsection
@push('css')
<style type="text/css">
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
</style>
<script>
    // Initialize and add the map
    function initMap() {
      // The location of Uluru
      const uluru = { lat: {{ $container->lat }}, lng: {{ $container->long }} };
      // The map, centered at Uluru
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 16,
        center: uluru,
      });
      // The marker, positioned at Uluru
      const marker = new google.maps.Marker({
        position: uluru,
        map: map,
      });
    }
</script>
@endpush
@push('js')
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw5r9CCFkfUJdpDjjfOYv2D2lS07DSFHk&callback=initMap&libraries=&v=weekly" async></script>
@endpush
