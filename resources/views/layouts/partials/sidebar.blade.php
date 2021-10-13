<div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">
        <div class="flex items-center flex-shrink-0 px-6">
            <!--
            <img class="h-8 w-auto"
                src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">
            -->
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </div>
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">

            <!-- Navigation -->
            <nav class="px-3 mt-6">
                <div class="space-y-1">
                    <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                    <a href="{{ route('dashboard') }}"
                        class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        aria-current="page">
                        <x-heroicon-o-chart-bar class="text-gray-500 mr-3 h-6 w-6"/>
                        Home
                    </a>
                    <a href="{{ route('container.index') }}"
                        class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/view-list -->
                        <x-heroicon-o-archive class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"/>
                        Contenedores
                    </a>

                    <a href="{{ route('property.index') }}"
                        class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/clock -->
                        <x-heroicon-o-home class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"/>
                        Viviendas
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>
