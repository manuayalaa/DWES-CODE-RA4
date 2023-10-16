<?php
// Comprobar si existe una cookie llamada "user"
if (isset($_COOKIE["user"])) {
    $name = $_COOKIE["user"]; // Si existe, asignar su valor a la variable $name
} else {
    $name = ""; // Si no existe, inicializar la variable $name como una cadena vacía
}

// Comprobar si existe una cookie llamada "password"
if (isset($_COOKIE["password"])) {
    $password = $_COOKIE["password"]; // Si existe, asignar su valor a la variable $password
} else {
    $password = ""; // Si no existe, inicializar la variable $password como una cadena vacía
}

// Comprobar si se ha enviado el formulario (POST request)
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Comprobar si se marcó la casilla de verificación "Remind me"
    if (isset($_POST["remindme"])) {
        // Comprobar si se ha enviado un valor para el campo "user" en el formulario
        if (isset($_POST["user"])) {
            // Establecer una cookie llamada "user" con el valor proporcionado en el formulario y una duración de 1 hora
            setcookie("user", $_POST["user"], time() + 3600);
            $name = $_POST["user"]; // Actualizar la variable $name con el valor del formulario
        }
        // Comprobar si se ha enviado un valor para el campo "password" en el formulario
        if (isset($_POST["password"])) {
            // Establecer una cookie llamada "password" con el valor proporcionado en el formulario y una duración de 1 hora
            setcookie("password", $_POST["password"], time() + 3600);
            $password = $_POST["password"]; // Actualizar la variable $password con el valor del formulario
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad de prueba 1</title>
    <style>
        #sesion {
            border: 1px solid black;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div id="sesion">
        <form method="post" action="">
            <label for="">User: </label>
            <input type="text" name="user" id="user" value="<?php echo $name; ?>"><br />
            <label for="">Password: </label>
            <input type="text" name="password" id="password" value="<?php echo $password; ?>"><br />
            <label for="">Remind me: </label>
            <input type="checkbox" id="remindme" name="remindme"><br />

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>
</body>

</html>
