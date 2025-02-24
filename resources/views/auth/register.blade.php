<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <label for="phone_number">Número de Teléfono</label>
            <input type="text" id="phone_number" name="phone_number" required>
        </div>
        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión</a></p>
</body>
</html> -->


<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h1>Registro</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}">
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
            @error('email') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
            @error('password') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <label for="phone_number">Número de Teléfono</label>
            <input type="text" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}">
            @error('phone_number') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión</a></p>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>


</html> -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Registro</h1>
        
        <!-- Formulario -->
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Número de Teléfono</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" required value="{{ old('phone_number') }}">
                @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        </form>

        <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
