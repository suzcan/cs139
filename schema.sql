DROP TABLE users;
CREATE TABLE users(userID integer, password varchar(20), username varchar(20), email text, notifPref integer);
DROP TABLE listCats;
CREATE TABLE listCats(name varchar(25), lists text, dNotd blob, sharedW text);
DROP TABLE lists;
CREATE TABLE lists(name varchar(25), listItems text, dNotd blob, sharedW text);
DROP TABLE listItems;
CREATE TABLE listItems(numeration integer, content text, dNotd blob);
