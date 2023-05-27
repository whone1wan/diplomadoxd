<?php include_once('../includes/header.php'); ?>

<?php
include_once('../empleado.php');
if (isset($_POST['editar'])) {
    $empleado = new empleado();
    $empleado->nombre = $_POST['nombre'];
    $empleado->apellidos = $_POST['apellidos'];
    $empleado->direccion = $_POST['direccion'];
    $empleado->telefono = $_POST['telefono'];
    $empleado->dependencia = $_POST['dependencia'];
    $empleado->set();
    header('Location: ../index.php');
}
?>
<div class="flex items-center bg-green-200 h-30 mb-20">
    <h2 class="flex-1  text-center font-black bg-green-400 px-4 py-2 m-2"> Crear un nuevo empleado </h1>
</div>

<div>
    <form action="" method="post">
        <label for="">Nombres:
            <input type="text" name="nombre" id="nombre" placeholder="nombre" required>
        </label>
        <label for="">Apellidos:
            <input type="text" name="apellidos" id="apellidos" placeholder="apellidos" required>
        </label>
        <label for="">Direccion:
            <input type="text" name="direccion" id="direccion" placeholder="direccion" required>
        </label>
        <label for="">Telefono:
            <input type="number" name="telefono" id="telefono" placeholder="telefono" required>
        </label>
        <label for="">Dependencia:
            <input type="text" name="dependencia" id="dependencia" placeholder="dependencia" required>
        </label>
        <input type="submit" name="editar" value="Enviar">

</div>


</form>