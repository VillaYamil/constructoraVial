<x-app-layout>
    <div class="container mx-auto max-w-xl mt-10 p-6 bg-white rounded shadow">

        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Editar asignación máquina - obra</h1>

        <form action="{{ route('machinework.update', $assignment->id) }}" method="POST" class="space-y-6 max-w-xl mx-auto mt-6">
            @csrf
            @method('PUT')

            <!-- Máquina -->
            <div>
                <x-input-label for="Máquina">
                    <span class="block text-sm font-medium text-gray-700">Máquina</span>
                </x-input-label>
                <select name="machine_id" id="machine_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200" required>
                    <option value="">Selecciona una máquina</option>
                    @foreach($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id', $assignment->machine_id) == $machine->id ? 'selected' : '' }}>
                            {{ $machine->type }} - {{ $machine->serial_number }} - {{ $machine->brand_model }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('machine_id')" class="mt-2" />
            </div>

            <!-- Obra -->
            <div>
                <x-input-label for="Obra">
                    <span class="block text-sm font-medium text-gray-700">Obra</span>
                </x-input-label>
                <select name="work_id" id="work_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200" required>
                    <option value="">Selecciona una obra</option>
                    @foreach($works as $work)
                        <option value="{{ $work->id }}" {{ old('work_id', $assignment->work_id) == $work->id ? 'selected' : '' }}>
                            {{ $work->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('work_id')" class="mt-2" />
            </div>

            <!-- Fecha inicio -->
            <div>
                <x-input-label for="Fecha de inicio">
                    <span class="block text-sm font-medium text-gray-700">Fecha de inicio</span>
                </x-input-label>
                <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full"
                              value="{{ old('start_date', $assignment->start_date?->format('Y-m-d')) }}" required />
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>

            <!-- Fecha fin -->
            <div>
                <x-input-label for="Fecha de fin (opcional)">
                    <span class="block text-sm font-medium text-gray-700">Fecha de fin (opcional)</span>
                </x-input-label>
                <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full"
                              value="{{ old('end_date', $assignment->end_date?->format('Y-m-d')) }}" />
                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            </div>

            <!-- Km inicio -->
            <div>
                <x-input-label for="Km de inicio">
                    <span class="block text-sm font-medium text-gray-700">Km de inicio</span>
                </x-input-label>
                <x-text-input id="km_start" name="km_start" type="number" class="mt-1 block w-full"
                              value="{{ old('km_start', $assignment->km_start) }}" />
                <x-input-error :messages="$errors->get('km_start')" class="mt-2" />
            </div>

            <!-- Km fin -->
            <div>
                <x-input-label for="Km de fin">
                    <span class="block text-sm font-medium text-gray-700">Km de fin</span>
                </x-input-label>
                <x-text-input id="km_end" name="km_end" type="number" class="mt-1 block w-full"
                              value="{{ old('km_end', $assignment->km_end) }}" />
                <x-input-error :messages="$errors->get('km_end')" class="mt-2" />
            </div>

            <!-- Motivo -->
            <div>
                <x-input-label for="reason_end">
                    <span class="block text-sm font-medium text-gray-700">Motivo</span>
                </x-input-label>
                <select name="reason_end" id="reason_end" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200">
                    <option value="">Selecciona un motivo (opcional)</option>
                    <option value="Obra finalizada" {{ old('reason_end', $assignment->reason_end) == 'Obra finalizada' ? 'selected' : '' }}>Obra finalizada</option>
                    <option value="Otra causa" {{ old('reason_end', $assignment->reason_end) == 'Otra causa' ? 'selected' : '' }}>Otra causa</option>
                    <option value="Parada técnica" {{ old('reason_end', $assignment->reason_end) == 'Parada técnica' ? 'selected' : '' }}>Parada técnica</option>
                </select>
                <x-input-error :messages="$errors->get('reason_end')" class="mt-2" />
            </div>



            <!-- Botón -->
            <div class="flex justify-end">
                <x-primary-button>Actualizar asignación</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
