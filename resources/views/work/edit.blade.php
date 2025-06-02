<x-app-layout>
    <div class="container mx-auto max-w-xl mt-10 p-6 bg-white rounded shadow">
        
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Actualizar obra</h1>

        <form action="{{ route('work.update', $work->id) }}" method="POST" class="space-y-6 max-w-xl mx-auto mt-6">
            @csrf
            @method('PUT')

            <!-- Nombre de Obra -->
            <div>
                <x-input-label for="name">
                    <span class="block text-sm font-medium text-gray-700">Nombre</span>
                </x-input-label>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name', $work->name)" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>

            <!-- Inicio de Obra -->
            <div>
                <x-input-label for="start_date">
                    <span class="block text-sm font-medium text-gray-700">Fecha de incio de Obra</span>
                </x-input-label>
                <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full"
                              :value="old('start_date', $work->start_date)" required />
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>

            <!-- Fecha de fin de obra estimada -->
            <div>
                <x-input-label for="end_date">
                    <span class="block text-sm font-medium text-gray-700">Fecha de fin de obra estimada</span>
                </x-input-label>
                <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full"
                                :value="old('end_date', $work->end_date)" required />
                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            </div>

            <!-- Provincia -->
            <div>
                <x-input-label for="province_id">
                    <span class="block text-sm font-medium text-gray-700">Provincia</span>
                </x-input-label>
                <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200">
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}" {{ $work->province_id == $province->id ? 'selected' : '' }}>
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('province_id')" class="mt-2" />
            </div>

            <!-- boton -->
            <div class="flex justify-end">
                <x-primary-button>Actualizar Obra</x-primary-button>
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

