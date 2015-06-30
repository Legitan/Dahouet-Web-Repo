-- --------------------------------------------------------
-- Hôte:                         localhost
-- Version du serveur:           5.5.24-log - MySQL Community Server (GPL)
-- Serveur OS:                   Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la base pour dahouet_complet
DROP DATABASE IF EXISTS `dahouet_complet`;
CREATE DATABASE IF NOT EXISTS `dahouet_complet` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dahouet_complet`;


-- Export de la structure de table dahouet_complet. challenge
DROP TABLE IF EXISTS `challenge`;
CREATE TABLE IF NOT EXISTS `challenge` (
  `CDOCHAL` char(3) NOT NULL,
  `CHALLENGE` varchar(15) NOT NULL,
  `DATDEBUT` date NOT NULL,
  `DATFIN` date NOT NULL,
  PRIMARY KEY (`CDOCHAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.challenge: ~2 rows (environ)
DELETE FROM `challenge`;
/*!40000 ALTER TABLE `challenge` DISABLE KEYS */;
INSERT INTO `challenge` (`CDOCHAL`, `CHALLENGE`, `DATDEBUT`, `DATFIN`) VALUES
	('E01', 'Eté 2015', '2015-04-01', '2015-09-30'),
	('H01', 'Hivers 2015', '2014-11-01', '2015-03-15');
/*!40000 ALTER TABLE `challenge` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. classe
DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `NUMCLAS` char(4) NOT NULL,
  `CODSER` char(4) NOT NULL,
  `LIBCLAS` varchar(15) NOT NULL,
  `COEFCLAS` decimal(3,2) NOT NULL,
  `JAUGE` char(4) NOT NULL,
  PRIMARY KEY (`NUMCLAS`),
  KEY `CIF_1_FK` (`CODSER`),
  CONSTRAINT `FK1_serie` FOREIGN KEY (`CODSER`) REFERENCES `serie` (`CODSER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.classe: ~1 rows (environ)
DELETE FROM `classe`;
/*!40000 ALTER TABLE `classe` DISABLE KEYS */;
INSERT INTO `classe` (`NUMCLAS`, `CODSER`, `LIBCLAS`, `COEFCLAS`, `JAUGE`) VALUES
	('C01', 'S01', 'Muscadet', 0.95, 'J001');
/*!40000 ALTER TABLE `classe` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. classer
DROP TABLE IF EXISTS `classer`;
CREATE TABLE IF NOT EXISTS `classer` (
  `NUMVOIL` decimal(4,0) NOT NULL,
  `CDOCHAL` char(3) NOT NULL,
  `NBPTRS` int(11) DEFAULT NULL,
  `CLTCHL` int(11) DEFAULT NULL,
  PRIMARY KEY (`NUMVOIL`,`CDOCHAL`),
  KEY `CLASSER_FK` (`NUMVOIL`),
  KEY `CLASSER2_FK` (`CDOCHAL`),
  CONSTRAINT `FK1_voilier` FOREIGN KEY (`NUMVOIL`) REFERENCES `voilier` (`NUMVOIL`),
  CONSTRAINT `FK2_challenge` FOREIGN KEY (`CDOCHAL`) REFERENCES `challenge` (`CDOCHAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.classer: ~0 rows (environ)
DELETE FROM `classer`;
/*!40000 ALTER TABLE `classer` DISABLE KEYS */;
/*!40000 ALTER TABLE `classer` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. club_nautique
DROP TABLE IF EXISTS `club_nautique`;
CREATE TABLE IF NOT EXISTS `club_nautique` (
  `IDCLUB` int(11) NOT NULL,
  `MAILCLUB` varchar(25) NOT NULL,
  `CONTACT` varchar(25) NOT NULL,
  `TELEPHONE` decimal(10,0) NOT NULL,
  PRIMARY KEY (`IDCLUB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.club_nautique: ~0 rows (environ)
DELETE FROM `club_nautique`;
/*!40000 ALTER TABLE `club_nautique` DISABLE KEYS */;
/*!40000 ALTER TABLE `club_nautique` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. commissaire
DROP TABLE IF EXISTS `commissaire`;
CREATE TABLE IF NOT EXISTS `commissaire` (
  `CODCOM` int(11) NOT NULL,
  `NOMCOM` varchar(15) NOT NULL,
  `PRECOM` varchar(15) NOT NULL,
  `MAILCOM` varchar(25) NOT NULL,
  `COMITECOM` varchar(25) NOT NULL,
  PRIMARY KEY (`CODCOM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.commissaire: ~3 rows (environ)
DELETE FROM `commissaire`;
/*!40000 ALTER TABLE `commissaire` DISABLE KEYS */;
INSERT INTO `commissaire` (`CODCOM`, `NOMCOM`, `PRECOM`, `MAILCOM`, `COMITECOM`) VALUES
	(101, 'Le Coup', 'Marcel', 'mlc@afpa.fr', 'Bretagne'),
	(102, 'De Plus', 'Etienne', 'elp@afpa.fr', 'Pays de Loire'),
	(103, 'Qui va bien', 'René', 'qvb@afpa.fr', 'Bretagne');
