drop database if exists heracles_bd;
create database heracles_bd;
use heracles_bd;
create table Deporte (
    ID_Deporte int NOT NULL auto_increment,
    Nombre varchar(50) NOT NULL,
    primary key (ID_Deporte)
);
create table Grupos_Musculares (
    ID_Grupo int NOT NULL auto_increment,
    Nombre varchar(50) NOT NULL,
    primary key (ID_Grupo)
);
create table Ejercicios (
    ID_Ejercicio int NOT NULL auto_increment,
    Nombre varchar(50) NOT NULL,
    Descripcion varchar(255) NOT NULL,
    Gif varchar(255) NOT NULL,
    primary key (ID_Ejercicio)
);
create table Cliente (
    Numero_Socio int NOT NULL auto_increment,
    Nombre varchar(30) NOT NULL,
    Apellido varchar(30) NOT NULL,
    primary key (Numero_Socio)
);
create table Estado (
    Id_Estado int NOT NULL auto_increment,
    Estado varchar(30) NOT NULL,
    primary key (Id_Estado)
);
create table Fisioterapia (
    Lesion varchar(100) NOT NULL,
    Numero_Socio int NOT NULL,
    primary key (Numero_Socio),
    foreign key (Numero_Socio) references Cliente(Numero_Socio)
);
create table Deportista (
    Deporte varchar(50) NOT NULL,
    Posicion varchar(50) NOT NULL,
    Numero_Socio int NOT NULL,
    primary key (Numero_Socio),
    foreign key (Numero_Socio) references Cliente(Numero_Socio)
);
create table Cronograma (
    Id_Cronograma int NOT NULL auto_increment,
    Dia enum(
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado'
    ),
    Inicio time,
    Fin time,
    primary key (Id_Cronograma)
);
create table Sede (
    Nombre varchar(50) NOT NULL,
    Direccion varchar(100) NOT NULL,
    Lugares_Maximos int NOT NULL,
    Logo varchar(100) NOT NULL,
    Textos_Editables varchar(255) NOT NULL,
    primary key (Nombre)
);
create table Entrenador (
    ID_Entrenador int NOT NULL auto_increment,
    primary key (ID_Entrenador)
);
create table Calificacion (
    ID_Calificacion int NOT NULL auto_increment,
    Item varchar(50) NOT NULL,
    primary key (ID_Calificacion)
);
create table Calificaciones (
    ID_Deporte int NOT NULL,
    ID_Grupo int NOT NULL,
    primary key (ID_Deporte, ID_Grupo),
    foreign key (ID_Deporte) references Deporte(ID_Deporte),
    foreign key (ID_Grupo) references Grupos_Musculares(ID_Grupo)
);
create table Ejercicio_Clase (
    ID_Deporte int NOT NULL,
    ID_Grupo int NOT NULL,
    ID_Ejercicio int NOT NULL,
    primary key (ID_Deporte, ID_Grupo, ID_Ejercicio),
    foreign key (ID_Deporte, ID_Grupo) references Calificaciones(ID_Deporte, ID_Grupo),
    foreign key (ID_Ejercicio) references Ejercicios(ID_Ejercicio)
);
create table Rutina (
    ID_Ejercicio int NOT NULL,
    Numero_Socio int NOT NULL,
    primary key (ID_Ejercicio, Numero_Socio),
    foreign key (ID_Ejercicio) references Ejercicios(ID_Ejercicio),
    foreign key (Numero_Socio) references Cliente(Numero_Socio)
);
create table Asignado (
    Numero_Socio int NOT NULL,
    ID_Entrenador int NOT NULL,
    primary key (Numero_Socio),
    foreign key (Numero_Socio) references Cliente(Numero_Socio),
    foreign key (ID_Entrenador) references Entrenador(ID_Entrenador)
);
create table Califica (
    Numero_Socio int NOT NULL,
    ID_Calificacion int NOT NULL,
    Puntaje_obtenido int NOT NULL,
    Puntaje_esperado int NOT NULL,
    primary key (Numero_Socio, ID_Calificacion),
    foreign key (Numero_Socio) references Cliente(Numero_Socio),
    foreign key (ID_Calificacion) references Calificacion(ID_Calificacion)
);
create table Asiste (
    Id_Cronograma int NOT NULL,
    Numero_Socio int NOT NULL,
    primary key (Id_Cronograma, Numero_Socio),
    foreign key (Id_Cronograma) references Cronograma(Id_Cronograma),
    foreign key (Numero_Socio) references Cliente(Numero_Socio)
);
create table Cambia_Estado(
    Numero_Socio int NOT NULL,
    Id_Estado int NOT NULL,
    Fecha_Inicio date NOT NULL,
    Fecha_Fin date,
    primary key (Numero_Socio, Id_Estado),
    foreign key (Numero_Socio) references Cliente(Numero_Socio),
    foreign key (Id_Estado) references Estado(Id_Estado)
);
CREATE TABLE `usuario` (
    `Username` varchar(20) NOT NULL,
    `Nombre` varchar(20) NOT NULL,
    `Apellido` varchar(20) NOT NULL,
    `Email` varchar(60) NOT NULL,
    `Contrasena` varchar(20) NOT NULL,
    `Rol` enum(
        'Cliente',
        'Admin',
        'Coach',
        'Avanzado',
        'Seleccionador',
        'Avanzado'
    ) NOT NULL,
    primary key (Username)
);
CREATE TABLE EsCliente(
    Username varchar(20) NOT NULL,
    Numero_Socio INT NOT NULL,
    primary key(Username,Numero_Socio),
    foreign key (Numero_Socio) references Cliente(Numero_Socio),
    foreign key (Username) references usuario(Username)
);
CREATE TABLE EsEntrenador(
    Username varchar(20) NOT NULL,
    ID_Entrenador INT NOT NULL,
    primary key(Username,ID_Entrenador),
    foreign key (ID_Entrenador) references Entrenador(ID_Entrenador),
    foreign key (Username) references usuario(Username)
);