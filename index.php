<?php
    include "header.php";
    include "clases/Crud.php";
    $crud = new Crud();
    $contactos = $crud->show_all();
?>

<style>
        :root {
            --primary-navy: #3730a3;
            --accent-gold: #f39c12;
            --background-light: #f8f9fa;
            --text-dark: #3f4142ff;
            --text-light: #6c757d;
            --text-muted: #868e96;
            --border-light: #e9ecef;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .header-section {
            background: linear-gradient(135deg, var(--primary-navy) 0%, #06bcd4ff 100%);
            color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .icon {
            width: 60px;
            height: 60px;
            background: var(--accent-gold);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .controls-section {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .controls-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .search-section {
            flex: 1;
            min-width: 300px;
        }

        .search-field {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .search-input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 2px solid var(--border-light);
            border-radius: 8px;
            font-size: 0.9rem;
            transition: var(--transition);
            background: white;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-navy);
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary-navy);
            color: white;
        }

        .btn-primary:hover {
            background: #34495e;
            transform: translateY(-2px);
        }

        .contacts-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--background-light);
        }

        .table-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .results-count {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .contacts-table {
            width: 100%;
            border-collapse: collapse;
        }

        .contacts-table th {
            background: var(--background-light);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 0.875rem;
            border-bottom: 2px solid var(--border-light);
        }

        .contacts-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-light);
            font-size: 0.875rem;
        }

        .contacts-table tbody tr:hover {
            background: rgba(44, 62, 80, 0.05);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-muted);
            display: none;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state h3 {
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .fade-in {
            opacity: 1;
        }

        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        .contact-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-light);
        }

        .phone-copy {
            font-family: 'Courier New', monospace;
            background: var(--background-light);
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            border: 1px solid var(--border-light);
            cursor: pointer;
            user-select: none;
            transition: var(--transition);
        }

        .phone-copy:hover {
            background: var(--primary-navy);
            color: white;
        }

        .email-link {
            color: var(--primary-navy);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .email-link:hover {
            color: var(--accent-gold);
        }

        .description-text {
            max-width: 200px;
            font-size: 0.8125rem;
            color: var(--text-light);
            line-height: 1.4;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .action-buttons {
            display: flex;
            gap: 0.25rem;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            background: var(--background-light);
            color: var(--text-muted);
            transition: var(--transition);
            text-decoration: none;
        }

        .action-btn.edit:hover {
            background: var(--accent-gold);
            color: white;
        }

        .action-btn.delete:hover {
            background: #ef4444;
            color: white;
        }

        @media (max-width: 768px) {
            .controls-row {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-section {
                min-width: auto;
            }

            .contacts-table {
                font-size: 0.8rem;
            }

            .contacts-table th,
            .contacts-table td {
                padding: 0.5rem;
            }
        }
    </style>

    
</head>


    <header class="header-section">
        <div class="header-content">
            <div class="header-title">
                <div class="icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <div>
                    <h1>Directorio de Contactos</h1>
                    <p style="margin: 0; opacity: 0.8; font-size: 0.875rem;">Agenda</p>
                </div>
            </div>
    </header>

    <main class="main-container">
        <section class="controls-section fade-in">
            <div class="controls-row">
                <div class="search-section">
                    <div class="search-field">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Buscar por nombre, email o teléfono..." id="searchInput">
                    </div>
                </div>
                <div class="action-buttons">
                    <!-- <button class="btn btn-secondary">
                        <i class="fas fa-download"></i>
                        Exportar
                    </button> -->
                    <a href="create.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Nuevo Contacto
                    </a>
                </div>
            </div>
        </section>

        <section class="contacts-container fade-in">
            <div class="table-header">
                <div class="table-title">
                    <i class="fas fa-users"></i>
                    Lista de Contactos
                </div>
                <div class="results-count">
                    <span id="resultsCount"></span> Contactos
                </div>
            </div>

            <table class="contacts-table" id="contactsTable">
                <thead>
                    <tr>
                        <th><i class="fas fa-image"></i> Foto</th>
                        <th><i class="fas fa-user"></i> Nombre Completo</th>
                        <th><i class="fas fa-user-tag"></i> Apellido Paterno</th>
                        <th><i class="fas fa-user-tag"></i> Apellido Materno</th>
                        <th><i class="fas fa-phone"></i> Teléfono</th>
                        <th><i class="fas fa-envelope"></i> Correo Electrónico</th>
                        <th><i class="fas fa-comment"></i> Descripción</th>
                        <th><i class="fas fa-cog"></i> Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($contactos as $contacto):
                            $id = $contacto["id"];
                    ?>
                    <!-- Aquí van los datos dinámicos de PHP -->
                    
                        <td>
                            <div class="photo-preview">
                                <img src="<?php echo "public/upload/".$contacto["foto"] ?>" alt="Foto" class="photo-thumb">
                            </div>
                            

                            <!-- <a href="https://lordicon.com/" target="_blank">
                                <video autoplay loop muted playsinline width="60" height="60">
                                    <source src="./public/img/wired-outline-63-home-hover-3d-roll.mp4" type="video/mp4">
                                    Tu navegador no soporta videos HTML5.
                                </video>
                            </a> -->

                        </td>
                        <td style="font-weight: 600; color: var(--text-dark);">
                            <?php echo $contacto["nombre"] ?>
                        </td>
                        <td><?php echo $contacto["paterno"] ?></td>
                        <td><?php echo $contacto["materno"] ?></td>

                        <td>
                            <span style="font-family: 'Courier New', monospace; background: var(--background-light); padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem; border: 1px solid var(--border-light); cursor: pointer; user-select: none;"
                                onclick="copyToClipboard('<?php echo $contacto['telefono'] ?>', this)"
                                title="Clic para copiar">
                                <?php echo $contacto["telefono"] ?>
                            </span>
                        </td>
                        <td>
                            <a href="mailto:<?php echo $row['correo']; ?>" 
                               style="color: var(--primary-navy); text-decoration: none; font-weight: 500;">
                                <?php echo $contacto["correo"]?>
                            </a>
                        </td>
                        <td>
                            <div style="max-width: 200px; font-size: 0.8125rem; color: var(--text-light); line-height: 1.4; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                <?php echo $contacto["descripcion"] ?>
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.25rem;">
                                <!-- <button onclick="viewContact(<?php echo $row['id']; ?>)" 
                                        style="width: 32px; height: 32px; border: none; border-radius: 4px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; background: var(--background-light); color: var(--text-muted); transition: var(--transition);" 
                                        title="Ver detalles"
                                        onmouseover="this.style.background='var(--primary-navy)'; this.style.color='white';"
                                        onmouseout="this.style.background='var(--background-light)'; this.style.color='var(--text-muted)';">
                                    <i class="fas fa-eye"></i>
                                </button> -->
                                <a href="edit.php?id=<?php echo $id; ?>"
                                    style="width: 32px; height: 32px; border: none; border-radius: 4px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; background: var(--background-light); color: var(--text-muted); transition: var(--transition); text-decoration: none;" 
                                    title="Editar"
                                    onmouseover="this.style.background='var(--accent-gold)'; this.style.color='white';"
                                    onmouseout="this.style.background='var(--background-light)'; this.style.color='var(--text-muted)';">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="server/destroy.php?id=<?php echo $id; ?> "
                                    style="width: 32px; height: 32px; border: none; border-radius: 4px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; background: var(--background-light); color: var(--text-muted); transition: var(--transition);" 
                                    title="Eliminar"
                                    onmouseover="this.style.background='#ef4444'; this.style.color='white';"
                                    onmouseout="this.style.background='var(--background-light)'; this.style.color='var(--text-muted)';">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                   
                <?php endforeach; ?>

                </tbody>
                
                    
            </table>

            <!-- Estado vacío (se muestra cuando no hay contactos) -->
            <div class="empty-state" id="emptyState">
                <i class="fas fa-address-book"></i>
                <h3>Contactos registrados</h3>
                <p>Comience agregando sus contacto pendientes haciendo clic en el botón "Nuevo Contacto".</p>
            </div>

            <!-- <div class="pagination">
                <div class="pagination-info">
                    Mostrando 0-0 de 0 contactos
                </div>
                <div class="pagination-controls">
                    <button class="page-btn" disabled>‹</button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">›</button>
                </div>
            </div> -->
        </section>
    </main>

    <script>
        // Función de búsqueda mejorada
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            filterContacts(searchTerm);
        });

        function filterContacts(searchTerm) {
            const table = document.getElementById('contactsTable');
            const tbody = table.getElementsByTagName('tbody')[0];
            const rows = tbody.getElementsByTagName('tr');
            let visibleCount = 0;
            
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let showRow = false;
                
                if (!searchTerm) {
                    // Si no hay término de búsqueda, mostrar todas las filas
                    showRow = true;
                } else {
                    // Buscar en todas las celdas de la fila
                    for (let j = 0; j < cells.length; j++) {
                        const cellText = cells[j].textContent.toLowerCase();
                        if (cellText.includes(searchTerm)) {
                            showRow = true;
                            break;
                        }
                    }
                }
                
                // Mostrar u ocultar la fila con animación suave
                if (showRow) {
                    row.style.display = '';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                    row.style.opacity = '0';
                    row.style.transform = 'translateY(-10px)';
                }
            }
            
            // Actualizar contador de resultados
            document.getElementById('resultsCount').textContent = visibleCount;
            
            // Mostrar/ocultar estado vacío
            const emptyState = document.getElementById('emptyState');
            const tableContainer = document.querySelector('.contacts-table');
            
            if (visibleCount === 0) {
                emptyState.style.display = 'block';
                tableContainer.style.display = 'none';
                if (searchTerm) {
                    emptyState.querySelector('h3').textContent = 'No se encontraron contactos';
                    emptyState.querySelector('p').textContent = `No hay resultados para "${searchTerm}". Intente con otros términos de búsqueda.`;
                }
            } else {
                emptyState.style.display = 'none';
                tableContainer.style.display = 'table';
            }
        }

        // Función para copiar al portapapeles mejorada
        function copyToClipboard(text, element) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(function() {
                    showCopyFeedback(element, true);
                }).catch(function() {
                    fallbackCopyTextToClipboard(text, element);
                });
            } else {
                fallbackCopyTextToClipboard(text, element);
            }
        }

        function fallbackCopyTextToClipboard(text, element) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-999999px";
            textArea.style.top = "-999999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            
            try {
                const successful = document.execCommand('copy');
                showCopyFeedback(element, successful);
            } catch (err) {
                showCopyFeedback(element, false);
            }
            
            document.body.removeChild(textArea);
        }

        function showCopyFeedback(element, success) {
            const originalText = element.textContent;
            const originalStyles = {
                backgroundColor: element.style.backgroundColor,
                color: element.style.color,
                borderColor: element.style.borderColor
            };
            
            if (success) {
                element.textContent = '¡Copiado!';
                element.style.backgroundColor = '#d4edda';
                element.style.color = '#155724';
                element.style.borderColor = '#c3e6cb';
            } else {
                element.textContent = 'Error';
                element.style.backgroundColor = '#f8d7da';
                element.style.color = '#721c24';
                element.style.borderColor = '#f5c6cb';
            }
            
            setTimeout(function() {
                element.textContent = originalText;
                element.style.backgroundColor = originalStyles.backgroundColor;
                element.style.color = originalStyles.color;
                element.style.borderColor = originalStyles.borderColor;
            }, 1500);
        }

        // Función para eliminar contacto
        function deleteContact(id) {
            if (confirm('¿Está seguro de que desea eliminar este contacto?\n\nEsta acción no se puede deshacer.')) {
                // Aquí conectarías con tu backend PHP
                console.log('Eliminando contacto ID:', id);
                // window.location.href = 'delete_contact.php?id=' + id;
            }
        }

        // Inicializar la página
        document.addEventListener('DOMContentLoaded', function() {
            // Contar contactos iniciales
            const initialCount = document.querySelectorAll('#contactsTable tbody tr').length;
            document.getElementById('resultsCount').textContent = initialCount;
            
            // Animaciones de entrada
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.5s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Limpiar búsqueda con Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const searchInput = document.getElementById('searchInput');
                searchInput.value = '';
                filterContacts('');
                searchInput.focus();
            }
        });
    </script>

</body>
</html>