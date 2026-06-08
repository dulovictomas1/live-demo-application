<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stránky
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Zoznam stránok
                </div>
            </div>
        </div>
    </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="btn_create_ser">
                        <a href="{{ route('admin.page.create_form') }}" >Vytvoriť stránku</a>
                    </div>

                    @if (session('success'))
                        <p class="text-green-600">{{ session('success') }}</p>
                    @endif

                    @foreach ($pages as $page)
                        <div class="service_listing">
                            <p><strong>Názov:</strong> {{ $page->name }}</p>
                            <p><strong>URL adresa:</strong> {{ $page->slug }}</p>

                            <div class="btn_service_detail">
                                <a href="{{ route('edit.page', $page->id) }}">Detail</a>
                            </div>

                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    
</x-app-layout>
