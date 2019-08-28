CREATE DATABASE bd_pizarroWeb;

USE bd_pizarroWeb;

CREATE TABLE Usuario (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR (50),
contrasenia VARCHAR (50) 
);

CREATE TABLE Producto(
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR (100),
rutaDeImagen VARCHAR (300),
precio INT
);

DELIMITER //
CREATE PROCEDURE CRUDUsuario (idProc INT, nombreProc VARCHAR (50), contraseniaProc VARCHAR (50), tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO Usuario VALUES (NULL, nombreProc, contraseniaProc);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM Usuario;
ELSEIF tipoOperacion=3 THEN
UPDATE Usuario SET nombre=nombreProc, contrasenia=contraseniaProc WHERE id=idProc;
ELSEIF tipoOperacion=4 THEN
DELETE FROM Usuario WHERE id=idProc;
END IF;
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE CRUDProducto (idProc INT, nombreProc VARCHAR (100), rutaImagenProc VARCHAR (300), precioProc INT, tipoOperacion INT)
BEGIN
IF tipoOperacion=1 THEN
INSERT INTO Producto VALUES (NULL, nombreProc, rutaImagenProc, precioProc);
ELSEIF tipoOperacion=2 THEN
SELECT * FROM Producto;
ELSEIF tipoOperacion=3 THEN
UPDATE Producto SET nombre=nombreProc, rutaDeImagen=rutaImagenProc, precio=precioProc WHERE id=idProc;
ELSEIF tipoOperacion=4 THEN
DELETE FROM Producto WHERE id=idProc;
END IF;
END//
DELIMITER ;


CALL CRUDUsuario (1,'Alguien','hue',2);
CALL CRUDProducto(1,'Algo','Alguna ruta', 10000,2);

-- DROP DATABASE bd_pizarroWeb;

