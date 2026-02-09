<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Seguridad - Personal</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 30px; background-color: #f8f9fa; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #eee; text-align: left; }
        th { background-color: #34495e; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 5px; color: white; font-size: 14px; display: inline-block; }
        .btn-add { background-color: #27ae60; margin-bottom: 20px; }
        .btn-edit { background-color: #3498db; margin-right: 5px; }
        .btn-delete { background-color: #e74c3c; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Personal de Seguridad - Ciudadela</h1>
        <a href="/gestion-seguridad/public/index.php?action=create" class="btn btn-add">+ Registrar Nuevo Personal</a>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Cargo</th>
                    <th>Sueldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guardias as $g): ?>
                <tr>
                    <td><?php echo $g['nombres']; ?></td>
                    <td><?php echo $g['cedula']; ?></td>
                    <td><?php echo $g['cargo']; ?></td>
                    <td>$<?php echo number_format($g['sueldo'], 2); ?></td>
                    <td>
                        <a href="/gestion-seguridad/public/index.php?action=edit&id=<?php echo $g['id']; ?>" class="btn btn-edit">Editar</a>
                        <a href="/gestion-seguridad/public/index.php?action=delete&id=<?php echo $g['id']; ?>" 
                           class="btn btn-delete" 
                           onclick="return confirm('¿Estás seguro de eliminar a este trabajador?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>