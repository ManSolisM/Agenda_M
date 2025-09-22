<?php
//SIRVE PARA VER QUE CONTIENE UN OBJETO
/*     echo "<pre>";
    var_dump($_POST);
    echo "</pre>"; */

// lo que esta del lado izquierdo es el nombre que uno le asigna a los inputs mientras que lo de la derecha es el nombre del input 
    include "../clases/Crud.php";
    // include "../clases/Crud.php"; --> revisar porque no funciona si activo este 
    $crud = new Crud(); 

    $datos = [
        "paterno" => $_POST["paterno"],
        "materno" => $_POST["materno"],
        "nombre" => $_POST["nombre"],
        "telefono" => $_POST["telefono"],
        "correo" => $_POST["correo"],
        "descripcion" => $_POST["descripcion"]

    ];

    $datos_file = [ // [foto] -> nombre del archivo,, nombre de control ... [name] -> nombre de la propiedad/control, llave de type
        "nombre" => $_FILES["foto"]["name"], // el nombre que ira como referencia a la tabla, este es el de los input, los name
        // tmp es donde se alojara la imagen
        "origen" => $_FILES["foto"]["tmp_name"], // saber de donde viene, por eso le pusimos origen
        "destino" => "../public/upload/" . $_FILES["foto"]["name"] 
    ];

    $id_contacto = $crud->store($datos);

    if ($id_contacto > 0) {
        // se esta mandando por parametros el nombre y el destino que tenemos arriba
        if($crud->store_path($id_contacto, $datos_file["nombre"], $datos_file["destino"])){
            // move_uploaded_file es para subir el archivo en la carpeta. move -> mover | uploaded_file -> subir archivo
            // retorna valores booleanos (true o false / 0 o 1)
            if(move_uploaded_file($datos_file["origen"], $datos_file["destino"]))
                {
                    header("location:../index.php");
                    echo "bien";
            } else {
                echo "Fallo al mover";
            }
        } else {
            echo "Fallo al agregar la ruta";
        }
    } else {
        echo "Fallo al agregar ";
    }
    // mediante un metodo con el nombre del control y con la llave de type 
    // request algo que mandas al servidor por medio del http 
    // uno puede hacer un request por medio de un verbo http los cuales son POST, GET, PUT, DELETE
        // Los rquest para utilizar archivos se usan con FILES -> contiene informacion de archivos para tenerla en una carpeta
        //var_dump te imprime lo que sea mientras contega informacion, en este caso lo que hay en FILES
        // es recomendable guardar las imagenes o archivos en nuestro servidor
        // estara una carpeta llamada upload para guardar los archivos a subir
        // la etiqueta <pre> le da mejor salida de estructura a un elemento
/*     echo "<pre>";
        var_dump($_FILES);
    echo "</pre>"; */
?>