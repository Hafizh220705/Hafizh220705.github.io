create database mhs if not exists;

create table identitas(
    npm varchar(12) primary key,
    nama varchar(40),
    alamat varchar(100),
    tanggal_lahir date,
    jenis_kelamin char(1),
    email varchar(50)
);