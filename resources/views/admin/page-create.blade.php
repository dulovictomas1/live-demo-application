<x-app-layout>

    <x-slot name="header">
        <h2>Vytvoriť novú stránku</h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

        <div class=" p-4 mb-3" style="margin-bottom: 20px">            
            
            <form action="{{ route('page.store') }}" method="post">
                @csrf

                <div class="pole">
                    <div class="label-popis block font-medium text-sm text-gray-700">Názov stránky</div>
                    <input type="text" name="name" id="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" placeholder="Zadajte názov">    
                </div>

                <div class="pole">
                    <div class="label-popis block font-medium text-sm text-gray-700">URL adresa</div>
                    <input type="text" name="slug" id="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" placeholder="Zadajte URL adresu">    
                </div>
                
                <label for="">Obsah</label>
                <hr>
                <div class="pole">
                    <button id="btn_add_section" type="button">Pridať sekciu</button>
                </div>


                <!-- Section builder -->
                    <div id="form-add-sections" style="display: none">
                        <select name="sections">
                            <option value="txt_blok">Textový blok</option>
                            <option value="half_blok">Blok 1/2 + 1/2</option>                    
                        </select>
                        
                        <button id="btn_add_section_new" type="button">Vytvoriť sekciu</button>
                    </div>

                    <div id="sections-wrapper">

                    </div>
                

                <!-- Final save button -->    
                <div class="flex items-center gap-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Uložiť</button>
                </div>
            </form>

        </div>

    </div>
    </div>
    </div>

</x-app-layout>