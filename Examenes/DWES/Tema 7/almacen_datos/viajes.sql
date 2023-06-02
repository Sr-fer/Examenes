CREATE TABLE Viajeros (
  id SERIAL PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  nacionalidad VARCHAR(50) NOT NULL
);

CREATE TABLE Ciudades (
  id SERIAL PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  habitantes INT NOT NULL,
  descripcion VARCHAR(150) NOT NULL
);

CREATE TABLE Viajes (
  id SERIAL PRIMARY KEY,
  id_viajero INT NOT NULL REFERENCES Viajeros(id),
  origen_id INT NOT NULL REFERENCES Ciudades(id),
  destino_id INT NOT NULL REFERENCES Ciudades(id),
  fecha_salida DATE NOT NULL,
  fecha_llegada DATE NOT NULL
);