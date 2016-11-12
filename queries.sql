CREATE TABLE member (
  MID int(11) NOT NULL,
  firstName varchar(20) DEFAULT NULL,
  lastName varchar(20) DEFAULT NULL,
  Birthday int(11) NOT NULL,
  Role varchar(20) NOT NULL,
  isAdmin BOOLEAN,
  PRIMARY KEY (MID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE city (
  cityName varchar(10) NOT NULL,
  citySurrounded varchar(20) DEFAULT NULL,
  PRIMARY KEY (cityName)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE trip (
  TID int(11) NOT NULL,
  authorID int(11) NOT NULL,
  dDate int(8) NOT NULL,
  aDate int(8) NOT NULL,
  cityName varchar(10) NOT NULL,
  dPostal varchar(20) DEFAULT NULL,
  aPostal varchar(20) DEFAULT NULL,
  Description varchar(100) DEFAULT NULL,
  Restriction boolean DEFAULT NULL,
  Title varchar(20) DEFAULT NULL,
  Comments varchar(100) DEFAULT NULL,
  Category varchar(15) NOT NULL,
  PRIMARY KEY (TID),
  FOREIGN KEY (cityName) REFERENCES city(cityName)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (authorID) REFERENCES member(MID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE account (
  MID int(11) NOT NULL,
  Username varchar(20) NOT NULL,
  Password varchar(20) NOT NULL,
  Balance float(20) NOT NULL,
  adminPrivilege boolean NOT NULL,
  FOREIGN KEY(MID) REFERENCES member(MID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
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


INSERT INTO member VALUES
  (  1,
     'Dragon',
     'Doctor',
     19931223,
     'rider',
     1),
  (  2,
     'Dog',
     'Flying',
     19920123,
     'driver',
     1);;

INSERT INTO trip VALUES
  (1,
    1,
    19901111,
    19911212,
    'Dorval',
    'H4V2N2',
    'H4V2N2',
    'Description1',
    0,
    'title#1',
    'comments#1',
    'specialized'),

  (2,
    2,
    20161116,
    20121212,
    'Dorval',
    'H4B2N2',
    'H4B2N2',
    'description#2',
    1,
    'title#2',
    'comments#2',
    'normal');

# INSERT INTO `trip` (`TID`, `authorID`, `dDate`, `aDate`, `cityName`, `dPostal`, `aPostal`, `Description`, `Restriction`, `Title`, `Comments`, `Category`) VALUES ('1', '1', '19911212', '19921212', 'WestIsland', 'H2S2K1', 'H2S3Y9', 'Ottawa to Montreal', '0', 'Trip1', 'This is a comment', 'normal')