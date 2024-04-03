-- as crases no mysql , são chamadas backticks que servem para usar palavras reservadas do MySQL para nomear colunas e pode ser usada nas outras palavras também.

create database thiagoTeste;

use thiagoTeste;

create table formulario (

    id int(5) primary key not null auto_increment,
    name varchar(30),
    number bigint(11),
    email varchar(100),
	data_cadastro date
);
