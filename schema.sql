DROP TABLE users;
CREATE TABLE users(
  userID text,
  salt integer,
  password varchar(255),
  username varchar(255),
  email text,
  notifPref integer
);

DROP TABLE listCats;
CREATE TABLE listCats(
  catID integer, 
  name varchar(25), 
  userID text
);

DROP TABLE lists;
CREATE TABLE lists(
  listID integer, 
  name varchar(25), 
  catID integer,
  userID text,
  dNotd integer, 
  sharedW text
);

DROP TABLE listItems;
CREATE TABLE listItems(
  numeration integer, 
  content text, 
  dNotd integer, 
  listID integer,
  catID integer,
  userID text
);
