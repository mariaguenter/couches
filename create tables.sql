create table user (
	username varchar(30),
	fname varchar(30),
	lname varchar(30),
	email varchar(50),
	pass varchar(15),
	quest varchar(30), /*this will just store the legit question they chose*/
	ans varchar(30), /* answer to their question */
	profilePic varchar(30), 
	adminPriv boolean, /* true or false if admin user */
	primary key (username),
);

create table post (
	postid int,
	postDate date,
	author varchar(30),
	pic varchar(30),
	category int, /* this will just store 1, 2 or 3 for what category */
	rating int, /* defualt will be 0 */
	title varchar(30),
	primary key (postid),
	foreign key (author) regerences user(username)
);

create table comment (
	comid int,
	content varchar(500),
	author varchar(30),
	postid int,
	primary key (comid),
	foreign key (author) references user(username),
	foreign key (postid) references post(postid)
);