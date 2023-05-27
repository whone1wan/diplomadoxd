<?php
include_once('empleado.php');
include_once('novedades.php');
include_once('connection.php');
class NovedadesEmpleado extends ConnectionDB {

    private $fecha;
    private $id_empleado;
    private $id_novedades;
    private $valor;
    

    public function __construct($fecha, $valor, $id_empleado, $id_novedades)
    {
        $this->fecha = $fecha;
        $this->valor = $valor;
        $this->id_empleado = $id_empleado;
        $this->id_novedades = $id_novedades;
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

    // public function empleados(){
        
    //     return $empleado-

    // }

public function get(){
    $this->query = "SELECT e.*, n.descripcion, ne.valor, ne.fecha
    FROM empleado e
    INNER JOIN tiene_novedad tn ON e.id = tn.idempleado
    INNER JOIN novedadesempleados ne ON tn.idempleado = ne.idempleado AND tn.idnovedad = ne.idnovedad
    INNER JOIN novedades n ON ne.idnovedad = n.idnovedades";
    $this->get_results_from_query();
    return $this->rows;

}

public function edit(){

    $this->query = "UPDATE novedadesempleados ne
    INNER JOIN tiene_novedad tn ON ne.idempleado = tn.idempleado AND ne.idnovedad = tn.idnovedad
    SET ne.valor = $this->valor, ne.fecha = '$this->fecha'
    WHERE tn.idempleado = '$this->id_empleado' AND tn.idnovedad = '$this->id_novedades'";
    $this->execute_single_query();
    
}

public function set(){
    $this->query = "INSERT INTO novedadesempleados (fecha, valor, idempleado, idnovedad) VALUES ('$this->fecha', '$this->valor', '$this->id_empleado', '$this->id_novedades')";
    $this->execute_single_query();
    $this->query = "INSERT INTO tiene_novedad (idempleado, idnovedad) VALUES ('$this->id_empleado', '$this->id_novedades')";
    $this->execute_single_query();


}

public function delete(){
    $this->query = "DELETE FROM novedadesempleados WHERE idempleado = '$this->id_empleado' AND idnovedad = '$this->id_novedades'";
    $this->execute_single_query();
    $this->query = "DELETE FROM tiene_novedad WHERE idempleado = '$this->id_empleado' AND idnovedad = '$this->id_novedades'";
    $this->execute_single_query();



}

}
