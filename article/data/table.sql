USE app_brobird;
DROP TABLE IF EXISTS article;
CREATE TABLE article (
  id INT(10) AUTO_INCREMENT NOT NULL KEY,
  title CHAR(100) NOT NULL,
  author CHAR(50) NOT NULL,
  description VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  date int(11) NOT NULL DEFAULT 0
);

DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
  id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT KEY,
  username VARCHAR(20) NOT NULL,
  password CHAR(32) NOT NULL,
  email VARCHAR(50) NOT NULL
);