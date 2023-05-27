<?php
include_once('connection.php');
class empleado extends ConnectionDB {

    private $id_empleado;
    private $nombre;
    private $apellido;
    private $telefono;
    private $direccion;
    private $depedencia;

    public function __construct($id_empleado='', $nombre='', $apellido='', $telefono='', $direccion='', $depedencia='')
    {
        $this->id_empleado = $id_empleado;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->depedencia = $depedencia;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function get()
    {
        if ($this->id_empleado != '') :
            $this->query = "
        SELECT *
        FROM empleado
        WHERE id = '$this->id_empleado'
        ";
            $this->get_results_from_query();
        endif;
        if (count($this->rows) == 1) :
            foreach ($this->rows[0] as $propiedad => $valor) :
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function set()
    {
        if ($this->id_empleado != '') :
            $this->get($this->id_empleado);
            if ($this->id_empleado != $this->id_empleado) :
                foreach ($this as $campo => $valor) :
                    $$campo = $valor;
                endforeach;
                $this->query = "
                INSERT INTO empleado
                ( nombre, apellido, telefono, direccion, depedencia)
                VALUES
                ( '$nombre', '$apellido', '$telefono', '$direccion', '$depedencia')
                ";
                $this->execute_single_query();
                $this->id_empleado = $id_empleado;

            endif;
        endif;
    }

    public function edit()
    {
        foreach ($this as $campo => $valor) :
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE empleado
        SET nombre='$nombre',
        apellido='$apellido',
        telefono='$telefono',
        direccion='$direccion',
        depedencia='$depedencia'
        WHERE id = '$id_empleado'
        ";
        $this->execute_single_query();
    }

    public function delete()
    {
        $this->query = "
        DELETE FROM empleado
        WHERE id = '$this->id_empleado'
        ";
        $this->execute_single_query();
    }

    public function __destruct()
    {
    
    }

    public function getAllEmpleado()
    {
        $this->query = "
        SELECT *
        FROM empleado
        ";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getEmpleadoByDependencia($depedencia)
    {
        $this->query = "
        SELECT *
        FROM empleado
        WHERE depedencia = '$depedencia'
        ";
        $this->get_results_from_query();
        return $this->rows;
    }
    




}