/*!40000 ALTER TABLE `commissaire` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. equipage
DROP TABLE IF EXISTS `equipage`;
CREATE TABLE IF NOT EXISTS `equipage` (
  `CODEPAR` int(11) NOT NULL,
  `NUMLIC` decimal(5,0) NOT NULL,
  PRIMARY KEY (`CODEPAR`,`NUMLIC`),
  KEY `EQUIPAGE_FK` (`CODEPAR`),
  KEY `EQUIPAGE2_FK` (`NUMLIC`),
  CONSTRAINT `FK1_participe` FOREIGN KEY (`CODEPAR`) REFERENCES `participe` (`CODEPAR`),
  CONSTRAINT `FK2_licencie` FOREIGN KEY (`NUMLIC`) REFERENCES `licencie` (`NUMLIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.equipage: ~5 rows (environ)
DELETE FROM `equipage`;
/*!40000 ALTER TABLE `equipage` DISABLE KEYS */;
INSERT INTO `equipage` (`CODEPAR`, `NUMLIC`) VALUES
	(1, 1),
	(2, 1),
	(1, 2),
	(2, 2),
	(1, 3);
/*!40000 ALTER TABLE `equipage` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. juge
DROP TABLE IF EXISTS `juge`;
CREATE TABLE IF NOT EXISTS `juge` (
  `NUMREG` decimal(4,0) NOT NULL,
  `CODCOM` int(11) NOT NULL,
  PRIMARY KEY (`NUMREG`,`CODCOM`),
  KEY `JUGE_FK` (`NUMREG`),
  KEY `JUGE2_FK` (`CODCOM`),
  CONSTRAINT `FK1_regate` FOREIGN KEY (`NUMREG`) REFERENCES `regate` (`NUMREG`),
  CONSTRAINT `FK2_commissaire` FOREIGN KEY (`CODCOM`) REFERENCES `commissaire` (`CODCOM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.juge: ~4 rows (environ)
DELETE FROM `juge`;
/*!40000 ALTER TABLE `juge` DISABLE KEYS */;
INSERT INTO `juge` (`NUMREG`, `CODCOM`) VALUES
	(1000, 101),
	(1000, 102),
	(2000, 101),
	(2000, 103);
/*!40000 ALTER TABLE `juge` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. licencie
DROP TABLE IF EXISTS `licencie`;
CREATE TABLE IF NOT EXISTS `licencie` (
  `NUMLIC` decimal(5,0) NOT NULL,
  `NOMLIC` varchar(15) NOT NULL,
  `PTSFFV` decimal(5,0) DEFAULT NULL,
  `ANNLIC` int(11) NOT NULL,
  `DATNAISS` date NOT NULL,
  PRIMARY KEY (`NUMLIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.licencie: ~3 rows (environ)
DELETE FROM `licencie`;
/*!40000 ALTER TABLE `licencie` DISABLE KEYS */;
INSERT INTO `licencie` (`NUMLIC`, `NOMLIC`, `PTSFFV`, `ANNLIC`, `DATNAISS`) VALUES
	(1, 'Martin', 0, 0, '2015-01-14'),
	(2, 'Dupont', 0, 0, '2015-01-14'),
	(3, 'Marcel', 0, 0, '2015-01-14');
/*!40000 ALTER TABLE `licencie` ENABLE KEYS */;


-- Export de la structure de procedure dahouet_complet. P1_Moyenne_Distance
DROP PROCEDURE IF EXISTS `P1_Moyenne_Distance`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `P1_Moyenne_Distance`(IN `p_cdochal` CHAR(3))
    DETERMINISTIC
