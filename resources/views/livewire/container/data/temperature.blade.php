<div>
    <div class="pb-2 border-b border-gray-200 mb-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Temperaturas recogidas
        </h3>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="h-80">
                        <livewire:livewire-line-chart :line-chart-model="$temperaturesChart" class="h-80" />
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Temperatura
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha registro
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Alerta
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($temperatures as $temperature)
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $temperature->temperature }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $temperature->created_at->format('d/m/Y H:i:s') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($temperature->isAlert())
                                    <x-heroicon-o-exclamation class="w-6 h-6 text-red-500" />
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    No hay termperaturas registradas
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-2">
                        {{ $temperatures->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
