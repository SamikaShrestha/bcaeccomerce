// ecomerce table
CREATE DATABASE IF NOT EXISTS bcaecomerce;

use bcaecomerce;

CREATE TABLE IF NOT EXISTS users(
uid int AUTO_INCREMENT PRIMARY KEY,
name varchar(100),
email varchar(100)UNIQUE,
password varchar(100),
gender ENUM("male","female","others"),
role SET("admin","users")DEFAULT "users",
image varchar(100),
created_at datetime,
updated_at datetime
);

==========Making tabe===============
CREATE TABLE IF NOT EXISTS category(
cid int AUTO_INCREMENT PRIMARY KEY,
name varchar(100),
created_at datetime,
updated_at datetime
);

CREATE TABLE IF NOT EXISTS products(
    pid int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    category_id int,
    title varchar(255),
    slug varchar(255) UNIQUE,
    quantity int,
    price float,
    image varchar(100),
    description text,
    created_at datetime,
    updated_at datetime,
    
// for restricting delete
    FOREIGN KEY (user_id) REFERENCES users(uid) ON DELETE RESTRICT,
    FOREIGN KEY (category_id) REFERENCES category(cid) ON DELETE RESTRICT
);  