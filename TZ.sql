create table users(
                      id serial primary key ,
                      name varchar(30) not null
);

create table user_carts(
                           id serial primary key,
                           user_id int references users(id) on delete cascade
);

create table orders(
                       id serial primary key,
                       user_id int references users(id) on delete cascade,
                       created_at timestamp default now()
);

create table order_items(
                            id serial primary key,
                            order_id int references orders(id) on delete cascade,
                            name varchar(30) not null
);

insert into users (name) values ('Иван'),
                                ('Петр'),
                                ('Сергей'),
                                ('Михаил'),
                                ('Степан');

insert into orders (user_id) values (1),
                                    (2),
                                    (3),
                                    (4),
                                    (5);

insert into order_items (order_id,name) values (1,'Стол'),
                                               (1,'Стул'),
                                               (2,'Картон'),
                                               (2,'Батон'),
                                               (2,'Принтер'),
                                               (3,'Хлеб'),
                                               (3,'Миксер'),
                                               (4,'Картошка'),
                                               (5,'Лук');

select u.id as user_id ,
       u.name as user_name,
       o.id as order_id ,
       oi.id as order_item_id,
       oi.name as order_item_name,
       o.created_at as order_created_at
from users u
         inner join orders o on o.user_id = u.id
         inner join order_items oi on oi.order_id = o.id
    limit 1;

delete from users
where id = 1;
