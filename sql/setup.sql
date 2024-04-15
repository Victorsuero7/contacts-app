CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    phone_number VARCHAR(255)
);

INSERT INTO contacts (name, phone_number) VALUES ("Pepe", "1234");
INSERT INTO contacts (name, phone_number) VALUES ("Vic", "37826");
INSERT INTO contacts (name, phone_number) VALUES ("Jota", "67532");
-- Dos giones para comentarios
