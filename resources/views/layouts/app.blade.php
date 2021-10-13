@extends('layouts.base')

@section('body')
<div class="h-screen flex overflow-hidden bg-white">
    @include('layouts.partials.sidebar')
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
            @include('layouts.partials.header',[
                'pageTitle' => $pageTitle ?? ''
            ])
            <div class="px-4 mt-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
</div>
@isset($slot)
{{ $slot }}
@endisset
@endsection
