<?php 
include_once('./includes/header.php');
?>

<?php 
include_once('empleado.php');
?>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>telefono</th>
            <th>direccion</th>
            <th>depedencia</th>
        </tr>

    </thead>
    <tbody>
        <?php
        $empleado = new empleado();
        $empleado->getAllEmpleado();
        foreach ($empleado->rows as $row) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['direccion']; ?></td>
                <td><?php echo $row['dependencia']; ?></td>
                <td>
                    <a href="./vistas/edit.php?id<?php echo $row['id']; ?>">Editar</a>
                    <a href="./vistas/delete.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php 
include_once('./includes/footer.php');
?>