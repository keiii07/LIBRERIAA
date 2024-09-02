<?php
// Configuración del correo
$para = "tu_correo@ejemplo.com"; // Reemplaza con tu correo electrónico
$asunto = "Nuevo mensaje desde el formulario de contacto";

// Verificar que se haya enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = strip_tags(trim($_POST["nombre"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = trim($_POST["mensaje"]);

    // Verificar que los datos no estén vacíos
    if (empty($nombre) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Si hay un error, redirigir de nuevo al formulario con un mensaje de error
        header("Location: contacto.php?error=1");
        exit;
    }

    // Crear el contenido del correo
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Email: $email\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Encabezados del correo
    $encabezados = "From: $nombre <$email>";

    // Enviar el correo
    if (mail($para, $asunto, $contenido, $encabezados)) {
        // Redirigir al usuario a una página de agradecimiento o mostrar un mensaje de éxito
        header("Location: contacto.php?success=1");
    } else {
        // Si el correo no se pudo enviar, redirigir de nuevo al formulario con un mensaje de error
        header("Location: contacto.php?error=2");
    }
} else {
    // Si alguien intenta acceder a este archivo directamente, redirigir al formulario
    header("Location: contacto.php");
}
?>
