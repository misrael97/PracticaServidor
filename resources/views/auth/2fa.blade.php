<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Código SMS</title>
</head>
<body>
    <h1>Verificación de Código SMS</h1>
    <p>Hemos enviado un código de verificación a tu número de teléfono.</p>
    <form action="{{ route('2fa.verify') }}" method="POST">
        @csrf
        <div>
            <label for="code">Código de Verificación</label>
            <input type="text" id="code" name="code" required>
        </div>
        <button type="submit">Verificar</button>
    </form>

    <!-- Formulario para reenviar el código -->
    <form action="{{ route('2fa.send') }}" method="POST">
        @csrf
        <button type="submit">Reenviar código</button>
    </form>
</body>
</html>