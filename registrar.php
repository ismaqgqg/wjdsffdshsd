<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "bdjejemplo");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si los datos están definidos antes de usarlos
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';
$telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conexion, $_POST['telefono']) : '';
$correo = isset($_POST['correo']) ? mysqli_real_escape_string($conexion, $_POST['correo']) : '';
$direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conexion, $_POST['direccion']) : '';
$curso = isset($_POST['curso']) ? mysqli_real_escape_string($conexion, $_POST['curso']) : '';

// Preparar la consulta SQL
$consulta = "INSERT INTO cliente (nombre, telefono, correo, direccion, curso) VALUES ('$nombre', '$telefono', '$correo', '$direccion', '$curso')";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $consulta);

// Verificar si la consulta fue exitosa
if ($resultado) {
    $mensaje = "¡Formulario enviado con éxito!";
    $enviado = true;
} else {
    echo "Error al ingresar los datos: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
