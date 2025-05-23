DROP USER root@localhost;
CREATE USER root@localhost IDENTIFIED BY 'il0v3A13Gs';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

CREATE DATABASE IF NOT EXISTS ctf;
USE ctf;

CREATE TABLE IF NOT EXISTS social_credit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    score INT NOT NULL
) CHARACTER SET gbk;

INSERT INTO social_credit (name, score) VALUES
('张伟', 8200),
('王芳', 9),
('王伟', 60),
('李娜', 850),
('张敏', 0);

CREATE TABLE flags (flag VARCHAR(100));
INSERT INTO flags (flag) VALUES ('flag{gbk_sqli_success}');