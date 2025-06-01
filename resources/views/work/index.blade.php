<x-app-layout>
    <div class="p-4">
        <div class="flex justify-between mb-4">
            <x-secondary-button>
                <a href="{{ route('work.create') }}">Crear nueva Obra</a>
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
                        <th class="px-4 py-2">ID - Nombre</th>
                        <th class="px-4 py-2">Inicio Obra</th>
                        <th class="px-4 py-2">Fin Obra</th>
                        <th class="px-4 py-2">Provincia</th>
                        <th class="px-4 py-2">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ByProvince as $province => $works)
                    

                        @foreach ($works as $work)
                            <tr class="border-b">
                                <td class="px-4 py-2 text-white ">{{ $work->id }} - {{ $work->name }}</td>
                                <td class="px-4 py-2 text-white ">{{ $work->start_date }}</td>
                                <td class="px-4 py-2 text-white ">{{ $work->end_date }}</td>
                                <td class="px-4 py-2 text-white ">{{ $work->province->name }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <a href="{{ route('work.edit', $work->id) }}" class="text-blue-500">Editar</a>
                                    <form method="POST" action="{{ route('work.destroy', $work->id) }}" onsubmit="return confirm('¿Estás seguro de eliminar esta obra?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Eliminar</button>
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
