create table comments (
	id int unsigned not null auto_increment,
	model varchar(255) not null,
	foreign_key int unsigned not null,
	comment text not null,
	created datetime,
	creator_id int unsigned,
	modified datetime,
	modifier_id int unsigned,
	primary key(id),
	foreign key(creator_id) references users(id),
	foreign key(modifier_id) references users(id)
)Engine=InnoDB;

