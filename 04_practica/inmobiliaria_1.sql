/* BASE DE DATOS INMOBILIARIA */


create database inmobiliaria;

CREATE TABLE usuario (
usuario_id int(5) primary key AUTO_INCREMENT,
nombre varchar(35) NOT NULL,
correo varchar(100) NOT NULL,
clave varchar(80) NOT NULL);

CREATE TABLE pisos (
Codigo_piso int primary key,
calle VARCHAR(40) NOT NULL,
numero INT NOT NULL,
piso INT NOT NULL,
puerta VARCHAR(5) NOT NULL,
cp INT NOT NULL,
metros INT NOT NULL,
zona VARCHAR (15),
precio float NOT NULL,
imagen varchar(100) NOT NULL,
usuario_id int(5)references usuario
);

mysql> show tables;
+------------------------+
| Tables_in_inmobiliaria |
+------------------------+
| pisos                  |
| usuario                |
+------------------------+
2 rows in set (0.00 sec)

mysql> desc pisos;desc usuario;
+-------------+--------------+------+-----+---------+-------+
| Field       | Type         | Null | Key | Default | Extra |
+-------------+--------------+------+-----+---------+-------+
| Codigo_piso | int(11)      | NO   | PRI | NULL    |       |
| calle       | varchar(40)  | NO   |     | NULL    |       |
| numero      | int(11)      | NO   |     | NULL    |       |
| piso        | int(11)      | NO   |     | NULL    |       |
| puerta      | varchar(5)   | NO   |     | NULL    |       |
| cp          | int(11)      | NO   |     | NULL    |       |
| metros      | int(11)      | NO   |     | NULL    |       |
| zona        | varchar(15)  | YES  |     | NULL    |       |
| precio      | float        | NO   |     | NULL    |       |
| imagen      | varchar(100) | NO   |     | NULL    |       |
| usuario_id  | int(5)       | YES  |     | NULL    |       |
+-------------+--------------+------+-----+---------+-------+
11 rows in set (0.01 sec)

+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| usuario_id | int(5)       | NO   | PRI | NULL    | auto_increment |
| nombres    | varchar(35)  | NO   |     | NULL    |                |
| correo     | varchar(100) | NO   |     | NULL    |                |
| clave      | varchar(80)  | NO   |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+
4 rows in set (0.00 sec)
