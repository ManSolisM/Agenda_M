<?php
    class Conexion {
        public function conectar(){
            $host = "localhost";
            $usuario = "backend";
            $password = "backend2025";
            $base = "b221190042_agenda";
            $conexion = mysqli_connect(
                $host, $usuario, $password, $base
            );
            return $conexion;

        }
    }
    $obj = new Conexion();
    if($obj ->conectar()) {
        echo "";
    }else{
        echo "no";
    }
?>
