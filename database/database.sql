CREATE DATABASE seguridad_db;
USE seguridad_db;

CREATE TABLE guardias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    cedula VARCHAR(10) NOT NULL UNIQUE,
    cargo VARCHAR(50) NOT NULL, -- Aquí pondremos 'Supervisor' o 'Guardia'
    sueldo DECIMAL(10, 2) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Datos de ejemplo (Tú y tus compañeros)
INSERT INTO guardias (nombres, cedula, cargo, sueldo) VALUES 
('Fausto Valarezo', '0706552775', 'Supervisor', 500.00),
('Alejandro Burbano', '0999999991', 'Guardia', 500.00),
('José Urbina', '0999999992', 'Guardia', 500.00);