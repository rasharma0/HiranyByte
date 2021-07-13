use myxpressions;
CREATE TABLE 		mysubscribers(
mysub_id		int(6) 		NOT NULL AUTO_INCREMENT,
mysub_fname 		varchar(100)	NOT NULL,
mysub_mname 		varchar(100),
mysub_lname 		varchar(100),
mysub_title		char(10),
mysub_email 		varchar(100) 	NOT NULL,
mysub_password 		varchar(100) 	NOT NULL,
mysub_timestamp 	datetime 	NOT NULL,
mysub_mobileno1		int(10),
mysub_mobileno2		int(10),
mysub_add1  		varchar(254),
mysub_add2  		varchar(254),
mysub_city  		varchar(100),
mysub_state 		varchar(100),
mysub_country 		varchar(100),
mysub_zipcode 		varchar(6),
mysub_pict    		tinyblob,
mysub_hash		varchar(10), 
mysub_dob		date,
mysub_company		varchar(100),
mysub_designation	varchar(100),
mysub_email_confirm  	tinyint(1) 	NOT NULL default 0,
PRIMARY KEY 		(mysub_id),
UNIQUE			(mysub_email)
);

