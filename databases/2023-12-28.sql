DROP TABLE absences;

CREATE TABLE `absences` (
  `id_ab` int(11) NOT NULL AUTO_INCREMENT,
  `date_ab` varchar(50) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `anomalie` varchar(50) NOT NULL,
  `ab_desc` text NOT NULL,
  PRIMARY KEY (`id_ab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO absences VALUES("1","2023-12-03","1","non justifié","responsabilité familiale","Mariage de son frere");
INSERT INTO absences VALUES("2","2023-12-09","2","non justifié","probleme personnel","Ivresse");
INSERT INTO absences VALUES("3","2023-12-18","4","justifié","maladie","Palu");
INSERT INTO absences VALUES("4","2023-12-21","3","non justifié","maladie","cscscscsc");



DROP TABLE avances;

CREATE TABLE `avances` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_date` varchar(50) NOT NULL,
  `a_nature` int(255) NOT NULL,
  `a_espece` int(255) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `a_desc` text NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO avances VALUES("1","2023-10-14","30000","150000","3","Inscription 03 enfants et PPN");
INSERT INTO avances VALUES("2","2023-12-12","60000","150000","3","Préparation fête de noël et PPN");
INSERT INTO avances VALUES("3","2023-12-15","0","80000","5","DEPANNAGE");
INSERT INTO avances VALUES("4","2023-12-21","0","10000","1","cdccdcdc");
INSERT INTO avances VALUES("5","2023-12-21","0","10000","1","cdccdcdc");
INSERT INTO avances VALUES("6","2023-12-21","0","10000","1","cdccdcdc");
INSERT INTO avances VALUES("7","2023-12-21","0","10000","1","cdccdcdc");
INSERT INTO avances VALUES("8","2023-12-22","0","82222222","6","juste pour le plaisir");



DROP TABLE departements;

CREATE TABLE `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_depart` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO departements VALUES("1","ste tavaratra");
INSERT INTO departements VALUES("2","annex shop");
INSERT INTO departements VALUES("3","mahambolo");



DROP TABLE fonctions;

CREATE TABLE `fonctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_fonction` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO fonctions VALUES("1","facturier");
INSERT INTO fonctions VALUES("2","magasinier");
INSERT INTO fonctions VALUES("3","superviseur");
INSERT INTO fonctions VALUES("4","controleur");
INSERT INTO fonctions VALUES("5","caissier(e)");
INSERT INTO fonctions VALUES("6","aide magasinier");
INSERT INTO fonctions VALUES("7","docker");
INSERT INTO fonctions VALUES("8","chauffeur");
INSERT INTO fonctions VALUES("9","cuisinière");
INSERT INTO fonctions VALUES("10","gardien");
INSERT INTO fonctions VALUES("24","stagiaire");



DROP TABLE lastsalary;

CREATE TABLE `lastsalary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO lastsalary VALUES("1","2023-12");



DROP TABLE roles;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO roles VALUES("17","Ravomanana","Brandon Fidelin","$2y$10$rL9YTmzumnRcANFBIlx4C.LPJeYK5HPbeu0AOp5AUBFEhSQLYlXC2","Superviseur","Activé","2023-12-25 18:10:42");
INSERT INTO roles VALUES("18","Vixfgit@gmail.com","Brangitfox","$2y$10$qpwB0XU.VtfC9M3cF4Mnh.efPn5B.Jxkq3Y7DgmYddpp6E3vgCr1G","Admin","Activé","2023-12-25 17:55:07");
INSERT INTO roles VALUES("19","Ravomanana","Brandon Fidelin","$2y$10$Iku.rNHhXFne08Txm.xKL.f17qsgZ6koEFRaiPyzls7gc9whNZUW.","Utilisateur","Activé","2023-12-26 08:42:18");



DROP TABLE salaires;

CREATE TABLE `salaires` (
  `sa_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_worker` int(11) NOT NULL,
  `salaire_reel` int(11) NOT NULL,
  `date_s` varchar(50) NOT NULL,
  `nbr_absence` int(11) NOT NULL,
  `avances` int(11) NOT NULL,
  `salaire_base` int(11) NOT NULL,
  PRIMARY KEY (`sa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO salaires VALUES("1","1","540000","2023-12","1","40000","600000");
INSERT INTO salaires VALUES("2","3","176667","2023-12","1","210000","400000");
INSERT INTO salaires VALUES("3","2","338333","2023-12","1","0","350000");
INSERT INTO salaires VALUES("4","5","170000","2023-12","0","80000","250000");
INSERT INTO salaires VALUES("5","4","500000","2023-12","0","0","500000");
INSERT INTO salaires VALUES("6","6","717777778","2023-12","0","82222222","800000000");



DROP TABLE workers;

CREATE TABLE `workers` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `id_fonction` varchar(100) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `origine` varchar(100) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_depart` int(255) NOT NULL,
  `date_entree` varchar(100) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `date_ajout` varchar(50) NOT NULL,
  `salaire_base` int(11) NOT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO workers VALUES("1","RAVOMANANA ","Barthelemy Fidele","3","304011021652","Andraokaraoka","Vohimanja","Paula","0329260223","1703181033.jpg","1","2023-10-05","homme","","600000");
INSERT INTO workers VALUES("2","RAMAHERY","Therry","8","304 011 023 451","Antadimita","Ambodivohitra","JUVET","035428623","1703181379.jpg","1","2023-11-01","homme","","350000");
INSERT INTO workers VALUES("3","CHRYSTELLE","ELODIE","5","306485231998","Mananara-Centre","Sahave","Gildas Tsilangui","0349247593","1703181691.jpg","2","2023-02-11","femme","","400000");
INSERT INTO workers VALUES("4","NIRINA","Mariella","1","304 025 879 123","Antanambao","Antsirabe","Armando","0332586412","1703183081.jpg","3","2023-11-18","femme","","500000");
INSERT INTO workers VALUES("6","Falisoa","Nikita Vanillie","4","163168498494651368","Mananara, Analanjahana","Brickaville","a remplir ","dsdsdsd","default.png","2","2023-12-22","femme","","800000000");



