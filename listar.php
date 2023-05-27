<div class=" content-center py-12">
    <table class="table-fixed   border border-slate-500 ">
        <thead class="bg-blue-500">
            <tr>
                <th class="border border-slate-600 py-2 px-4 ">Nombre</th>
                <th class="border border-slate-600 py-2 px-4 ">Edad</th>
                <th class="border border-slate-600 py-2 px-4 ">Sexo</th>
                <th class="border border-slate-600  py-2 px-4 ">Direccion</th>
                <?php if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'estudiante') { ?>
                    <th class="border border-slate-600 py-2 px-4 rounded-tr-lg">Acciones</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM datos"; /* Selecciona todos los datos de la tabla persona */
            $rdatos = mysqli_query($conn, $query); /* Ejecuta la consulta */
            while ($row = mysqli_fetch_array($rdatos)) { /* Mientras existan datos en la consulta */
                $editarDeshabilitado = false;
                $eliminarDeshabilitado = false;

                if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'estudiante') {
                    $editarDeshabilitado = true;
                    $eliminarDeshabilitado = true;
                }
            ?>
                <tr>
                    <td class="border border-slate-600  py-2 px-4"><?php echo $row['nombre']; ?></td>
                    <td class="border border-slate-600  py-2 px-4"><?php echo $row['edad']; ?></td>
                    <td class="border border-slate-600  py-2 px-4"><?php echo $row['sexo']; ?></td>
                    <td class="border border-slate-600 py-2 px-4 "><?php echo $row['direccion']; ?></td>
                    <?php if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'estudiante') { ?>
                        <td class="border border-slate-600 py-4 px-6 rounded-tr-lg">
                            <?php if (!$editarDeshabilitado) { ?>
                                <a class="bg-green-500 hover:bg-green-400 mr-2 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" href="updt.php?iddatos=<?php echo $row['iddatos']; ?>">
                                    <i class="fas fa-marker"></i>
                                </a>
                            <?php } ?>
                            <?php if (!$eliminarDeshabilitado) { ?>
                                <a class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" href="del.php?iddatos=<?php echo $row['iddatos']; ?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php
            }
            mysqli_close($conn);
            ?>

        </tbody>
    </table>
</div>