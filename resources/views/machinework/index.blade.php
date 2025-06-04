<x-app-layout>
    <div class="p-4">
        <div class="flex justify-between mb-4">
            <x-secondary-button>
                <a href="{{ route('machinework.create') }}">Crear nueva asignación</a>
            </x-secondary-button>
        </div>

        @if(session('success'))
            <div class="px-4 py-2 text-blue-500 hover:underline">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('machinework.index') }}" class="mb-4 flex gap-2 flex-wrap">
            <input type="text" name="machine_type" placeholder="Tipo de máquina" 
                   value="{{ request('machine_type') }}" 
                   class="border rounded px-3 py-2 flex-grow max-w-xs" />
            <input type="text" name="serial_number" placeholder="Serie de máquina" 
                   value="{{ request('serial_number') }}" 
                   class="border rounded px-3 py-2 flex-grow max-w-xs" />
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Buscar
            </button>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border border-gray-300">ID</th>
                        <th class="px-4 py-2 border border-gray-300">Tipo máquina</th>
                        <th class="px-4 py-2 border border-gray-300">Serie</th>
                        <th class="px-4 py-2 border border-gray-300">Modelo</th>
                        <th class="px-4 py-2 border border-gray-300">Obra</th>
                        <th class="px-4 py-2 border border-gray-300">Inicio</th>
                        <th class="px-4 py-2 border border-gray-300">Fin</th>
                        <th class="px-4 py-2 border border-gray-300">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Agrupar las asignaciones por tipo de máquina
                        $assignmentsByType = $assignments->groupBy(fn($a) => $a->machine->typeMachine->name ?? 'Sin tipo');
                    @endphp

                    @forelse ($assignmentsByType as $tipo => $assignmentsGroup)
                        <tr class="bg-gray-200">
                            <td colspan="8" class="px-4 py-2 font-semibold text-gray-700">
                                Tipo: {{ $tipo }}
                            </td>
                        </tr>

                        @foreach ($assignmentsGroup as $assignment)
                            <tr class="border-b border-gray-300">
                                <td class="px-4 py-2 text-white">{{ $assignment->id }}</td>
                                <td class="px-4 py-2 text-white">{{ $assignment->machine->typeMachine->name ?? 'Sin tipo' }}</td>
                                <td class="px-4 py-2 text-white">{{ $assignment->machine->serial_number }}</td>
                                <td class="px-4 py-2 text-white">{{ $assignment->machine->brand_model }}</td>
                                <td class="px-4 py-2 text-white">{{ $assignment->work->name }}</td>
                                <td class="px-4 py-2 text-white">{{ $assignment->start_date }}</td>
                                <td class="px-4 py-2 text-white">{{ $assignment->end_date ?? 'En curso' }}</td>
                                <td class="px-4 py-2 border border-gray-300 flex gap-2">
                                    <a href="{{ route('machinework.show', $assignment->id) }}" class="text-blue-500 hover:underline">Historial</a>
                                    <a href="{{ route('machinework.edit', $assignment->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                                    <form method="POST" action="{{ route('machinework.destroy', $assignment->id) }}" 
                                          onsubmit="return confirm('¿Estás seguro de eliminar esta asignación?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">No se encontraron asignaciones.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $assignments->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
