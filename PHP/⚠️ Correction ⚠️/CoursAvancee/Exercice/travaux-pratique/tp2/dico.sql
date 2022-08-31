CREATE TABLE
    `auteurs` (
        `idauteur` int(11) NOT NULL auto_increment,
        `nom` varchar(30) NOT NULL default '',
        `prenom` varchar(30) default '',
        `siecle` tinyint(2) default NULL,
        PRIMARY KEY (`idauteur`)
    )
CREATE TABLE
    `citation` (
        `idcit` int(11) NOT NULL auto_increment,
        `texte` mediumtext NOT NULL,
        `idauteur` int(11) NOT NULL default '0',
        PRIMARY KEY (`idcit`)
    )