<x-app-layout>
<div class="container mt-5">
    <h1 class="mb-4">Formulario para crear nueva maquina</h1>

    <form action="/machine/store" method="POST">
        @csrf

        <div class="mb-3">
            <label for="serial_number" class="form-label">Numero de Serie:</label>
            <input type="text"name="serial_number" id="serial_number" required>
        </div>

        <div class="mb-3">
            <label for="brand_model" class="form-label">Modelo:</label>
            <input type="text"  name="brand_model" id="brand_model" required>
        </div>

        <div class="mb-3">
            <label for="km" class="form-label">km:</label>
            <input type="text" name="km" id="km" required>
        </div>

        <button type="submit">Enviar</button>
    </form>

    <a href="{{ route('machine.index') }}">Volver al inicio</a>
</div>

</x-app-layout>