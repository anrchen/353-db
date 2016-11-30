CREATE TABLE member
(
  MID int(11) NOT NULL AUTO_INCREMENT,
  firstName varchar(20) DEFAULT NULL,
  lastName varchar(20) DEFAULT NULL,
  Birthday int(11) NOT NULL,
  Status tinyint(1) DEFAULT 1,	/*Status:  0 = suspended, 1 = Active (Default), 2 = Inactive*/
  isAdmin BOOLEAN,
  PRIMARY KEY (MID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE memberDetails
(
  id int(11) NOT NULL AUTO_INCREMENT,
  address1 varchar(20) DEFAULT NULL,
  address2 varchar(20) DEFAULT NULL,
  city varchar(20) DEFAULT NULL,
  postalCode varchar(20) DEFAULT NULL,
  province varchar(20) DEFAULT NULL,
  license varchar(20) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES member(MID)
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
  authorID INT(11) NOT NULL,
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
  Role INT(3),
  /*0 = rider, 1 = driver, 2 = rider has found his ride, 3 = driver has found his rider*/
  matchedID INT(11) DEFAULT NULL,
  PRIMARY KEY(TID),
  FOREIGN KEY (authorID) REFERENCES member (MID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (matchedID) REFERENCES trip (TID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE account
(
  MID int(11) NOT NULL AUTO_INCREMENT,
  Username varchar(20) NOT NULL,
  Email varchar(60) NOT NULL,
  Password varchar(500) NOT NULL,
  Balance float(20) NOT NULL,
  FOREIGN KEY(MID) REFERENCES member(MID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/*added for rating*/
CREATE TABLE tripreview
(
  Reviewer INT(11) NOT NULL,
  reviewTrip INT(11)NOT NULL,
  stars float (10) NOT NULL ,
  complaint BOOLEAN default FALSE,
  messages varchar(200) DEFAULT NULL,
  PRIMARY KEY (Reviewer,reviewTrip),
  FOREIGN KEY (Reviewer) REFERENCES member(MID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (reviewTrip)REFERENCES trip(TID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET=latin1;

/*added for rating*/
CREATE TABLE driverreview
(
  Reviewer INT(11) NOT NULL,
  driverID INT(11)NOT NULL,
  stars float (10) NOT NULL ,
  complaint BOOLEAN default FALSE,
  messages varchar(200) DEFAULT NULL,
  PRIMARY KEY (Reviewer,driverID),
  FOREIGN KEY (Reviewer) REFERENCES member(MID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (driverID)REFERENCES member(MID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE Transactions
(
  id int(11) NOT NULL AUTO_INCREMENT,
  tripId int(11) NOT NULL,
  memberId int(11) NOT NULL,
  amount float(20) DEFAULT NULL,
  transactionDate date NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (tripId) REFERENCES trip(TID),
  FOREIGN KEY (memberId) REFERENCES member(MID)
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

INSERT INTO member VALUES
  (  1,
     'DRAGON',
     'DOCTOR',
     19880501,
     1,
     1),

  (  2,
     'Strange',
     'Dr',
     19880502,
     1,
     1),

  (  3,
     'Superman',
     'Mr',
     19880503,
     1,
     1),
  (  4,
     'Wonder',
     'Woman',
     19880504,
     1,
     0),
  (  5,
     'Ming',
     'Tsai',
     19991214,
     1,
     0),
  (  6,
          'Anran',
          'Chen',
          19931202,
          1,
          0),
  (  7,
     'Philip',
     'Eloy',
     19890506,
     1,
     0),
  (  8,
     'Candy',
     'Crush',
     20100101,
     1,
     0),
  (  9,
     'Number',
     'Nine',
     19090919,
     1,
     0),
  (  10,
     'Santa',
     'Claws',
     09901225,
     1,
     0)
      ;

INSERT INTO account VALUES
  (  1,
     'Dragonman',
     'email@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     355),
  (  2,
     'StrangeDoctor',
     'newEmail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5',
     1000),
  (  3,
     'Superman',
     'supermail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     200),
  (  4,
     'Wonder Woman',
     'wonderemail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     700),
  (  5,
     'Ming',
     'mingemail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     500),
  (  6,
     'Chen',
     'chenemail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     1500),
  (  7,
     'PHIL',
     'philemail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     550),
  (  8,
     'Candy',
     'candyemail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     500),
  (  9,
     'Number_Nine',
     'nineemail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     990),
  (  10,
     'Santa',
     'santaemail@email.com',
     '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', /*qwerty*/
     1225);

INSERT INTO trip (authorID,dDate,dCity,aCity,dPostal,aPostal,Description,Restriction,Title, Comments, Category, Role)
 VALUES
  (
    1,
    '11/29/2016',
    'Dorval',
    'Montreal',
    'H4V2N2',
    'H4V2N2',
    'I am going to concordia university downtown, from dorval.',
    0,
    'To Downtown',
    'To Downtown',
   'specialized',
    1),
   (
   1,
   '11/29/2016',
   'Montreal',
   'Dorval',
   'H4V4N4',
   'H4V4N4',
   'I love New York.',
   0,
   'Lets Go to Dorval',
   'I want to see Dorval Airport.',
   'specialized',
   1),

  (
    2,
    '11/29/2016',
    'Montreal',
    'Dorval',
    'H4B2N2',
    'H4B2N2',
    'Go from Montreal to Dorval',
    1,
    'To Dorval',
    'To Dorval',
   'normal',
    0),

   (
     '3',
     '11/28/2016',
     'Montreal',
     'Dorval',
     'H4V2N2',
     'H4V2N2',
     'Go from Montreal to Dorval',
     0,
     'To Dorval',
     'To Dorval',
     'normal',
     0
    )
;

INSERT INTO memberdetails VALUES
  ('1',
   'Mcgill University',
   'Sherbrook West 3110',
   'Montreal',
   'H2HB3B',
   'Quebec',
   '13537788'
  ),
  ('2',
   'Concordia University',
   'Rue Guy 350',
   'Montreal',
   'H3HJ5J',
   'Quebec',
   '14423478'
  ),
  ('3',
    'sherbrook',
    'cavendish 3010',
    'Montreal',
    'H3HJ6J',
    'Quebec',
    '15857766'
  ),
  ('4',
    'West Side',
    'Queens Quay 685',
    'Toronto',
    'A5JK3K',
    'Ontario',
    '33579231'
  ),
  ('5',
   'King St',
   'King St 1000',
   'Toronto',
   'Z3YX3X',
   'Ontario',
   Null
  ),
  ('6',
   'Front Street West 1050',
   'Piper Street 3110',
   'Toronto',
   'L8OP2R',
   'Ontario',
   '34839009'
  ),
  ('7',
   'Loyal Campus',
   'Boulevard De Maisonneuve O 1323',
   'Dorval',
   'A5JK3K',
   'Montreal',
   Null
  ),
  ('8',
   'Carrefour Angrignon',
   'Boulevard De La Verendrye',
   'Angrignon',
   'H3HJ5J',
   'Quebec',
   '22567790'
  ),
  ('9',
   'Ile des Soeurs',
   Null,
   'Montreal',
   'A2BC4D',
   'Quebec',
   Null
  ),
  ('10',
   'Wall Street 10',
   Null,
   'New York',
   Null,
   'New York',
   '99399989'
  );
