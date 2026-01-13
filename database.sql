-- Création de la base de données
CREATE DATABASE IF NOT EXISTS tp_auth
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

-- Utilisation de la base de données
USE tp_auth;

-- Création de la table users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);