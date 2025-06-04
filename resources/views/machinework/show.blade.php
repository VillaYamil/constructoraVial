<x-app-layout>
    <div class="container mx-auto max-w-4xl mt-10 p-6 bg-white rounded shadow">

        <h1 class="text-3xl font-bold mb-6 text-gray-800">Historial de Asignaciones - Máquina</h1>

        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-700">Datos de la máquina</h2>
            <ul class="mt-2 text-gray-600">
                <li><strong>Tipo:</strong> {{ $machine->type }}</li>
                <li><strong>Marca/Modelo:</strong> {{ $machine->brand_model }}</li>
                <li><strong>Número de serie:</strong> {{ $machine->serial_number }}</li>
                <li><strong>Kilómetros totales:</strong> {{ $machine->km_totales ?? 0 }} km</li>
            </ul>
        </div>

        <h2 class="text-xl font-semibold mb-4 text-gray-700">Historial de asignaciones</h2>

        @if($machine->machineWorks->isEmpty())
            <p class="text-gray-500">No hay asignaciones registradas para esta máquina.</p>
        @else
            <table class="min-w-full border border-gray-300 rounded overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">Obra</th>
                        <th class="px-4 py-2 border border-gray-300">Fecha inicio</th>
                        <th class="px-4 py-2 border border-gray-300">Fecha fin</th>
                        <th class="px-4 py-2 border border-gray-300">Km inicio</th>
                        <th class="px-4 py-2 border border-gray-300">Km fin</th>
                        <th class="px-4 py-2 border border-gray-300">Km recorridos</th>
                        <th class="px-4 py-2 border border-gray-300">Motivo fin</th>
                        <th class="px-4 py-2 border border-gray-300">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($machine->machineWorks as $assignment)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="px-4 py-2 border border-gray-300">
                                {{ $assignment->work->name ?? 'Sin obra' }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                {{ \Carbon\Carbon::parse($assignment->start_date)->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                {{ $assignment->end_date ? \Carbon\Carbon::parse($assignment->end_date)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                {{ $assignment->km_start ?? '-' }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                {{ $assignment->km_end ?? '-' }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                @if($assignment->km_start !== null && $assignment->km_end !== null)
                                    {{ $assignment->km_end - $assignment->km_start }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                {{ $assignment->reason_end ?? '-' }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                @if(empty($assignment->end_date))
                                    <span class="text-green-600 font-semibold">Activa</span>
                                @else
                                    <span class="text-gray-600">Finalizada</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="mt-6 flex justify-end">
            <a href="{{ route('machinework.index') }}" class="text-indigo-600 hover:underline">Volver a asignaciones</a>
        </div>

    </div>
</x-app-layout>
