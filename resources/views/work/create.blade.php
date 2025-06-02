<x-app-layout>
    <div class="container mx-auto max-w-xl mt-10 p-6 bg-white rounded shadow">

        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Crear nueva obra</h1>

        <form action="{{ route('work.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <x-text-input type="text" name="name" id="name" class="mt-1 block w-full" required />
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha de incio de Obra:</label>
                <x-text-input type="date" name="start_date" id="start_date" class="mt-1 block w-full" required />
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">Fecha de fin de obra estimada:</label>
                <x-text-input type="date" name="end_date" id="end_date" class="mt-1 block w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="province_id">
                    <span class="block text-sm font-medium text-gray-700" value="Tipo de máquina">Provincia</span>
                </x-input-label>
                <select id="province_id" name="province_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                    <option value="">Seleccione tipo</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>

                <div id="descripcion_tipo" class="text-sm text-gray-600 italic mt-2"></div>

                <x-input-error :messages="$errors->get('province_id')" class="mt-2" />
            </div>

            <div class="flex justify-between mt-6">
            <x-secondary-button type="submit">Crear</x-secondary-button>

            <a href="{{ route('work.index') }}">
                <x-secondary-button type="button">Volver al inicio</x-secondary-button>
            </a>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');

            form.addEventListener('submit', function (e) {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (endDate <= startDate) {
                    e.preventDefault(); // Evita que se envíe el formulario
                    alert('La fecha de fin debe ser posterior a la fecha de inicio.');
                }
            });
        });
    </script>
</x-app-layout>
