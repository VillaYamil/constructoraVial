<x-app-layout>
    <div class="container mx-auto max-w-xl mt-10 p-6 bg-white rounded shadow">

        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Crear nueva máquina</h1>

        <form action="/machine/store" method="POST">
            @csrf

            <div class="mb-4">
                <label for="serial_number" class="block text-sm font-medium text-gray-700">Número de Serie:</label>
                <x-text-input type="text" name="serial_number" id="serial_number" class="mt-1 block w-full" required />
            </div>

            <div class="mb-4">
                <label for="brand_model" class="block text-sm font-medium text-gray-700">Modelo:</label>
                <x-text-input type="text" name="brand_model" id="brand_model" class="mt-1 block w-full" required />
            </div>

            <div class="mb-4">
                <label for="km" class="block text-sm font-medium text-gray-700">Kilómetros:</label>
                <x-text-input type="text" name="km" id="km" class="mt-1 block w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="type_machine_id" value="Tipo de máquina" />

                <select id="type_machine_id" name="type_machine_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                    <option value="">-- Seleccionar tipo --</option>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}" data-description="{{ $tipo->description }}">{{ $tipo->name }}</option>
                    @endforeach
                </select>

                <div id="descripcion_tipo" class="text-sm text-gray-600 italic mt-2"></div>

                <x-input-error :messages="$errors->get('type_machine_id')" class="mt-2" />
            </div>

            <div class="flex justify-between mt-6">
                <x-secondary-button type="submit">Enviar</x-secondary-button>
                <x-secondary-button href="{{ route('machine.index') }}">Volver al inicio</x-secondary-button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const select = document.getElementById('type_machine_id');
            const descripcion = document.getElementById('descripcion_tipo');

            select.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const descriptionText = selectedOption.getAttribute('data-description');
                descripcion.textContent = descriptionText ? descriptionText : '';
            });
        });
    </script>
</x-app-layout>
