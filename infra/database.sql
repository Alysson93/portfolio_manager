create database meuportfolio;
\c meuportfolio;

CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

create table users (
    id UUID DEFAULT gen_random_uuid() primary key,
    username varchar(12) unique not null,
    password varchar(250) not null,
    first_name varchar(20) not null,
    last_name varchar(80) not null,
    email varchar(50) unique not null,
    phone varchar(20) not null,
    role varchar(10) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp
);