BEGIN
/*
 On souhaite obtenir la moyenne des distances des régates 
 pour un challenge (hiver ou été) donné  
*/
DECLARE moyenne decimal(5,2);
SELECT  AVG(regate.DISTANCE) into moyenne
from challenge
natural join regate
where challenge.CDOCHAL = p_cdochal;
select moyenne;
END//
DELIMITER ;


-- Export de la structure de procedure dahouet_complet. P2_Liste_Equipage
DROP PROCEDURE IF EXISTS `P2_Liste_Equipage`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `P2_Liste_Equipage`(IN `p_voilier` DECIMAL(4,0), IN `p_regate` DECIMAL(4,0))
    DETERMINISTIC
BEGIN
/*
 On souhaite obtenir la liste de l'équipage d'un voilier pour une régate.
*/
DECLARE v_libreg varchar (25);
DECLARE v_nom_voilier varchar(25);
DECLARE v_numlic dec(5,0);
DECLARE v_nomlic varchar(25);
DECLARE v_skipper dec(5,0);
DECLARE done INT DEFAULT 0; 

--  définition du curseur
DECLARE  c_liste CURSOR FOR  
select libreg,   voilier.NOMVOIL, equipage.numlic as 'Equipier', nomlic,  participe.NUMLICSKI as 'Skipper' from participe
inner join equipage on equipage.CODEPAR = participe.CODEPAR
inner join licencie on licencie.NUMLIC = equipage.NUMLIC
inner join voilier on voilier.NUMVOIL = participe.NUMVOIL
inner join regate on regate.NUMREG = participe.NUMREG
where regate.NUMREG = p_regate and
voilier.NUMVOIL = p_voilier;

DECLARE EXIT HANDLER FOR SQLSTATE '02000' SET done := 1;  
-- ouverture du curseur, exécution de la requête associée
open c_liste;   
REPEAT
	-- Lecture de l'occurence en cours  
	fetch c_liste into v_libreg,v_nom_voilier,v_numlic,v_nomlic,v_skipper;  
	select v_libreg,v_nom_voilier,v_numlic,v_nomlic,v_skipper; 
UNTIL done = 1
END REPEAT;
-- libération du curseur, libération de la mémoire  
close c_liste; 

END//
DELIMITER ;


-- Export de la structure de procedure dahouet_complet. P3_Liste_Commissaire
DROP PROCEDURE IF EXISTS `P3_Liste_Commissaire`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `P3_Liste_Commissaire`(IN `p_dateDeb` DATE, IN `p_dateFin` DATE)
BEGIN
/*
On veut lister les interventions des commissaires sur un challenge entre deux dates.  
 La procédure renvoie pour chaque intervention : 
 - Le nom du commissaire associé 
 - Le comité du commissaire 
 - La date de la régate concernée
*/
DECLARE v_nom_commissaire varchar (25);
DECLARE v_nom_comite varchar(25);
DECLARE v_date_reg date;
DECLARE v_libreg char(25);

DECLARE done INT DEFAULT 0; 

--  définition du curseur
DECLARE  c_liste CURSOR FOR  
select regate.DATREG,regate.LIBREG, commissaire.NOMCOM, commissaire.COMITECOM from commissaire
natural join regate
where regate.DATREG between p_dateDeb and p_dateFin;

DECLARE EXIT HANDLER FOR SQLSTATE '02000' SET done := 1;  
-- ouverture du curseur, exécution de la requête associée
open c_liste;   
REPEAT
	-- Lecture de l'occurence en cours  
	fetch c_liste into v_nom_commissaire, v_nom_comite, v_date_reg, v_libreg; 
	select v_nom_commissaire, v_nom_comite, v_date_reg, v_libreg; 
UNTIL done = 1
END REPEAT;
-- libération du curseur, libération de la mémoire  
close c_liste; 


END//
DELIMITER ;


