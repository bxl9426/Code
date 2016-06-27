create table users (
   username   varchar(10) primary key,
   password   varchar(32),
   fullname   varchar(45),
   email      varchar(45)
);

create table posts (
   id         varchar(13) primary key,
   postedby   varchar(10) references users (username),
   datetime   datetime,
   message    text
);