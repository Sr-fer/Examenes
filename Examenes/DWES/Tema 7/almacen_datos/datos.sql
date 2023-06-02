INSERT INTO Viajeros (nombre, fecha_nacimiento, nacionalidad) VALUES
('Juan Pérez', '1990-05-10', 'España'),
('María López', '1985-12-15', 'España'),
('Carlos García', '1995-08-22', 'España'),
('Laura Martínez', '1992-03-28', 'España');

INSERT INTO Ciudades (nombre, habitantes, descripcion) VALUES
('Madrid', 3223334, 'Madrid es la capital de España y cuenta con numerosos monumentos y museos.'),
('Barcelona', 1620343, 'Barcelona es una ciudad cosmopolita con hermosas playas y una arquitectura impresionante.'),
('Valencia', 790201, 'Valencia es conocida por su Ciudad de las Artes y las Ciencias y su deliciosa paella.'),
('Sevilla', 689434, 'Sevilla es famosa por su catedral gótica y su animada feria de abril.');

INSERT INTO Viajes (id_viajero, origen_id, destino_id, fecha_salida, fecha_llegada) VALUES
(1, 1, 2, '2022-01-10', '2022-01-11'),
(2, 2, 3, '2022-02-15', '2022-02-17'),
(3, 1, 4, '2022-03-20', '2022-03-21'),
(4, 3, 1, '2022-04-25', '2022-04-27');