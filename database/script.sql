CREATE DATABASE crud_db;

USE crud_db;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);