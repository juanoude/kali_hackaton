CREATE TABLE placa {
  id VARCHAR(25) NOT NULL primary key,
  latitude VARCHAR(25),
  longitude VARCHAR(25)
}

CREATE TABLE fila_coleta {
  id INT auto_increment primary key,
  placa_id INT NOT NULL,
  ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(placa_id) REFERENCES placa(id)
}

CREATE TABLE
