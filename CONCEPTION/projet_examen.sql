-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 juin 2024 à 10:21
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE agence (
  id_agence int(11)  PRIMARY KEY AUTO_INCREMENT,
  nom varchar(20) NOT NULL,
  adresse varchar(20) NOT NULL,
  cp int(11) NOT NULL,
  ville varchar(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

CREATE TABLE utilisateur (
  id_utilisateur int(11) PRIMARY KEY AUTO_INCREMENT,
  nom varchar(30) NOT NULL,
  prenom varchar(30) NOT NULL,
  sexe varchar(15) NOT NULL,
  email varchar(20) NOT NULL,
  mdp varchar(100) NOT NULL,
  date_inscription date NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

CREATE TABLE vehicule (
  id_vehicule int(11) PRIMARY KEY AUTO_INCREMENT,
  marque varchar(100) NOT NULL,
  modele varchar(20) NOT NULL,
  capacite int(11) NOT NULL,
  prix_journalier decimal(10, 2) NOT NULL,
  couleur varchar(20) NOT NULL,
  etat varchar(20) NOT NULL,
  poids int(11) NOT NULL,
  nombrede_porte int(11) NOT NULL,
  annee int(11) NOT NULL,
  image varchar(255) NOT NULL,
  id_agence int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;


CREATE TABLE commenter (
  id_utilisateur int(11) ,
  id_vehicule int(11),
  commentaire varchar(100) NOT NULL,

  FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur) ON DELETE CASCADE,
  FOREIGN KEY (id_vehicule) REFERENCES vehicule (id_vehicule) ON DELETE CASCADE,  
  PRIMARY KEY (id_utilisateur, id_vehicule)  

) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;


CREATE TABLE reserver (
  id_utilisateur int(11),
  id_vehicule int(11),
  date_reservations date NOT NULL,

  PRIMARY KEY (id_utilisateur, id_vehicule),
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur),

  FOREIGN KEY (id_vehicule) REFERENCES vehicule (id_vehicule)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;


-- --------------------------------------------------------
--
-- Structure de la table vehicule
--



INSERT INTO `agence` (`id_agence`, `nom`, `adresse`, `cp`, `ville`)
VALUES (
    NULL,
    'AutoRent',
    '123 Rue de la Liberté',
    '75001',
    'Paris'
  ),
  (
    NULL,
    'RentCar',
    '45 Avenue des Champs-Élysées',
    '75008',
    'Paris'
  ),
  (
    NULL,
    'CarHire',
    '78 Boulevard Saint-Germain',
    '75006',
    'Paris'
  ),
  (
    NULL,
    'EasyRent',
    '10 Rue de la République',
    '69001',
    'Lyon'
  ),
  (
    NULL,
    'QuickRent',
    '22 Rue Sainte-Catherine',
    '33000',
    'Bordeaux'
  );
INSERT INTO `vehicule` (
    `id_vehicule`,
    `marque`,
    `modele`,
    `capacite`,
    `prix_journalier`,
    `couleur`,
    `etat`,
    `poids`,
    `nombrede_porte`,
    `annee`,
    `image`,
    `id_agence`
  )
VALUES (
    NULL,
    'Peugeot',
    '208',
    '5',
    '35',
    'bleu',
    'bonne',
    '1',
    '5',
    '2017',
    'https://imgs.search.brave.com/R0LtscTK145LA_PG8xeARcvoEoONCw7VK5w65rwTU6I/rs:fit:860:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy8w/LzAzL1BldWdlb3Rf/MjA4XzVkb29yX2Zh/Y2VsaWZ0LmpwZw',
    '7'
  ),
  (
    NULL,
    'Volkswagen',
    'golf',
    '5',
    '40',
    'noir',
    'excellent',
    '1',
    '5',
    '2019',
    'https://media.gettyimages.com/id/1405478733/fr/photo/volkswagen-golf-gti-mk-8.jpg?s=1024x1024&w=gi&k=20&c=-wV6Weh61ZSjKk6G8JTwP21yG1Z1u9_sryW62n92eoc=',
    '3'
  ),
  (
    NULL,
    'ford',
    'fiesta',
    '5',
    '28',
    'blanc',
    'très bon',
    '1',
    '5',
    '2018',
    'https://images.caradisiac.com/logos-ref/modele/modele--ford-fiesta-6/S8-modele--ford-fiesta-6.jpg',
    '4'
  ),
  (
    NULL,
    'toyota',
    'yaris',
    '5',
    '47',
    'rouge',
    'bon',
    '1',
    '5',
    '2016',
    'https://edgecast-img.yahoo.net/mysterio/api/6F15AFAFA3B0E1FEB469422F09E8EE3E6D761C0757DF4B2E19915E32285BD654/autoblog/resizefill_w788_h525;quality_85;format_webp;cc_31536000;/https://s.aolcdn.com/commerce/autodata/images/USC50TOC191B021001.jpg',
    '5'
  );
INSERT INTO `utilisateur` (
    `id_utilisateur`,
    `nom`,
    `prenom`,
    `sexe`,
    `email`,
    `mdp`,
    `date_inscription`
  )
VALUES (
    NULL,
    'muller',
    'john',
    'masculin',
    'john@gmail.com',
    'john',
    '2024-06-15 21:03:43.000000'
  ),
  (
    NULL,
    'konate',
    'diane',
    'féminin',
    'diane@gmail.com',
    'diane',
    '2024-06-18 23:03:43'
  ),
  (
    NULL,
    'mampouya',
    'robert',
    'masculin',
    'robert@gmail.com',
    'robert',
    '2024-06-10 23:05:33'
  );

INSERT INTO `reserver` (`id_utilisateur`, `id_vehicule`, `date_reservations`) VALUES ('3', '4', '2024-06-12');
INSERT INTO `reserver` (`id_utilisateur`, `id_vehicule`, `date_reservations`) VALUES ('1', '4', '2024-06-21');

/*INSERT INTO `commenter` (`id_utilisateur`, `id_vehicule`, `commentaire`)
VALUES ('2', '2',
    "La Peugeot 208 que j'ai louée chez RentCar était parfaite pour mes déplacements en ville. Elle est économique et facile à conduire. Le personnel de l'agence était très serviable et m'a aidé à trouver la meilleure offre."
  ),
  ('1', '7',
    "La Volkswagen Golf est une voiture fantastique, surtout pour de longs trajets. J'ai apprécié la location chez CarHire, la voiture était comme neuve et très bien entretenue. Je reviendrai certainement pour mes prochaines locations."
  ),
('3', '8',
    "La Ford Fiesta que j'ai louée chez EasyRent était impeccable. La voiture était propre, en très bon état, et consommait peu de carburant. Le processus de location a été rapide et sans tracas. Je recommande vivement EasyRent."
  ); */



