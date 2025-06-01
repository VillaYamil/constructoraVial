<x-app-layout>
    <div class="p-4">
        <div class="flex justify-between mb-4">
            <x-secondary-button>
                <a href="{{ route('machine.create') }}">Crear nueva máquina</a>
            </x-secondary-button>
        </div>

        @if(session('success'))
            <div class="px-4 py-2 text-blue-500 hover:underline">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Tipo</th>
                        <th class="px-4 py-2">Serie</th>
                        <th class="px-4 py-2">Marca</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($machinesByType as $tipoNombre => $machines)
    
                        <tr class="bg-gray-200">
                            
                        </tr>
                        @foreach ($machines as $machine)
                            <tr class="border-b">
                                <td class="px-4 py-2 text-white ">{{ $machine->id }}</td>
                                <td class="px-4 py-2 text-white  ">{{ $machine->typeMachine->name }}</td>
                                <td class="px-4 py-2 text-white ">{{ $machine->serial_number }}</td>
                                <td class="px-4 py-2 text-white ">{{ $machine->brand_model }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <a href="{{ route('machine.edit', $machine->id) }}" class="text-blue-500 ">Editar</a>
                                    <form method="POST" action="{{ route('machine.destroy', $machine->id) }}" onsubmit="return confirm('¿Estás seguro de eliminar esta máquina?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
