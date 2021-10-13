<div>
    <article>
        <!-- Profile header -->
        <div class="sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
            <div class="sm:hidden 2xl:block min-w-0 flex-1">
                <h1 class="text-2xl font-bold text-gray-900 truncate">
                    Código: {{ $container->code }}
                </h1>
            </div>
        </div>
        <div class="text-gray-500">
            ID: {{ $container->id }}
        </div>
        <!-- Description list -->
        <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        País
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $container->country }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Estado
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $container->state }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Ciudad
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $container->city }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Dirección
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $container->address }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Código postal
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $container->postal_code }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Tipología
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 capitalize">
                        @lang('types.container-types.'.$container->type)
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Creación
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $container->created_at->format('d/m/Y') }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Última actualización
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $container->updated_at->format('d/m/Y') }}
                    </dd>
                </div>
            </dl>
        </div>
    </article>
</div>
