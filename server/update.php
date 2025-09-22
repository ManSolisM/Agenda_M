<?php
include "../clases/Crud.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $crud = new Crud();
    
    $id = $_POST['id'];
    $datos = array(
        'paterno' => $_POST['paterno'],
        'materno' => $_POST['materno'],
        'nombre' => $_POST['nombre'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'],
        'descripcion' => $_POST['descripcion']
    );
    
    $resultado = $crud->update($id, $datos);
    
    if($resultado){
        // Redireccionar de vuelta a la lista de contactos o página principal
        header("Location: ../index.php?mensaje=actualizado");
        exit();
    } else {
        // En caso de error
        header("Location: ../edit.php?id=$id&error=1");
        exit();
    }
} else {
    // Si no es POST, redireccionar
    header("Location: ../index.php");
    exit();
}
?>