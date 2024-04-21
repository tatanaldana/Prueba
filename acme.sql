-- Crear la base de datos "acne" si no existe
CREATE DATABASE IF NOT EXISTS acne;

-- Seleccionar la base de datos
USE acne;

-- Crear la tabla Usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    documento INT(12) PRIMARY KEY,
    primer_nom VARCHAR(100) NOT NULL,
    Segundo_nombreegundo_nom VARCHAR(50),
    apellidos VARCHAR(50) NOT NULL,
    direccion VARCHAR(20),
    telefono INT(10) NOT NULL,
    ciudad VARCHAR(20) NOT NULL,
    rol BOOLEAN,
    ind_documento INT UNIQUE,
    ind_rol INT
);

-- Crear la tabla Vehiculos
CREATE TABLE IF NOT EXISTS vehiculos (
    placa VARCHAR(8) PRIMARY KEY,
    color VARCHAR(20),
    Marca VARCHAR(20),
    tipo_veh BOOLEAN,
    doc_usuario INT,
    INDEX ind_placa (Placa),
    INDEX ind_doc_usuario (doc_usuario),
    INDEX ind_marca (Marca),
    FOREIGN KEY (doc_usuario) REFERENCES usuarios(documento)
);

-- Crear la tabla Asignaciones
CREATE TABLE IF NOT EXISTS asignaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    placa_veh VARCHAR(8),
    doc_usuario INT,
    fecha_asignacion DATETIME,
    Estado BOOLEAN,
    FOREIGN KEY (Placa_veh) REFERENCES vehiculos(placa),
    FOREIGN KEY (doc_usuario) REFERENCES usuarios(documento)
);

-- Crear la vista Informe
CREATE VIEW Informe AS
SELECT V.placa, V.marca, CONCAT(U.primer_nom, ' ', IFNULL(U.segundo_nom, ''), ' ', U.apellidos) AS nombre_conductor,
    CONCAT(U_prop.primer_nom, ' ', IFNULL(U_prop.segundo_nom, ''), ' ', U_prop.apellidos) AS nombre_propietario
FROM asignaciones A
JOIN usuarios U ON A.doc_usuario = U.documento
JOIN vehiculos V ON A.Placa_veh = V.placa
JOIN Usuarios U_prop ON V.doc_usuario = U_prop.documento;
