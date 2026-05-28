<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Správy
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Zoznam správ z kontaktného formuláru
                </div>
            </div>
        </div>
    </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                
                    @foreach ($messages as $message)
                        <div class="service_listing">
                            <p><strong>Meno:</strong> {{ $message->first_name }}</p>
                            <p><strong>Priezvisko:</strong> {{ $message->surname }}</p>
                            <p><strong>Správa:</strong> {{ $message->message }}</p>
                            <p><strong>Prijaté:</strong> {{ $message->created_at }}</p>                            
                        </div>
                        <hr>
                    @endforeach                    
                </div>
            </div>
        </div>
    
</x-app-layout>
