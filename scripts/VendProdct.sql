create database if not exists tienda;
use tienda;

dropt table if exists cliente,productos;

create table Vendedores (
dni varchar(10) primary key,
nombre varchar(18),
apellido varchar(18),
email varchar(20),
edad int,
telefono int
);

create table productos (
id int primary key auto_increment,
nombre varchar(20),
precio int,
stock int
);
