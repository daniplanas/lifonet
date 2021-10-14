<div>
    <div class="pb-2 border-b border-gray-200 mb-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Aperturas registradas
        </h3>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Apertura
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
                            @forelse ($opennings as $opening)
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $opening->data }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $opening->created_at->format('d/m/Y H:i:s') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($opening->isAlert())
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
                        {{ $opennings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
