CREATE DATABASE IF NOT EXISTS video_db;
USE video_db;
CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    time VARCHAR(50) NOT NULL,
    format VARCHAR(50) NOT NULL,
    file_link VARCHAR(255) NOT NULL
);
GRANT ALL PRIVILEGES ON video_db.* TO 'your_username'@'localhost' IDENTIFIED BY 'your_password';
ALTER USER 'your_username'@'localhost' IDENTIFIED WITH mysql_native_password BY 'your_password';