<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
            <form method="POST" action="../controladores/ActualizarClave.php">
                <label>Usuario</label><div><input type="text" name="nomUsuario"></div>
                <label>Clave Antigua </label><div><input type="password" name="passAntigua"></div>
                <label>Clave Nueva</label><div><input type="password" name="passNueva"></div>
                <label>Confirma Clave Nueva</label><div><input type="password" name="passConfirma"></div>
                <input type="submit" value="Cambiar Clave">
            </form>
           
    </body>
</html>