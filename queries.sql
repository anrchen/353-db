CREATE TABLE member (
 MID int(11) NOT NULL,
 firstName varchar(20) DEFAULT NULL,
 lastName varchar(20) DEFAULT NULL,
 Birthday int(11) NOT NULL,
 Role varchar(20) NOT NULL,
 PRIMARY KEY (MID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE trip (
 TID int(11) NOT NULL,
 dDate int(8) NOT NULL,
 aDate int(8) NOT NULL,
 cityName varchar (10) NOT NULL,
 dPostal varchar(20) DEFAULT NULL,
 aPostal varchar(20) DEFAULT NULL,
 Description varchar(100) DEFAULT NULL,
 Restriction boolean DEFAULT NULL,
 Title varchar(10) DEFAULT NULL,
  Comments varchar(100) DEFAULT NULL,
 PRIMARY KEY (TID),
 FOREIGN KEY (cityName) REFERENCES FROM city (cityName)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE account (
 MID int(11) NOT NULL,
 Username varchar(20) NOT NULL,
 Password varchar(20) NOT NULL,
 Balance float(20) NOT NULL,
 adminPrivilege boolean NOT NULL,
 PRIMARY KEY (MID), 
FOREIGN KEY(MID) REFERENCES member(MID)     
 ON DELETE CASCADE        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;


CREATE TABLE city (
 cityName varchar(10) NOT NULL,
 citySurrounded varchar(20) DEFAULT NULL, 
 PRIMARY KEY (cityName)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO city (cityName, citySurrounded) VALUES
('Brossard', 'Montreal'),
('Dorval', 'Montreal'),
('Laval', 'Montreal'),
('Montreal', 'Toronto'),
('Quebec', 'Montreal'),
('Sherbrooke', 'Montreal'),
('Toronto', 'Montreal'),
('WestIsland', 'Montreal');

INSERT INTO trip ('TID', 'dDate', 'aDate', 'Montreal', 'dPostal', 'aPostal', 'Description', 'Restriction', 'Title', 'Comments') VALUES ('1', '20100101', '20101010', 'H4V2N2', 'H4V2N2', 'myDescription', NULL, 'myTitle', 'Here is the comment');
INSERT INTO trip ('TID', 'dDate', 'aDate', 'Toronto''dPostal', 'aPostal', 'Description', 'Restriction', 'Title', 'Comments') VALUES ('2', '19901111', '19901212', 'H4V2N2', 'H4V2N2', 'Desc#2', NULL, 'Trip#2', 'comments#2');