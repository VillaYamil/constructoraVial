<x-app-layout>
    <div class="container mx-auto max-w-xl mt-10 p-6 bg-white rounded shadow">
        
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Actualizar máquina</h1>

        <form action="{{ route('machine.update', $machine->id) }}" method="POST" class="space-y-6 max-w-xl mx-auto mt-6">
            @csrf
            @method('PUT')

            

            <!-- Numero de serie -->
            <div>
                <x-input-label for="serial_number">
                    <span class="block text-sm font-medium text-gray-700">Número de serie</span>
                </x-input-label>
                <x-text-input id="serial_number" name="serial_number" type="text" class="mt-1 block w-full"
                              :value="old('serial_number', $machine->serial_number)" required autofocus />
                <x-input-error :messages="$errors->get('serial_number')" class="mt-2" />
            </div>

            <!-- Marca / Modelo -->
            <div>
                <x-input-label for="brand_model">
                    <span class="block text-sm font-medium text-gray-700">Marca / Modelo</span>
                </x-input-label>
                <x-text-input id="brand_model" name="brand_model" type="text" class="mt-1 block w-full"
                              :value="old('brand_model', $machine->brand_model)" required />
                <x-input-error :messages="$errors->get('brand_model')" class="mt-2" />
            </div>

            <!-- Km -->
            <div>
                <x-input-label for="km">
                    <span class="block text-sm font-medium text-gray-700">Kilometraje (KM)</span>
                </x-input-label>
                <x-text-input id="km" name="km" type="number" class="mt-1 block w-full"
                              :value="old('km', $machine->km)" required />
                <x-input-error :messages="$errors->get('km')" class="mt-2" />
            </div>

            <!-- Tipo de maquina -->
            <div>
                <x-input-label for="type_machine_id">
                    <span class="block text-sm font-medium text-gray-700">Tipo de máquina</span>
                </x-input-label>
                <select name="type_machine_id" id="type_machine_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200">
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ $machine->type_machine_id == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('type_machine_id')" class="mt-2" />
            </div>

            <!-- boton -->
            <div class="flex justify-end">
                <x-primary-button>Actualizar máquina</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
