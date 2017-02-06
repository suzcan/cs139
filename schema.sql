DROP TABLE users;
CREATE TABLE users(userID integer, password varchar(20), username varchar(20), email text, notifPref integer);
DROP TABLE listCats;
CREATE TABLE listCats(catID integer, name varchar(25), userID varchar(20));
DROP TABLE lists;
CREATE TABLE lists(listID integer, name varchar(25), catID integer, dNotd integer, sharedW text);
DROP TABLE listItems;
CREATE TABLE listItems(numeration integer, content text, dNotd integer, listID integer);
