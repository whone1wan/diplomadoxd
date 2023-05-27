<?php
include("db.php");
if (isset($_GET['iddatos'])) {
    $id = $_GET['iddatos'];
    $query = "SELECT * FROM datos WHERE iddatos=$id";
    $toupdt = mysqli_query($conn, $query);
    if (mysqli_num_rows($toupdt) == 1) {
        $row = mysqli_fetch_array($toupdt);
        $nombre = $row['nombre'];
        $edad = $row['edad'];
        $direccion = $row['direccion'];
        $sexo = $row['sexo'];
    }
}
if (isset($_POST['add'])) {
    $id = $_GET['iddatos'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $sexo = $_POST['sexo'];
    $query = "UPDATE datos SET nombre='$nombre', edad='$edad', direccion='$direccion', sexo='$sexo' WHERE iddatos=$id";
    mysqli_query($conn, $query); // Agregué la variable $result para almacenar el resultado de la consulta
    header("Location: index.php");
    
      // Validar que la edad sea menor de 100 años
      if ($edad < 100) {
        $query = "UPDATE datos SET nombre='$nombre', edad='$edad', direccion='$direccion', sexo='$sexo' WHERE iddatos=$id";
        mysqli_query($conn, $query);
        header("Location: index.php");
        $_SESSION['message'] = 'Se actualizó correctamente el usuario';
        $_SESSION['message_type'] = 'yellow';
    } else {
        $_SESSION['message'] = 'La edad debe ser menor de 100 años';
        $_SESSION['message_type'] = 'red';
    }

    // $_SESSION['message'] = 'Se actualizó correctamente el usuario';
    // $_SESSION['message_type'] = 'yellow';
}

mysqli_close($conn);
?>

<?php
include("includes/header.php");
?>


<div class="container mx-auto flex justify-center mt-10 ">
    <form class="w-full max-w-lg place-content-center" action="updt.php?iddatos=<?php echo $_GET['iddatos'] ?>" method="POST">

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    nombre
                </label>
                <input value="<?php echo $nombre ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nombre" name="nombre" type="text" placeholder="Actualizar nombre" required>

            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    edad
                </label>
                <input min="1" max="99" value="<?php echo $edad ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="edad" name="edad" type="number" placeholder="¿Cuantos años tienes?">
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    Dirección
                </label>
                <input value="<?php echo $direccion ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="direccion" name="direccion" type="text" placeholder="Ingresa donde vives">
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Sexo
                </label>
                <div class="relative">
                    <select  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sexo" name="sexo">
                        <?php
                        

                        $opciones = ['Hombre', 'Mujer', 'Otro']; // Opciones del select
                        foreach($opciones as $opcion){
                            $selected = ($opcion == $sexo) ? 'selected' : ''; // Verifica si la opción coincide con el valor deseado
                            echo '<option ' . $selected . '>' . $opcion . '</option>';
                        }

//                         $opcionSeleccionada = false; // Variable para controlar si la opción anterior ya ha sido seleccionada

//                         foreach ($opciones as $opcion) {
//                             $selected = ($opcion == $sexo) ? 'selected' : ''; // Verifica si la opción coincide con el valor deseado

//                             // Marca la opción anterior como seleccionada y registra que ya ha sido seleccionada
//                             if ($selected) {
//                                 echo '<option ' . $selected . '>' . $opcion . '</option>';
//                                 $opcionSeleccionada = true;
//                             }

//                         }

// /*                         Muestra las opciones restantes si la opción anterior no ha sido seleccionada
//  */                        if (!$opcionSeleccionada) {
//                             foreach ($opciones as $opcion) {
//                                 echo '<option>' . $opcion . '</option>';
//                             }
//                         }
                        ?>

                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
        <div class="flex justify-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold mr-5 py-2 px-4 rounded" type="submit" name="add">
                Agregar
            </button>
             <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href = 'index.php';" type="button"">
                Cancelar
            </button>
    </form>
</div>