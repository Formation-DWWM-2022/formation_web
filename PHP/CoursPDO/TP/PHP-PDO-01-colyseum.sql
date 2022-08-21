CREATE DATABASE colyseum CHARACTER SET 'utf8';

USE colyseum;

CREATE TABLE `clients` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lastName` VARCHAR(45) NOT NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `birthDate` DATE NOT NULL,
  `card` BOOLEAN NOT NULL,
  `cardNumber` INT UNSIGNED,
  PRIMARY KEY (Id)
);

CREATE TABLE `cards` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cardNumber` INT UNSIGNED NOT NULL,
  `cardTypesId` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE `cardTypes` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `discount` INT UNSIGNED NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE `shows` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `performer` VARCHAR(45) NOT NULL,
  `date` DATE NOT NULL,
  `showTypesId` SMALLINT UNSIGNED NOT NULL,
  `firstGenresId` SMALLINT UNSIGNED NOT NULL,
  `secondGenreId` SMALLINT UNSIGNED NOT NULL,
  `duration` TIME NOT NULL,
  `startTime` TIME NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE `tickets` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` FLOAT NOT NULL,
  `bookingsId` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE `bookings` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `clientId` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE `showTypes` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` VARCHAR (45) NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE `genres` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre` VARCHAR(45) NOT NULL,
  `showTypesId` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (Id)
);

INSERT INTO `clients` (`lastName`,`firstName`,`birthDate`,`card`,`cardNumber`)
VALUES ('Brennan','Guinevere','1994-02-05',1,2627),
('Dean','Ori','1973-11-23',0,NULL),
('Sharpe','Nora','1983-03-10',0,NULL),
('Hampton','Wade','2000-03-05',1,2022),
('Conner','Kibo','1979-11-04',0,NULL),
('Klein','Hilary','1972-12-16',0,NULL),
('Tyler','Lawrence','1996-05-13',0,NULL),
('Dudley','Tanya','1966-12-28',0,NULL),
('Terrell','Kim','1997-07-27',1,2608),
('Mclaughlin','Laura','1977-02-16',0,NULL),
('Lewis','Linda','1983-07-18',0,NULL),
('Ware','Gemma','1969-10-17',1,2377),
('Roth','Jolie','1981-02-24',0,NULL),
('Michael','Harriet','1961-11-27',1,1869),
('Simpson','Paloma','1998-01-07',0,NULL),
('Cote','Fulton','1967-11-01',1,2403),
('Wheeler','Echo','1965-10-10',0,NULL),
('Snider','Desiree','1996-07-28',0,NULL),
('Vaughan','Vanna','1992-09-13',1,1263),
('Barnes','Preston','1988-12-20',1,2198),
('Padilla','Britanney','2015-04-03',1,2927),
('Perry','Gabriel','1974-04-09',1,2775),
('Mccormick','Hyatt','1968-05-02',0,NULL),
('Stark','Keiko','1985-04-08',0,NULL),
('London','Sean','1975-02-02',0,NULL);

INSERT INTO `cards` (`cardNumber`,`cardTypesId`)
VALUES (2627,3),
(2022,3),
(2608,3),
(2377,1),
(1869,4),
(2403,4),
(1263,3),
(2198,1),
(2927,2),
(2775,2);

INSERT INTO `cardTypes` (`type`,`discount`)
VALUES ('Fidélité',20),
('Famille Nombreuse',30),
('Etudiant',40),
('Employé',50);

INSERT INTO `shows` (`title`,`performer`,`date`,`showTypesId`,`firstGenresId`,`secondGenreId`,`duration`,`startTime`)
VALUES ('Vestibulum accumsan','Osborn','2016-10-15',1,4,3,'02:00:00','20:00:00'),
('Venenatis lacus','Dale','2017-01-05',1,1,8,'02:00:00','20:00:00'),
('Sem egestas','Juarez','2017-02-01',1,8,21,'02:00:00','20:00:00'),
('Nec urna','Tate','2018-05-02',1,3,21,'02:00:00','20:00:00'),
('Neque et','Hays','2016-12-24',1,6,15,'02:00:00','20:00:00'),
('Convallis convallis','Boone','2019-12-18',1,9,21,'02:00:00','20:00:00'),
('Cursus. Nunc','Prince','2020-05-02',1,6,10,'02:00:00','20:00:00'),
('Ornare lectus','Butler','2016-12-25',1,10,9,'02:00:00','20:00:00');

INSERT INTO `tickets` (`price`,`bookingsId`)
VALUES (40,1),(40,1),(40,1),(40,1),(40,1),(40,2),(40,2),(40,2),(40,2),(40,2),(40,3),(40,3),(40,3),(40,4),(40,5),(40,6),
(40,6),(40,6),(40,6),(40,6),(40,7),(40,7),(40,8),(40,9),(40,9),(40,9),(40,9),(40,9),(40,9),(40,9),(40,10),(40,10),
(40,10),(40,10),(40,11),(40,11),(40,11),(40,11),(40,11),(40,11),(40,12),(40,12),(40,12),(40,12),(40,12),(40,12),(40,12),
(40,12),(40,12),(40,12),(40,13),(40,13),(40,13),(40,13),(40,13),(40,13),(40,13),(40,13),(40,13),(40,13),(40,14),(40,14),
(40,14),(40,15),(40,15),(40,15),(40,15),(40,16),(40,17),(40,17),(40,17),(40,17),(40,17),(40,18),(40,18),(40,18),(40,18),
(40,19),(40,19),(40,19),(40,19),(40,20),(40,20),(40,20),(40,21),(40,21),(40,21),(40,21),(40,22),(40,22),(40,22),(40,23),
(40,23),(40,23),(40,24),(40,24),(40,24),(40,25),(40,25),(40,25);

INSERT INTO `bookings` (`clientId`)
VALUES (1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25);

INSERT INTO `showTypes` (`type`)
VALUES ('Concert'),
('Théâtre'),
('Humour'),
('Danse');

INSERT INTO `genres` (`genre`,`showTypesId`)
VALUES ('Variété et chanson française',1),
('Variété internationale',1),
('Pop/Rock',1),
('Musique électronique',1),
('Folk',1),
('Rap',1),
('Hip Hop',1),
('Slam',1),('Reggae',1),
('Clubbing',1),
('RnB',1),
('Soul',1),
('Funk',1),
('Jazz',1),
('Blues',1),
('Country',1),
('Gospel',1),
('Musique du monde',1),
('Classique',1),
('Opéra',1),
('Autres',1),
('Drame',2),
('Comédie',2),
('Comtemporain',2),
('Monologue',2),
('One Man / Woman Show',3),
('Café-Théâtre',3),
('Stand Up',3),
('Autres',3),
('Comtemporaine',4),
('Classique',4),
('Urbaine',4);