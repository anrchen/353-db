
CREATE TABLE account
(
  Username varchar(20) NOT NULL,
  Email varchar(60) NOT NULL,
  Password varchar(500) NOT NULL,
  Balance float(20) NOT NULL,
  adminPrivilege boolean NOT NULL,
  PRIMARY KEY (Username)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE member
(
  Username varchar(20) NOT NULL,
  firstName varchar(20) DEFAULT NULL,
  lastName varchar(20) DEFAULT NULL,
  Birthday int(11) NOT NULL,
  Role varchar(20) NOT NULL,
  Rating float(5) DEFAULT 0,
  Status tinyint(1) DEFAULT 1,
  isAdmin BOOLEAN,
  FOREIGN KEY (Username) REFERENCES account(Username)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
# Status:  0 = suspended, 1 = Active (Default), 2 = Inactive

CREATE TABLE memberDetails
(
  Username varchar(20) NOT NULL,
  address1 varchar(20) DEFAULT NULL,
  address2 varchar(20) DEFAULT NULL,
  city varchar(20) DEFAULT NULL,
  postalCode varchar(20) DEFAULT NULL,
  province varchar(20) DEFAULT NULL,
  license varchar(20) DEFAULT NULL,
  PRIMARY KEY (Username),
  FOREIGN KEY (Username) REFERENCES account(Username)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE city
(
  cityName varchar(10) NOT NULL,
  citySurrounded varchar(20) DEFAULT NULL,
  PRIMARY KEY (cityName)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE trip
(
    TID INT(11) NOT NULL AUTO_INCREMENT,
    Username varchar(20) NOT NULL,
    dDate VARCHAR(50) NOT NULL,
    dCity VARCHAR(10) NOT NULL,
    aCity VARCHAR(15) NOT NULL,
    dPostal VARCHAR(20) DEFAULT NULL,
    aPostal VARCHAR(20) DEFAULT NULL,
    Description VARCHAR(100) DEFAULT NULL,
    Restriction BOOLEAN DEFAULT NULL,
    Title VARCHAR(20) DEFAULT NULL,
    Comments VARCHAR(100) DEFAULT NULL,
    Category VARCHAR(15) NOT NULL,
    PRIMARY KEY(TID),
    FOREIGN KEY (Username) REFERENCES account (Username)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

  CREATE TABLE Reviews
  (
  id int(11) NOT NULL AUTO_INCREMENT,
  date date NOT NULL,
  rating tinyint(1) NOT NULL,
  review varchar(20) DEFAULT NULL,
  author varchar(20) NOT NULL,
  target varchar(20) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (author) REFERENCES account(Username),
  FOREIGN KEY (target) REFERENCES account(Username)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

/*added for rating*/
CREATE TABLE tripreview
(
  Reviewer varchar(20) NOT NULL,
  reviewTrip INT(11)NOT NULL,
  stars float (10) NOT NULL ,
  complaint BOOLEAN default FALSE,
  messages varchar(200) DEFAULT NULL,
  PRIMARY KEY (Reviewer,reviewTrip),
  FOREIGN KEY (Reviewer) REFERENCES account(Username)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (reviewTrip)REFERENCES trip(TID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET=latin1;

/*added for rating*/
CREATE TABLE driverreview
(
  Reviewer varchar(20) NOT NULL,
  driver varchar(20) NOT NULL,
  stars float (10) NOT NULL ,
  complaint BOOLEAN default FALSE,
  messages varchar(200) DEFAULT NULL,
  PRIMARY KEY (Reviewer,driver),
  FOREIGN KEY (Reviewer) REFERENCES account(Username)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (driver)REFERENCES account(Username)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE Transactions
(
  id int(11) NOT NULL AUTO_INCREMENT,
  tripId int(11) NOT NULL,
  Username varchar(20) NOT NULL,
  amount float(20) DEFAULT NULL,
  transactionDate date NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (tripId) REFERENCES trip(TID),
  FOREIGN KEY (Username) REFERENCES account(Username)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

INSERT INTO city (cityName, citySurrounded) VALUES
  ('Brossard', 'Montreal'),
  ('Dorval', 'Montreal'),
  ('Laval', 'Montreal'),
  ('Montreal', 'Toronto'),
  ('Quebec', 'Montreal'),
  ('Sherbrooke', 'Montreal'),
  ('Toronto', 'Montreal'),
  ('WestIsland', 'Montreal');

INSERT INTO account VALUES
  (
    'Dragonman',
    'email@email.com',
    'abc',
    0,
    1);

INSERT INTO member VALUES
  (  'Dragonman',
     'DRAGON',
     'DOCTOR',
     19880501,
     'rider',
  	 0,
   	1,
     1);

INSERT INTO trip VALUES
  (1,
    'Dragonman',
    'Monday',
    'Dorval',
    'Montreal',
    'H4V2N2',
    'H4V2N2',
    'Description1',
    0,
    'title#1',
    'comments#1',
   'specialized'),

  (2,
    'Dragonman',
    '20161116',
    'Dorval',
    'New York',
    'H4B2N2',
    'H4B2N2',
    'description#2',
    1,
    'title#2',
    'comments#2',
   'normal');
