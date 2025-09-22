<?php
    include "conexion.php";

    class Crud extends conexion{
        public function store($datos){
            $conn = parent::conectar();
            $sql = "INSERT INTO t_contactos(paterno,
                                           materno,
                                           nombre,
                                           telefono,
                                           correo,
                                           descripcion)
                    VALUES ('". $datos["paterno"] ."',
                            '". $datos["materno"] ."',
                            '". $datos["nombre"] ."',
                            '". $datos["telefono"] ."',
                            '".$datos["correo"] ."',
                            '". $datos["descripcion"] ."' 
                                                    )";
            $exec = mysqli_query($conn,$sql);
            $id_contacto = mysqli_insert_id($conn);

            return $id_contacto;

;
        }


        // Esto funciona para mostrar los registros
        // con este show all mandamos a llmar a todos 
        public function show_all(){
            $conn = parent::conectar();
            // A este punto esto es una cadena |as o AS no hay problema porque es una palabra reservada pero se recomienda que sea en mayusculas
            $sql = "SELECT C.* , F.nombre AS foto
                    FROM t_contactos AS C 
                    INNER JOIN t_fotos AS F
                    ON C.id = F.id_contacto
                    ";
            $exec = mysqli_query($conn, $sql);
            // Arreglo vacio para almacenar
            $datos = array();
            // gracias al mysqli hace la roptura automaticamente por ello no hay necesidad de colocar una
            while($row = mysqli_fetch_assoc($exec)){
                $datos[] = $row;
            }
            return $datos;
        }

        // Esta parte elimina los registros
        public function destroy($id) {
            $conn = parent::conectar();
            $sql = "DELETE FROM t_contactos WHERE id = '$id'";
            $exec = mysqli_query($conn, $sql);
            return $exec;
        }

        public function show($id){
            $conn = parent::conectar();
            $sql = "SELECT * FROM t_contactos WHERE id = '$id'";
            $exec = mysqli_query($conn, $sql);
        // el fetch array convierte en un arreglo la ejecucion del query
            $contacto = mysqli_fetch_assoc($exec);
            return $contacto;
        }
        public function update($id, $datos){
            $conn = parent::conectar();
            $paterno = $datos["paterno"];
            $materno = $datos["materno"];
            $nombre = $datos["nombre"];
            $telefono = $datos["telefono"];
            $correo = $datos["correo"];
            $descripcion = $datos["descripcion"];

            $sql = "UPDATE t_contactos SET  paterno = '$paterno',
                                            materno = '$materno',
                                            nombre = '$nombre',
                                            telefono = '$telefono',
                                            correo = '$correo',
                                            descripcion = '$descripcion'
                        WHERE id = '$id'";

            $exec = mysqli_query($conn,$sql);
            return $exec;
        }

        public function store_path($id_contacto, $nombre, $ruta){
            // Aqui estamos mandando la referencia de la imagen, texto, no la imagen
            $conn = parent::conectar();
            $sql = "INSERT INTO t_fotos (id_contacto, nombre, ruta) VALUES ('$id_contacto', '$nombre', '$ruta')";
            // mysqli_query retorna 0 o 1, true o false 
            $exec = mysqli_query($conn, $sql);
            // entonces se retorna algo logico; 0 o 1
            return $exec;
        }
    }
?>