<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nuevo Personal</title>
    <style>
        /* Reusamos el mismo estilo para mantener coherencia */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-card { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 350px; }
        h2 { color: #333; text-align: center; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn-save { width: 100%; background-color: #27ae60; color: white; border: none; padding: 12px; cursor: pointer; border-radius: 4px; font-weight: bold; }
        .btn-save:hover { background-color: #219150; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Nuevo Registro</h2>
        <form action="/gestion-seguridad/public/index.php?action=store" method="POST">
            
            <label>Nombre Completo:</label>
            <input type="text" name="nombres" placeholder="Ej: Juan Pérez" required>
            
            <label>Cédula:</label>
            <input type="text" name="cedula" placeholder="10 dígitos" required maxlength="10">
            
            <label>Cargo:</label>
            <select name="cargo" required>
                <option value="">Seleccione...</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Guardia">Guardia</option>
            </select>
            
            <label>Sueldo Mensual:</label>
            <input type="number" name="sueldo" placeholder="0.00" step="0.01" required>
            
            <button type="submit" class="btn-save">Guardar Personal</button>
        </form>
        <a href="/gestion-seguridad/public/index.php" class="back-link">← Cancelar y Volver</a>
    </div>

    <script src="/gestion-seguridad/public/js/main.js"></script>
</body>
</html>