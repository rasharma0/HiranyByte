use myxpressions;
CREATE TABLE myvisitors(
myvisit_id 		int(6) 		NOT NULL 	AUTO_INCREMENT,
myvisit_name 		varchar(254),
myvisit_email 		varchar(254),
myvisit_timestamp 	datetime,
PRIMARY KEY 		(myvisit_id)
);

