CREATE DATABASE IF NOT EXISTS db_siswa;
USE db_siswa;

CREATE TABLE IF NOT EXISTS tb_user (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL
);

INSERT INTO tb_user (username,password) VALUES ('admin','$2y$12$B72G82.0wbTS37rJSIOZ2OI80mxaHhrZvlaniuxCmO5LpRHJJ5PQ2')
ON DUPLICATE KEY UPDATE password=VALUES(password);

-- Username: admin
-- Password: admin123
