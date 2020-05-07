drop table if exists Reviews;
CREATE TABLE Reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
score INT(5) UNSIGNED NOT NULL,
item VARCHAR(50) NOT NULL,
review VARCHAR(500) NOT NULL,
post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);
INSERT INTO Reviews (email, score, item, review) VALUES (
'Franchesca@example.com',5,'MBP15','Sooooooo greate');