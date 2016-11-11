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
 dPostal varchar(20) DEFAULT NULL,
 aPostal varchar(20) DEFAULT NULL,
 Description varchar(100) DEFAULT NULL,
 Restriction boolean DEFAULT NULL,
 Title varchar(10) DEFAULT NULL,
  Comments varchar(100) DEFAULT NULL,
 PRIMARY KEY (TID)
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

