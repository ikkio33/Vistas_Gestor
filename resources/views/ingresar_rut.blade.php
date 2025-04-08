@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ingreso de RUT del Cliente</h2>

    <!-- Mostrar mensaje de éxito si se validó el RUT correctamente -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar errores si los hay -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para ingresar el RUT -->
    <form action="{{ route('validar.rut') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="rut">RUT del Cliente:</label>
            <input type="text" id="rut" name="rut" class="form-control" placeholder="Ingrese el RUT" required value="{{ old('rut') }}" readonly>
        </div>

        <!-- Teclado virtual para el RUT -->
        <div class="row text-center">
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('1')">1</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('2')">2</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('3')">3</button>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('4')">4</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('5')">5</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('6')">6</button>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('7')">7</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('8')">8</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('9')">9</button>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('0')">0</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('-')">-</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-keyboard" onclick="agregarCaracter('K')">K</button>
            </div>
        </div>

        <!-- Botones para borrar el último dígito o borrar todo -->
        <div class="row text-center mt-4">
            <div class="col-6">
                <button type="button" class="btn btn-danger" onclick="borrarUltimo()">Borrar Último</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger" onclick="borrarTodo()">Borrar Todo</button>
            </div>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary mt-4">Validar RUT</button>
    </form>
</div>

<script>
    // Función para agregar caracteres al campo RUT
    function agregarCaracter(caracter) {
        const rutInput = document.getElementById('rut');
        rutInput.value += caracter;
    }

    // Función para borrar el último dígito ingresado
    function borrarUltimo() {
        const rutInput = document.getElementById('rut');
        rutInput.value = rutInput.value.slice(0, -1); // Elimina el último carácter
    }

    // Función para borrar todo el RUT
    function borrarTodo() {
        const rutInput = document.getElementById('rut');
        rutInput.value = ''; // Elimina todo el valor
    }
</script>

@endsection
