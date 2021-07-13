use myxpressions;
CREATE TABLE 		mysitecontacts(
mysc_id 		int(6) 		NOT NULL AUTO_INCREMENT,
mysc_name 		varchar(254)	NOT NULL,
mysc_emailto 		varchar(254) 	NOT NULL,
mysc_emailcc 		varchar(254),
mysc_subject		varchar(254),
mysc_message 		varchar(5000),
mysc_subscriber 	tinyint(1)	NOT NULL default 0,
mysc_timestamp 		datetime 	NOT NULL,
mysc_hash		varchar(10),
PRIMARY KEY 		(mysc_id)
);

