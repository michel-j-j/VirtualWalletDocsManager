<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #323a49;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #323a49;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }

        .header h1 {
            margin: 0;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #212631;
        }

        .content p {
            line-height: 1.6;
        }

        .button {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #f2c40d;
            color: #212631;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }

        .footer {
            background-color: #212631;
            padding: 10px;
            text-align: center;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>VirtualWallet</h1>
        </div>
        <div class="content">
            <h2>Recuperación de Contraseña</h2>
            <p>Hola <?= $usuario['name'] ?>,</p>
            <p>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta. Si no has solicitado un cambio
                de contraseña, puedes ignorar este correo electrónico.</p>
            <p>Para restablecer tu contraseña, te proporcionamos una nueva contraseña:</p>
            <p style="color: red;"><?= $usuario['new_pass'] ?></p>
            <p>Gracias,</p>
            <p>El equipo de VirtualWallet</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 VirtualWallet. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>