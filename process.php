<?php
// process.php
require_once 'Validator.php'; // (La clase Validator no cambia, usa la misma que te di antes)

$html_head = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
';

$html_foot = '
</div>
</body>
</html>
';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];
    $expected_captcha = $_POST['expected_captcha'];

    $validator = new Validator();
    $validator->validateEmail($email);
    $validator->validatePassword($password);
    $validator->validateHuman($captcha, $expected_captcha);

    echo $html_head;

    if ($validator->isValid()) {
        echo '<div class="alert alert-success shadow" role="alert">
                <h4 class="alert-heading">¡Registro exitoso!</h4>
                <p>Todos los datos pasaron la validación Frontend, Backend y Humana.</p>
                <hr>
                <a href="index.php" class="btn btn-success">Volver al inicio</a>
              </div>';
    } else {
        echo '<div class="alert alert-danger shadow" role="alert">
                <h4 class="alert-heading">Errores en el registro:</h4>
                <ul>';
        foreach ($validator->getErrors() as $error) {
            echo "<li>$error</li>";
        }
        echo '  </ul>
                <hr>
                <a href="index.php" class="btn btn-danger">Intentar de nuevo</a>
              </div>';
    }

    echo $html_foot;

} else {
    header("Location: index.php");
    exit();
}
?>