<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Služby
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Zoznam služieb
                </div>
            </div>
        </div>
    </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="btn_create_ser">
                        <a href="{{ route('admin.service.create_form') }}" >Vytvoriť službu</a>
                    </div>

                    @if (session('success'))
                        <p class="text-green-600">{{ session('success') }}</p>
                    @endif

                    @foreach ($services as $service)
                        <div class="service_listing">
                            <p><strong>Názov:</strong> {{ $service->name }}</p>
                            <p><strong>URL adresa:</strong> {{ $service->slug }}</p>
                            <p><strong>Obsah:</strong> {{ $service->content }}</p>

                            <div class="btn_service_detail">
                                <a href="{{ route('admin.service-detail', $service->id) }}">Detail</a>
                            </div>

                            <div class="btn_service_detail_delete">
                                <a href="{{ route('service.delete', $service->id) }}">Zmazať službu</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    
</x-app-layout>
