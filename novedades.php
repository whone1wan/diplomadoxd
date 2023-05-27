<?php 
include_once('connection.php');
class novedades extends ConnectionDB {
    protected $id_novedades;
    protected $descripcion;
    protected $tipo;

    public function __construct($id_novedades='', $descripcion='', $tipo='')
    {
        $this->id_novedades = $id_novedades;
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
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
        if ($this->id_novedades != '') :
            $this->query = "
        SELECT *
        FROM novedades
        WHERE id = '$this->id_novedades'
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
        if ($this->id_novedades != '') :
            $this->get($this->id_novedades);
            if ($this->id_novedades != $this->id_novedades) :
                foreach ($this as $campo => $valor) :
                    $$campo = $valor;
                endforeach;
                $this->query = "
                INSERT INTO novedades
                ( descripcion, tipo)
                VALUES
                ( '$descripcion', '$tipo')
                ";
                $this->execute_single_query();
            endif;
        endif;
    }

    public function edit()
    {
        foreach ($this as $campo => $valor) :
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE novedades
        SET descripcion='$descripcion',
        tipo='$tipo'
        WHERE id = '$id_novedades'
        ";
        $this->execute_single_query();
    }

    public function delete()
    {
        $this->query = "
        DELETE FROM novedades
        WHERE id = '$this->id_novedades'
        ";
        $this->execute_single_query();
    }

    public function __destruct()
    {
       
    }

    public function getAllNovedades()
    {
        $this->query = "
        SELECT *
        FROM novedades
        ";
        $this->get_results_from_query();
        $novedades = $this->rows;
        return $novedades;
    }

    // public function get_novedades_by_id($id)
    // {
    //     $this->query = "
    //     SELECT *
    //     FROM novedades
    //     WHERE id = '$id'
    //     ";
    //     $this->get_results_from_query();
    //     $novedades = $this->rows;
    //     return $novedades;
    // }


    

    // public function get($id='')
    // {
    //     if ($id != '') :
    //         $this->query = "
    //     SELECT *
    //     FROM novedades
    //     WHERE id = '$id'
    //     ";
    //         $this->get_results_from_query();
    //     endif;
    //     if (count($this->rows) == 1) :
    //         foreach ($this->rows[0] as $propiedad => $valor) :
    //             $this->$propiedad = $valor;
    //         endforeach;
    //     endif;
    // }

    // public function set($novedad_data = array())
    // {
    //     if (array_key_exists('id', $novedad_data)) : // Verifico si existe el email en el array
    //         $this->get($novedad_data['id']);
    //         if ($novedad_data['id'] != $this->id) :
    //             foreach ($novedad_data as $campo => $valor) :
    //                 $$campo = $valor;
    //             endforeach;
    //             $this->query = "
    //             INSERT INTO novedades
    //              descripcion, tipo)
    //             VALUES
    //             ('$descripcion', '$tipo')
    //             ";
    //             $this->execute_single_query();
    //             $this->id = $id;

    //         endif;
    //     endif;
    // }

    // public function edit($novedad_data = array())
    
    // {
    //     foreach ($novedad_data as $campo => $valor) :
    //         $$campo = $valor;
    //     endforeach;
    //     $this->query = "
    //     UPDATE novedades
    //     SET descripcion='$descripcion',
    //     tipo='$tipo'
    //     WHERE id = '$id'
    //     ";
    //     $this->execute_single_query();
    // }

    // public function delete($id = '')
    // {
    //     $this->query = "
    //     DELETE FROM novedades
    //     WHERE id = '$id'
    //     ";
    //     $this->execute_single_query();
    // }

    // function __destruct()
    // {
    // }

}