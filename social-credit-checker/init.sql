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

