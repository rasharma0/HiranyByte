create database myxpressions default Character set utf8 default collate utf8_general_ci; 
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'ras9594Z';
GRANT ALL PRIVILEGES on myxpressions.* 	to 'admin'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES on mysql.* 	to 'admin'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES on mariadb.* 	to 'admin'@'localhost' WITH GRANT OPTION;
flush privileges;