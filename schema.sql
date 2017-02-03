create table users(userID integer, password varchar(20), username varchar(20), email text, notifPref integer);
create table listCat(name varchar(25), lists text, dNotd blob, sharedW text);
create table lists(name varchar(25), listItems text, dNotd blob, sharedW text);
create table listItems(numeration integer, content text, dNotd blob);