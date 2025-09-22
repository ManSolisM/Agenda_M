<?php
    include "header.php";
    include "clases/Crud.php";
    $crud = new Crud();
    $contacto = $crud->show($_GET["id"]);
?>

<div class="container-custom">
    <div class="card-custom animated">
        <div class="card-header-custom">
            <i class="fas fa-address-book icon"></i>
            <h1>Actualizar Contacto</h1>
        </div>
        
        <!-- CAMBIO IMPORTANTE: El formulario debe enviar a update.php, no store.php -->
        <form action="server/update.php" method="post" enctype="multipart/form-data">
            
            <!-- CAMPO OCULTO: Para enviar el ID del contacto -->
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            
            <div class="form-row">
                <div class="form-group-custom animated">
                    <label for="paterno" class="form-label-custom">
                        <i class="fas fa-user"></i> Apellido Paterno
                    </label>
                    <div class="input-group-custom">
                        <i class="input-icon fas fa-user"></i>
                        <input value="<?php echo $contacto['paterno']; ?>" type="text" name="paterno" id="paterno" class="form-control-custom with-icon" placeholder="Ingresa el apellido paterno" required>
                    </div>
                </div>

                <div class="form-group-custom animated">
                    <label for="materno" class="form-label-custom">
                        <i class="fas fa-user"></i> Apellido Materno
                    </label>
                    <div class="input-group-custom">
                        <i class="input-icon fas fa-user"></i>
                        <input value="<?php echo $contacto['materno']; ?>" type="text" name="materno" id="materno" class="form-control-custom with-icon" placeholder="Ingresa el apellido materno">
                    </div>
                </div>
            </div>

            <div class="form-group-custom animated">
                <label for="nombre" class="form-label-custom">
                    <i class="fas fa-id-card"></i> Nombre
                </label>
                <div class="input-group-custom">
                    <i class="input-icon fas fa-id-card"></i>
                    <input value="<?php echo $contacto['nombre']; ?>" type="text" name="nombre" id="nombre" class="form-control-custom with-icon" placeholder="Ingresa el nombre completo" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group-custom animated">
                    <label for="telefono" class="form-label-custom">
                        <i class="fas fa-phone"></i> Número Telefónico
                    </label>
                    <div class="input-group-custom">
                        <i class="input-icon fas fa-phone"></i>
                        <input value="<?php echo $contacto['telefono']; ?>" type="tel" name="telefono" id="telefono" class="form-control-custom with-icon" placeholder="Ej: +52 55 1234 5678" required>
                    </div>
                </div>

                <div class="form-group-custom animated">
                    <label for="correo" class="form-label-custom">
                        <i class="fas fa-envelope"></i> Correo Electrónico
                    </label>
                    <div class="input-group-custom">
                        <i class="input-icon fas fa-envelope"></i>
                        <input value="<?php echo $contacto['correo']; ?>" type="email" name="correo" id="correo" class="form-control-custom with-icon" placeholder="ejemplo@correo.com" required>
                    </div>
                </div>
            </div>

            <!-- CORREGIDO: Los textarea no usan value, usan el contenido entre las etiquetas -->
            <div class="form-group-custom animated">
                <label for="descripcion" class="form-label-custom">
                    <i class="fas fa-comment-alt"></i> Descripción
                </label>
                <div class="input-group-custom">
                    <i class="input-icon fas fa-comment-alt"></i>
                    <textarea name="descripcion" id="descripcion" class="form-control-custom with-icon" rows="4" placeholder="Información adicional del contacto..."><?php echo $contacto['descripcion']; ?></textarea>
                </div>
            </div>

            <div class="form-group-custom animated">
                <label class="form-label-custom">
                    <i class="fas fa-camera"></i> Foto del Contacto
                </label>
                <div class="file-upload-custom">
                    <input type="file" name="foto" id="foto" accept="image/*">
                    <label for="foto" class="file-upload-label">
                        <div class="file-upload-text">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <strong>Haz clic para seleccionar una foto</strong>
                            <br>
                            <small>Formatos permitidos: JPG, PNG</small>
                        </div>
                    </label>
                </div>
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn-custom">
                    <i class="fas fa-edit"></i> Actualizar Contacto
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>