<!-- index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saber Hacer - Unidad 1</title>
    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Barra de Navegación Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- ID del sitio -->
    <a class="navbar-brand fw-bold text-success" href="index.php">Tarea</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Secciones Principales -->
        <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
      </ul>
      
      <!-- Buscador -->
      <form class="d-flex" action="search.php" method="GET">
        <input class="form-control me-2" type="search" name="q" placeholder="Buscar en el sitio..." aria-label="Buscar" required>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

<!-- Contenido Principal -->
<div class="container mt-5" id="registrar">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registro de Usuario</h4>
                </div>
                <div class="card-body">
                    <!-- Formulario -->
                    <form action="process.php" method="POST" id="registroForm">
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8" required>
                            <div class="form-text">Mínimo 8 caracteres.</div>
                        </div>

                        <div class="mb-3">
                            <label for="captcha" class="form-label text-primary fw-bold">Validación Humana: ¿Cuánto es 5 + 3?</label>
                            <input type="number" class="form-control" id="captcha" name="captcha" required>
                            <input type="hidden" name="expected_captcha" value="8">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-block">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS de Bootstrap (necesario para el menú desplegable) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Validación Frontend JavaScript -->
<script>
document.getElementById('registroForm').addEventListener('submit', function(e) {
    const captchaInput = document.getElementById('captcha').value;
    if(captchaInput !== '8') {
        e.preventDefault();
        alert('Validación humana fallida desde el frontend. Por favor resuelve la suma correctamente.');
    }
});
</script>

</body>
</html>