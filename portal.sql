create database portal;
use portal;

create table usuario(
    rut varchar(50),
    nombre varchar(50),
    clave varchar(50),
    constraint USU_RU_PK primary key(rut)
);

create table medico(
    rut varchar(50),
    nombre varchar(50),
    clave varchar(50),
    especialidad varchar(50),
    experiencia varchar(12),
    foto LONGTEXT,
    constraint USU_RUT_PK primary key(rut)
    
);

create table publicacion(
    id int auto_increment,
    titulo varchar(50),
    tipo varchar(20),
    descripcion varchar(100),
    rutFK varchar(50),
    constraint LIN_ID_PK primary key(id),
    constraint LIN_RU_FK foreign key(rutFK) references usuario(rut) 
        on delete cascade
);

create table respuesta(
    id int auto_increment,
    respuesta varchar(200),
    idFK int,
    rutFK varchar(50),
    constraint LIN_ID_PK primary key(id),
    constraint LIN_RUT_FK foreign key(rutFK) references medico(rut) 
        on delete cascade,
    constraint LIN_ID_FK foreign key(idFK) references publicacion(id) 
        on delete cascade
    
);