-- Export de la structure de table dahouet_complet. participe
DROP TABLE IF EXISTS `participe`;
CREATE TABLE IF NOT EXISTS `participe` (
  `CODEPAR` int(11) NOT NULL,
  `NUMVOIL` decimal(4,0) NOT NULL,
  `NUMREG` decimal(4,0) NOT NULL,
  `NUMLICSKI` decimal(5,0) NOT NULL,
  `STATUT` int(11) NOT NULL,
  `DATEINSC` datetime NOT NULL,
  `TPSREEL` decimal(5,0) DEFAULT NULL,
  `CODEDEC` char(1) DEFAULT NULL,
  `PLACE` int(11) DEFAULT NULL,
  `TPSCOMP` decimal(5,0) DEFAULT NULL,
  `HEURARR` time DEFAULT NULL,
  `NUMPORT` char(10) NOT NULL,
  PRIMARY KEY (`CODEPAR`),
  KEY `FK1_participe_voilier` (`NUMVOIL`),
  KEY `FK2_participe_regate` (`NUMREG`),
  KEY `FK3_participe_licencie` (`NUMLICSKI`),
  CONSTRAINT `FK1_participe_voilier` FOREIGN KEY (`NUMVOIL`) REFERENCES `voilier` (`NUMVOIL`),
  CONSTRAINT `FK2_participe_regate` FOREIGN KEY (`NUMREG`) REFERENCES `regate` (`NUMREG`),
  CONSTRAINT `FK3_participe_licencie` FOREIGN KEY (`NUMLICSKI`) REFERENCES `licencie` (`NUMLIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.participe: ~2 rows (environ)
DELETE FROM `participe`;
/*!40000 ALTER TABLE `participe` DISABLE KEYS */;
INSERT INTO `participe` (`CODEPAR`, `NUMVOIL`, `NUMREG`, `NUMLICSKI`, `STATUT`, `DATEINSC`, `TPSREEL`, `CODEDEC`, `PLACE`, `TPSCOMP`, `HEURARR`, `NUMPORT`) VALUES
	(1, 22, 1000, 3, 0, '2015-01-10 09:20:29', NULL, NULL, NULL, NULL, NULL, '0653514875'),
	(2, 22, 2000, 2, 0, '2015-01-15 10:57:58', NULL, NULL, NULL, NULL, '10:58:01', '0658967425');
/*!40000 ALTER TABLE `participe` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. proprietaire
DROP TABLE IF EXISTS `proprietaire`;
CREATE TABLE IF NOT EXISTS `proprietaire` (
  `IDMBR` int(11) NOT NULL,
  `IDCLUB` int(11) NOT NULL,
  `NOMMBR` varchar(15) NOT NULL,
  `MAILMBR` varchar(20) NOT NULL,
  `PWMBR` varchar(10) NOT NULL,
  PRIMARY KEY (`IDMBR`),
  KEY `ETRE_FK` (`IDCLUB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.proprietaire: ~1 rows (environ)
DELETE FROM `proprietaire`;
/*!40000 ALTER TABLE `proprietaire` DISABLE KEYS */;
INSERT INTO `proprietaire` (`IDMBR`, `IDCLUB`, `NOMMBR`, `MAILMBR`, `PWMBR`) VALUES
	(500, 100, 'Martin', 'martin@afpa.fr', '');
/*!40000 ALTER TABLE `proprietaire` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. regate
DROP TABLE IF EXISTS `regate`;
CREATE TABLE IF NOT EXISTS `regate` (
  `NUMREG` decimal(4,0) NOT NULL,
  `CDOCHAL` char(3) NOT NULL,
  `CODCOM` int(11) NOT NULL,
  `LIBREG` varchar(25) NOT NULL,
  `DATREG` date NOT NULL,
  `LIEUREG` varchar(40) NOT NULL,
  `DISTANCE` decimal(4,0) NOT NULL,
  `HEURDEP` time DEFAULT NULL,
  PRIMARY KEY (`NUMREG`),
  KEY `FK1_regate_challenge` (`CDOCHAL`),
  KEY `FK2_regate_commissaire` (`CODCOM`),
  CONSTRAINT `FK1_regate_challenge` FOREIGN KEY (`CDOCHAL`) REFERENCES `challenge` (`CDOCHAL`),
  CONSTRAINT `FK2_regate_commissaire` FOREIGN KEY (`CODCOM`) REFERENCES `commissaire` (`CODCOM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.regate: ~2 rows (environ)
DELETE FROM `regate`;
/*!40000 ALTER TABLE `regate` DISABLE KEYS */;
INSERT INTO `regate` (`NUMREG`, `CDOCHAL`, `CODCOM`, `LIBREG`, `DATREG`, `LIEUREG`, `DISTANCE`, `HEURDEP`) VALUES
	(1000, 'H01', 103, 'Le duo d\'armor', '2015-01-15', 'Baie de St Brieuc', 15, '09:00:00'),
	(2000, 'H01', 103, '40 miles de Dahouet', '2015-02-15', 'Baie de St Brieuc', 40, '09:00:00');
/*!40000 ALTER TABLE `regate` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. serie
DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `CODSER` char(4) NOT NULL,
  `SERIE` varchar(15) NOT NULL,
  PRIMARY KEY (`CODSER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.serie: ~1 rows (environ)
DELETE FROM `serie`;
/*!40000 ALTER TABLE `serie` DISABLE KEYS */;
INSERT INTO `serie` (`CODSER`, `SERIE`) VALUES
	('S01', 'Habitable');
/*!40000 ALTER TABLE `serie` ENABLE KEYS */;


-- Export de la structure de table dahouet_complet. voilier
DROP TABLE IF EXISTS `voilier`;
CREATE TABLE IF NOT EXISTS `voilier` (
  `NUMVOIL` decimal(4,0) NOT NULL,
  `NUMCLAS` char(4) NOT NULL,
  `IDMBR` int(11) NOT NULL,
  `NOMVOIL` varchar(15) NOT NULL,
  `NBRPTS` int(11) DEFAULT NULL,
  PRIMARY KEY (`NUMVOIL`),
  KEY `CIF_2_FK` (`NUMCLAS`),
  KEY `APPARTENIR_FK` (`IDMBR`),
  CONSTRAINT `FK1_voilier_classe` FOREIGN KEY (`NUMCLAS`) REFERENCES `classe` (`NUMCLAS`),
  CONSTRAINT `FK2_voilier_proprietaire` FOREIGN KEY (`IDMBR`) REFERENCES `proprietaire` (`IDMBR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table dahouet_complet.voilier: ~1 rows (environ)
DELETE FROM `voilier`;
/*!40000 ALTER TABLE `voilier` DISABLE KEYS */;
INSERT INTO `voilier` (`NUMVOIL`, `NUMCLAS`, `IDMBR`, `NOMVOIL`, `NBRPTS`) VALUES
	(22, 'C01', 500, 'Carambar II', 0);
/*!40000 ALTER TABLE `voilier` ENABLE KEYS */;


-- Export de la structure de déclancheur dahouet_complet. participe_before_update
DROP TRIGGER IF EXISTS `participe_before_update`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `participe_before_update` BEFORE UPDATE ON `participe` FOR EACH ROW BEGIN
/*
Vérifier que la place attribuée à un voilier à l’issue d’une régate, 
n’est pas supérieure au nombre de participants. 
*/
DECLARE i int;
DECLARE Place_Erronee CONDITION FOR SQLSTATE '45000';

select count(*) INTO i
from participe
where participe.NUMREG = NEW.NUMREG;

if i < NEW.PLACE then
	SIGNAL Place_Erronee
	SET MESSAGE_TEXT = 'Place erronée pour cette régate',
	MYSQL_ERRNO = '9000';
end if;


END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Export de la structure de déclancheur dahouet_complet. regate_before_delete
DROP TRIGGER IF EXISTS `regate_before_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `regate_before_delete` BEFORE DELETE ON `regate` FOR EACH ROW BEGIN
/*
Ne pas supprimer une régate 
si le challenge auquel elle est associée n'est pas terminé. 
*/

DECLARE v_Datfin DATE;
DECLARE impossible CONDITION FOR SQLSTATE '45000';

select DATFIN INTO v_Datfin
from challenge
where CDOCHAL = OLD.CDOCHAL;

if v_Datfin > CURDATE() then
	SIGNAL impossible
	SET MESSAGE_TEXT = 'Supression régate impossible, challenge non terminé',
	MYSQL_ERRNO = '9000';
end if;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Export de la structure de déclancheur dahouet_complet. regate_before_insert
DROP TRIGGER IF EXISTS `regate_before_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `regate_before_insert` BEFORE INSERT ON `regate` FOR EACH ROW BEGIN
/*
Vérifier que la date de la régate est comprise 
dans les dates du challenge concerné. 
*/
DECLARE v_Datdebut, v_Datfin DATE;
DECLARE Date_Fausse CONDITION FOR SQLSTATE '45000';

select DATDEBUT, DATFIN INTO v_Datdebut, v_Datfin
from challenge
where CDOCHAL = NEW.CDOCHAL;

if v_Datdebut > NEW.DATREG or v_Datfin < NEW.DATREG then
	SIGNAL Date_Fausse
	SET MESSAGE_TEXT = 'Date régate en dehors dates challenge',
	MYSQL_ERRNO = '9000';
end if;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
