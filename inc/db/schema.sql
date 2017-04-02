

ALTER TABLE user MODIFY quest VARCHAR(255);
ALTER TABLE user MODIFY ans VARCHAR(255);
ALTER TABLE user MODIFY profilePic VARCHAR(255);
ALTER TABLE user MODIFY pass VARCHAR(127);

CREATE TABLE sqlCommands (
  id INT NOT NULL AUTO_INCREMENT,
  command VARCHAR(255),
  PRIMARY KEY (id)
);

create table user (
	username varchar(30) not null,
	fname varchar(30),
	lname varchar(30),
	email varchar(50),
	pass varchar(15),
	quest varchar(30), /*this will just store the legit question they chose*/
	ans varchar(30), /* answer to their question */
	profilePic varchar(30), 
	adminPriv boolean default FALSE, /* true or false if admin user */
	primary key (username)
);

create table post (
	postid int not null AUTO_INCREMENT,
	postDate TIMESTAMP default CURRENT_TIMESTAMP, 
	author varchar(30),
	pic varchar(30),
	category int, /* this will just store 1, 2 or 3 for what category */
	rating int default 0, 
	title varchar(30),
	content varchar(800),
	primary key (postid),
	foreign key (author) references user(username)
);

create table comments (
	comid int not null AUTO_INCREMENT,
	content varchar(500),
	author varchar(30),
	postid int,
	primary key (comid),
	foreign key (author) references user(username),
	foreign key (postid) references post(postid)
);