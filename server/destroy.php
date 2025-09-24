<?php 
include "../clases/Crud.php";

// Verificar si se recibió el código de confirmación
if (!isset($_POST['codigo_confirmacion']) || $_POST['codigo_confirmacion'] !== '2468') {
    // Si no hay código o es incorrecto, mostrar formulario de confirmación
    $id = $_GET['id'];
    $crud = new Crud();
    
    // Obtener datos del contacto para mostrar en la confirmación
    $contacto = $crud->show($id);
    
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            :root {
                --primary-navy: #3730a3;
                --danger-red: #ef4444;
                --background-light: #f8f9fa;
                --text-dark: #3f4142;
                --border-light: #e9ecef;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f0f2f5;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                padding: 1rem;
            }

            .confirmation-modal {
                background: white;
                border-radius: 16px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                max-width: 500px;
                width: 100%;
                overflow: hidden;
                animation: slideIn 0.3s ease-out;
            }

            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .modal-header {
                background: linear-gradient(135deg, var(--danger-red), #dc2626);
                color: white;
                padding: 2rem;
                text-align: center;
            }

            .warning-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
                opacity: 0.9;
            }

            .modal-title {
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
            }

            .modal-subtitle {
                opacity: 0.9;
                font-size: 0.9rem;
            }

            .modal-body {
                padding: 2rem;
            }

            .contact-info {
                background: var(--background-light);
                border-radius: 12px;
                padding: 1.5rem;
                margin-bottom: 2rem;
                border-left: 4px solid var(--danger-red);
            }

            .contact-name {
                font-size: 1.2rem;
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 0.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .contact-details {
                font-size: 0.9rem;
                color: #666;
                line-height: 1.4;
            }

            .security-section {
                text-align: center;
                margin-bottom: 2rem;
            }

            .security-text {
                font-size: 0.95rem;
                color: var(--text-dark);
                margin-bottom: 1rem;
                line-height: 1.5;
            }

            .code-display {
                display: inline-block;
                background: linear-gradient(135deg, var(--primary-navy), #4f46e5);
                color: white;
                padding: 1rem 2rem;
                border-radius: 12px;
                font-size: 2rem;
                font-weight: 700;
                font-family: 'Courier New', monospace;
                letter-spacing: 0.5rem;
                margin-bottom: 1.5rem;
                box-shadow: 0 4px 15px rgba(55, 48, 163, 0.3);
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                display: block;
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
            }

            .form-input {
                width: 100%;
                padding: 1rem;
                border: 2px solid var(--border-light);
                border-radius: 8px;
                font-size: 1.1rem;
                text-align: center;
                font-family: 'Courier New', monospace;
                letter-spacing: 0.2rem;
                transition: all 0.3s ease;
            }

            .form-input:focus {
                outline: none;
                border-color: var(--primary-navy);
                box-shadow: 0 0 0 3px rgba(55, 48, 163, 0.1);
            }

            .modal-actions {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .btn {
                padding: 1rem 2rem;
                border: none;
                border-radius: 8px;
                font-size: 0.9rem;
                font-weight: 600;
                cursor: pointer;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                transition: all 0.3s ease;
                min-width: 140px;
                justify-content: center;
            }

            .btn-danger {
                background: var(--danger-red);
                color: white;
            }

            .btn-danger:hover:not(:disabled) {
                background: #dc2626;
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
            }

            .btn-secondary {
                background: var(--border-light);
                color: var(--text-dark);
                border: 2px solid var(--border-light);
            }

            .btn-secondary:hover {
                background: #dee2e6;
                transform: translateY(-2px);
            }

            .btn:disabled {
                opacity: 0.6;
                cursor: not-allowed;
            }

            .warning-message {
                background: #fef3cd;
                border: 1px solid #ffeaa7;
                border-radius: 8px;
                padding: 1rem;
                margin-bottom: 1.5rem;
                font-size: 0.85rem;
                color: #856404;
                text-align: center;
                line-height: 1.4;
            }

            @media (max-width: 480px) {
                .modal-header {
                    padding: 1.5rem;
                }
                
                .modal-body {
                    padding: 1.5rem;
                }
                
                .code-display {
                    font-size: 1.5rem;
                    padding: 0.75rem 1.5rem;
                    letter-spacing: 0.3rem;
                }
                
                .modal-actions {
                    flex-direction: column;
                }
            }
        </style>
    </head>
    <body>
        <div class="confirmation-modal">
            <div class="modal-header">
                <div class="warning-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h2 class="modal-title">¿Eliminar Contacto?</h2>
                <p class="modal-subtitle">Esta acción no se puede deshacer</p>
            </div>

            <div class="modal-body">
                <div class="contact-info">
                    <div class="contact-name">
                        <i class="fas fa-user"></i>
                        <?php echo $contacto["nombre"] . " " . $contacto["paterno"] . " " . $contacto["materno"]; ?>
                    </div>
                    <div class="contact-details">
                        <i class="fas fa-phone"></i> <?php echo $contacto["telefono"]; ?><br>
                        <i class="fas fa-envelope"></i> <?php echo $contacto["correo"]; ?>
                    </div>
                </div>

                <div class="warning-message">
                    <i class="fas fa-info-circle"></i>
                    <strong>Advertencia:</strong> Al eliminar este contacto se perderán todos sus datos de forma permanente.
                </div>

                <div class="security-section">
                    <p class="security-text">
                        Para confirmar la eliminación, ingrese el código:
                    </p>
                </div>

                <form method="POST" action="" id="confirmForm">
                    <input type="hidden" name="contacto_id" value="<?php echo $id; ?>">
                    
                    <div class="form-group">
                        <label for="codigo_confirmacion" class="form-label">
                            Ingrese el código de confirmación:
                        </label>
                        <input 
                            type="text" 
                            id="codigo_confirmacion" 
                            name="codigo_confirmacion" 
                            class="form-input" 
                            placeholder="0000"
                            maxlength="4"
                            required
                            autocomplete="off">
                    </div>

                    <div class="modal-actions">
                        <a href="../index.php" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-danger" id="confirmBtn" disabled>
                            <i class="fas fa-trash"></i>
                            Eliminar Contacto
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const codigoInput = document.getElementById('codigo_confirmacion');
            const confirmBtn = document.getElementById('confirmBtn');

            codigoInput.addEventListener('input', function() {
                const valor = this.value;
                this.value = valor.replace(/[^0-9]/g, '');
                
                if (this.value === '2468') {
                    confirmBtn.disabled = false;
                    this.style.borderColor = '#22c55e';
                    this.style.backgroundColor = '#f0fdf4';
                } else {
                    confirmBtn.disabled = true;
                    this.style.borderColor = this.value.length === 4 ? '#ef4444' : '#e9ecef';
                    this.style.backgroundColor = this.value.length === 4 ? '#fef2f2' : 'white';
                }
            });

            codigoInput.focus();

            document.getElementById('confirmForm').addEventListener('submit', function(e) {
                if (codigoInput.value !== '2468') {
                    e.preventDefault();
                    alert('El código ingresado no es correcto. Lo siento no puedes eliminar ');
                    codigoInput.focus();
                    return false;
                }
                
                confirmBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Eliminando...';
                confirmBtn.disabled = true;
            });
        </script>
    </body>
    </html>
    <?php
    exit();
}

// Si llegamos aquí, el código fue validado correctamente
$id = $_POST['contacto_id'];
$crud = new Crud();

//Obtener la foto antes de eliminar el contacto
$foto = $crud->get_foto_contacto($id);

// Eliminar primero la foto de la base de datos (por restricción de clave foránea)
$crud->eliminar_foto_contacto($id);

if($crud->destroy($id)){
    //Eliminar la foto fisica si existe 
    if ($foto && file_exists($foto["ruta"])){
        unlink($foto["ruta"]);
    }
    header("location: ../index.php");
}else {
    echo "Fallo al eliminar";
}
?>
