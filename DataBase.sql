-- CREACION TABLA USUARIOS
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(150) NOT NULL UNIQUE,
    telefono VARCHAR(20),
    password VARCHAR(255) NOT NULL
);

--AGREGAR TIPO DE USUARIO A TABLA USUARIOS
ALTER TABLE USUARIOS ADD tipo_usuario VARCHAR(20) DEFAULT 'cliente';
