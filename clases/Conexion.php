<?php
    class Conexion {
        public function conectar(){
            $host = "localhost";
            $usuario = "root";
            $password = "";
            $base = "agenda2";
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