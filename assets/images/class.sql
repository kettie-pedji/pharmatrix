drop database if exists pharmatrixdb;

CREATE DATABASE pharmatrixdb character set utf8;

use pharmatrixdb;

CREATE TABLE users (
    users_id int primary key auto_increment,
    first_name varchar(250),
    last_name varchar(250),
    phone varchar(250),
    `location` varchar (250),
    email varchar (250),
    photo text,
    `password` varchar(10),
    `role` varchar(250)
);

insert into users (first_name, last_name, phone, location, email, photo, password, role) 
values ('kettie', 'tchokonte','678549053','bonaberi', 'kettiebio@gmail.com', '', '234jf', 'administrateur');


CREATE TABLE pharmacie (
    pharmacie_id int primary key auto_increment,
    `name` varchar(250),
    phone varchar(250),
    `location` varchar(250)
);

CREATE TABLE coupon (
  coupon_id int primary key auto_increment,
  users_id int not null,
  reference varchar(250),
  create_at varchar(250),
  foreign key (users_id) references users(users_id)
) ;

CREATE TABLE all_medicament (
   all_medicament_id int primary key auto_increment,
   `name` varchar(250),
   `description` text,
   photo text
);

CREATE TABLE medicament(
  medicament_id int primary key auto_increment,
  all_medicament_id int not null,
  pharmacie_id int not null,
  price int,
  quantite int,
  foreign key (all_medicament_id) references all_medicament (all_medicament_id),
  foreign key (pharmacie_id) references pharmacie (pharmacie_id)
);

create table users_pharmacie (
    users_id int not null ,
    pharmacie_id int not null ,
    primary key ( users_id, pharmacie_id) ,
    foreign key (users_id) references users(users_id),
    foreign key (pharmacie_id) references pharmacie(pharmacie_id)
);

create table coupon_medicament (
   medicament_id int not null ,
    coupon_id int not null,
    primary key ( medicament_id, coupon_id) ,
    foreign key (medicament_id) references medicament(medicament_id),
    foreign key (coupon_id) references coupon(coupon_id) 
);