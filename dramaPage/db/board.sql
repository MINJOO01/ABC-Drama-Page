create table board (
num int not null auto_increment,
id char(15) not null,
nick char(20) not null,
subject char(100) not null,
content text not null,
registDay char(30),
hit int not null,
level char(10),
point int,
primary key(num)
);
