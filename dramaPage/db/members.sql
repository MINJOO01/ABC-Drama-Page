create table members (
    num int not null auto_increment,
    id char(15) not null,
    pw char(15) not null,
    nick char(10) not null,
    name char(10),
    email char(50),
    registDay char(30),
    level char(10),
    point int,
    primary key(num)
);