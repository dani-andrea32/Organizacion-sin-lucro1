CREATE DATABASE ORGANIZACION;
USE ORGANIZACION;

-- Crea la tabla proyecto donde se almacenaran los proyectos de la organización --
CREATE TABLE PROYECTO (
    id_proyecto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    presupuesto DECIMAL(10,2),
    fecha_inicio DATE,
    fecha_fin DATE
);

-- Inserción de 3 registros de ejemplo en la tabla proyecto --
INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) VALUES
('Escuela rural', 'Construcción de una escuela en zona rural', 15000000, '2025-01-15', '2025-06-30'),
('Agua potable', 'Sistema de abastecimiento de agua', 8000000, '2025-02-01', '2025-05-15'),
('Salud comunitaria', 'Centro médico para atención primaria', 12000000, '2025-03-01', '2025-09-30');

-- Crea la tabla donante para almacenar informacion de las personas que realizan donaciones --
CREATE TABLE DONANTE (
    id_donante INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100),
    direccion TEXT,
    telefono VARCHAR(15)
);

-- Inserción de 3 registros de ejemplo en la tabla donante --
INSERT INTO DONANTE (nombre, email, direccion, telefono) VALUES
('Juan Pérez', 'juan@example.com', 'Calle Falsa 123', '987654321'),
('María González', 'maria@example.com', 'Av. Siempre Viva 456', '912345678'),
('Carlos Soto', 'carlos@example.com', 'Camino Real 789', '923456789');

-- Crea la tabla donación para registrar las donaciones realizadas, se vinculan a un proyecto y un donante --
CREATE TABLE DONACION (
    id_donacion INT AUTO_INCREMENT PRIMARY KEY,
    monto DECIMAL(10,2),
    fecha DATE,
    id_proyecto INT,
    id_donante INT,
    FOREIGN KEY (id_proyecto) REFERENCES PROYECTO(id_proyecto),
    FOREIGN KEY (id_donante) REFERENCES DONANTE(id_donante)
);

