DROP TABLE absences;

CREATE TABLE `absences` (
  `id_ab` int(11) NOT NULL AUTO_INCREMENT,
  `date_ab` varchar(50) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `anomalie` varchar(50) NOT NULL,
  `ab_desc` text NOT NULL,
  PRIMARY KEY (`id_ab`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO absences VALUES("1","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("2","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("3","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("4","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("5","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("6","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("7","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("8","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("9","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("10","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("11","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("12","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("13","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("14","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("15","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("16","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("17","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("18","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("19","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("20","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("21","2023-12-15","49","non justifié","autre","TARA NIDITRA NIASA");
INSERT INTO absences VALUES("22","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("23","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("24","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("25","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("26","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("27","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("28","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("29","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("30","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("31","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("32","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("33","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("34","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("35","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("36","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("37","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("38","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("39","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("40","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("41","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("42","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("43","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("44","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("45","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");
INSERT INTO absences VALUES("46","2023-12-15","76","non justifié","autre","TSY DEBUT DU MOIS NIDITRA");



DROP TABLE avances;

CREATE TABLE `avances` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_date` varchar(50) NOT NULL,
  `a_nature` int(255) NOT NULL,
  `a_espece` int(255) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `a_desc` text NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO avances VALUES("1","2023-12-15","0","200000","3","fety");
INSERT INTO avances VALUES("2","2023-12-15","0","100000","25","fety");
INSERT INTO avances VALUES("3","2023-12-15","0","150000","19","fety");
INSERT INTO avances VALUES("4","2023-12-15","0","100000","10","fety");
INSERT INTO avances VALUES("5","2023-12-15","0","100000","14","fety");
INSERT INTO avances VALUES("6","2023-12-15","0","100000","6","fety");
INSERT INTO avances VALUES("7","2023-12-15","0","150000","5","fety");
INSERT INTO avances VALUES("8","2023-12-15","0","100000","30","fety");
INSERT INTO avances VALUES("9","2023-12-15","0","30000","20","fety");
INSERT INTO avances VALUES("10","2023-12-15","0","15000","2","fety");
INSERT INTO avances VALUES("11","2023-12-15","0","90000","64","fety");
INSERT INTO avances VALUES("12","2023-12-15","0","50000","7","fety");
INSERT INTO avances VALUES("13","2023-12-15","0","50000","45","fety");
INSERT INTO avances VALUES("14","2023-12-15","0","100000","56","FETY");
INSERT INTO avances VALUES("15","2023-12-15","0","100000","37","FETY");
INSERT INTO avances VALUES("16","2023-12-15","0","50000","15","FETY");
INSERT INTO avances VALUES("17","2023-12-15","0","50000","22","FETY");
INSERT INTO avances VALUES("18","2023-12-15","0","100000","33","FETY");
INSERT INTO avances VALUES("19","2023-12-15","0","225000","13","FETY");
INSERT INTO avances VALUES("20","2023-12-15","0","100000","48","FETY");
INSERT INTO avances VALUES("21","2023-12-15","0","70000","68","FETY");
INSERT INTO avances VALUES("22","2023-12-15","0","80000","66","FETY");
INSERT INTO avances VALUES("23","2023-12-15","0","50000","69","FETY");
INSERT INTO avances VALUES("24","2023-12-15","0","25000","42","FETY");
INSERT INTO avances VALUES("25","2023-12-15","0","95000","11","FETY");
INSERT INTO avances VALUES("26","2023-12-15","0","100000","46","FETY");
INSERT INTO avances VALUES("27","2023-12-15","0","50000","72","FETY");
INSERT INTO avances VALUES("28","2023-12-15","0","60000","27","FETY");
INSERT INTO avances VALUES("29","2023-12-15","0","150000","38","FETY");
INSERT INTO avances VALUES("30","2023-12-15","0","60000","74","FETY");
INSERT INTO avances VALUES("31","2023-12-15","0","144000","12","FETY");



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

INSERT INTO roles VALUES("18","Vixfgit@gmail.com","Brangitfox","$2y$10$qpwB0XU.VtfC9M3cF4Mnh.efPn5B.Jxkq3Y7DgmYddpp6E3vgCr1G","Admin","Activé","2023-12-25 17:55:07");



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
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO salaires VALUES("76","1","350000","2023-12","0","0","350000");
INSERT INTO salaires VALUES("77","2","235000","2023-12","0","15000","250000");
INSERT INTO salaires VALUES("78","3","350000","2023-12","0","200000","550000");
INSERT INTO salaires VALUES("79","4","350000","2023-12","0","0","350000");
INSERT INTO salaires VALUES("80","5","300000","2023-12","0","150000","450000");
INSERT INTO salaires VALUES("81","6","250000","2023-12","0","100000","350000");
INSERT INTO salaires VALUES("82","7","250000","2023-12","0","50000","300000");
INSERT INTO salaires VALUES("83","8","350000","2023-12","0","0","350000");
INSERT INTO salaires VALUES("84","9","550000","2023-12","0","0","550000");
INSERT INTO salaires VALUES("85","10","250000","2023-12","0","100000","350000");
INSERT INTO salaires VALUES("86","11","105000","2023-12","0","95000","200000");
INSERT INTO salaires VALUES("87","12","256000","2023-12","0","144000","400000");
INSERT INTO salaires VALUES("88","13","125000","2023-12","0","225000","350000");
INSERT INTO salaires VALUES("89","14","250000","2023-12","0","100000","350000");
INSERT INTO salaires VALUES("90","15","150000","2023-12","0","50000","200000");
INSERT INTO salaires VALUES("91","16","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("92","17","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("93","18","350000","2023-12","0","0","350000");
INSERT INTO salaires VALUES("94","19","400000","2023-12","0","150000","550000");
INSERT INTO salaires VALUES("95","20","220000","2023-12","0","30000","250000");
INSERT INTO salaires VALUES("96","21","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("97","22","150000","2023-12","0","50000","200000");
INSERT INTO salaires VALUES("98","23","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("99","24","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("100","25","250000","2023-12","0","100000","350000");
INSERT INTO salaires VALUES("101","26","500000","2023-12","0","0","500000");
INSERT INTO salaires VALUES("102","27","140000","2023-12","0","60000","200000");
INSERT INTO salaires VALUES("103","28","1100000","2023-12","0","0","1100000");
INSERT INTO salaires VALUES("104","29","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("105","30","350000","2023-12","0","100000","450000");
INSERT INTO salaires VALUES("106","31","300000","2023-12","0","0","300000");
INSERT INTO salaires VALUES("107","32","700000","2023-12","0","0","700000");
INSERT INTO salaires VALUES("108","33","500000","2023-12","0","100000","600000");
INSERT INTO salaires VALUES("109","34","350000","2023-12","0","0","350000");
INSERT INTO salaires VALUES("110","35","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("111","36","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("112","37","150000","2023-12","0","100000","250000");
INSERT INTO salaires VALUES("113","38","150000","2023-12","0","150000","300000");
INSERT INTO salaires VALUES("114","39","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("115","40","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("116","41","250000","2023-12","0","0","250000");
INSERT INTO salaires VALUES("117","42","325000","2023-12","0","25000","350000");
INSERT INTO salaires VALUES("118","43","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("119","44","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("120","45","150000","2023-12","0","50000","200000");
INSERT INTO salaires VALUES("121","46","100000","2023-12","0","100000","200000");
INSERT INTO salaires VALUES("122","48","200000","2023-12","0","100000","300000");
INSERT INTO salaires VALUES("123","49","60000","2023-12","21","0","200000");
INSERT INTO salaires VALUES("124","50","500000","2023-12","0","0","500000");
INSERT INTO salaires VALUES("125","52","300000","2023-12","0","0","300000");
INSERT INTO salaires VALUES("126","53","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("127","54","500000","2023-12","0","0","500000");
INSERT INTO salaires VALUES("128","55","500000","2023-12","0","0","500000");
INSERT INTO salaires VALUES("129","56","150000","2023-12","0","100000","250000");
INSERT INTO salaires VALUES("130","57","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("131","58","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("132","59","250000","2023-12","0","0","250000");
INSERT INTO salaires VALUES("133","60","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("134","61","350000","2023-12","0","0","350000");
INSERT INTO salaires VALUES("135","62","350000","2023-12","0","0","350000");
INSERT INTO salaires VALUES("136","63","300000","2023-12","0","0","300000");
INSERT INTO salaires VALUES("137","64","110000","2023-12","0","90000","200000");
INSERT INTO salaires VALUES("138","65","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("139","66","120000","2023-12","0","80000","200000");
INSERT INTO salaires VALUES("140","67","400000","2023-12","0","0","400000");
INSERT INTO salaires VALUES("141","68","180000","2023-12","0","70000","250000");
INSERT INTO salaires VALUES("142","69","250000","2023-12","0","50000","300000");
INSERT INTO salaires VALUES("143","70","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("144","71","50000","2023-12","0","0","50000");
INSERT INTO salaires VALUES("145","72","150000","2023-12","0","50000","200000");
INSERT INTO salaires VALUES("146","73","200000","2023-12","0","0","200000");
INSERT INTO salaires VALUES("147","74","200000","2023-12","0","60000","260000");
INSERT INTO salaires VALUES("148","75","300000","2023-12","0","0","300000");
INSERT INTO salaires VALUES("149","76","33333","2023-12","25","0","200000");



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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO workers VALUES("1","GISTE"," ","2","O","OO","O","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("2","ANGELOT","","1","a remplir ","remplir","remplir","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","250000");
INSERT INTO workers VALUES("3","ELTON","","1","a remplir ","a remplir","a remplir","a remplir ","remplir","default.png","1","2023-12-30","homme","","550000");
INSERT INTO workers VALUES("4","STANISLAS","","8","a remplir ","a remplir","dsdsdsd","a remplir ","&agrave; remplir","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("5","HENRI","","1","a remplir ","dsdsdsd","sdsdsd","a remplir ","&agrave; remplir","default.png","1","2023-12-29","homme","","450000");
INSERT INTO workers VALUES("6","DOUDOU","","8","dsdsdsdsdsdsdsdsd","dsdsdsd","dsdsdsd","dsdsdsd","dsdsdsd","default.png","1","2023-12-28","homme","","350000");
INSERT INTO workers VALUES("7","TANDRA","","8","dsdsdsdsdsdsdsdsd","Mananara, Analanjahana","Mananara","a remplir ","&agrave; remplir","default.png","1","2023-12-30","homme","","300000");
INSERT INTO workers VALUES("8","NAMIA","","1","dsdsdsdsdsdsdsdsd","dsdsdsd","sdsdsd","dsdsdsd","dsdsdsd","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("9","EUPHRASIE","","2","dsdsdsdsdsdsdsdsd","dsdsdsd","sdsdsd","a remplir ","dsdsdsd","default.png","1","2023-12-30","femme","","550000");
INSERT INTO workers VALUES("10","SAMSON","test","8","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","dsdsdsd","a remplir ","&agrave; remplir","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("11","ARNOLD","","8","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","dsdsdsd","a remplir ","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("12","RAPHAEL","dsdsdsd","1","dsdsdsdsdsdsdsdsd","Mananara, Analanjahana","dsdsdsd","a remplir ","&agrave; remplir","default.png","1","2023-12-30","homme","","400000");
INSERT INTO workers VALUES("13","SERGE","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","a remplir ","dsdsdsd","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("14","JEANBE","","8","163168498494651368","dsdsdsd","dsdsdsd","a remplir ","dsdsdsd","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("15","ROGER","","8","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","a remplir ","dsdsdsd","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("16","ALISON","","1","163168498494651368","dsdsdsd","sdsdsd","&agrave; remplir","dsdsdsd","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("17","MINIEL","","6","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("18","ARMAND","","2","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("19","ERIC","","1","dsdsdsdsdsdsdsdsd","Mananara, Analanjahana","Brickaville","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","550000");
INSERT INTO workers VALUES("20","NOLIN","","1","163168498494651368","Mananara, Analanjahana","Mananara","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","250000");
INSERT INTO workers VALUES("21","AIME","","2","163168498494651368","Mananara, Analanjahana","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("22","PATRICK","","4","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("23","ELVIS","","4","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("24","YOLLANDINE","","6","dsdsdsdsdsdsdsdsd","dsdsdsd","Mananara","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("25","CELESTIN","","1","dsdsdsdsdsdsdsdsd","Antanambao","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("26","ELIANNE","","4","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","500000");
INSERT INTO workers VALUES("27","JEAN KELY","","6","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("28","CLAUDIN"," ","3","163168498494651368","Mananara, Analanjahana","Mananara","&agrave; remplir","&agrave; remplir","default.png","1","2014-05-30","homme","","1100000");
INSERT INTO workers VALUES("29","BRIO","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("30","ANICET","","1","163168498494651368","Mananara, Analanjahana","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","450000");
INSERT INTO workers VALUES("31","RIVO","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","300000");
INSERT INTO workers VALUES("32","YANNICK"," ","5","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","Mananara","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","700000");
INSERT INTO workers VALUES("33","BEZANDRY","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","Brickaville","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","600000");
INSERT INTO workers VALUES("34","SAID","","8","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","dsfsdfsdfsdf","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("35","OTILDA","","9","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","200000");
INSERT INTO workers VALUES("36","ROLIANNE","","9","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","200000");
INSERT INTO workers VALUES("37","CLAUDIO","","2","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","250000");
INSERT INTO workers VALUES("38","MICHEL","","1","163168498494651368","Mananara, Analanjahana","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","300000");
INSERT INTO workers VALUES("39","FRANCOIS","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("40","JOSEPHE","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("41","BRUTHO","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","250000");
INSERT INTO workers VALUES("42","CHRISTIAN","","1","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("43","ALBERT","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("44","DACISE","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","200000");
INSERT INTO workers VALUES("45","I BE","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("46","LANDRY","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("48","ANDRIANINA","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","300000");
INSERT INTO workers VALUES("49","FLEURIE","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","200000");
INSERT INTO workers VALUES("50","SANDY","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","femme","","500000");
INSERT INTO workers VALUES("52","HOBY","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","homme","","300000");
INSERT INTO workers VALUES("53","NANCIA","","1","163168498494651368","Mananara, Analanjahana","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","femme","","200000");
INSERT INTO workers VALUES("54","HERY","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","homme","","500000");
INSERT INTO workers VALUES("55","CHRISTIN","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","homme","","500000");
INSERT INTO workers VALUES("56","SERA","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","homme","","250000");
INSERT INTO workers VALUES("57","CLOVIS","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("58","FRANCKLIN","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("59","MARCEL","","1","dsdsdsdsdsdsdsdsd","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-29","homme","","250000");
INSERT INTO workers VALUES("60","FREDERICK","test","10","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("61","GAETAN","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","3","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("62","LAWIS","dsdsd","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","3","2023-12-30","homme","","350000");
INSERT INTO workers VALUES("63","BRUNO","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","3","2023-12-30","homme","","300000");
INSERT INTO workers VALUES("64","SAROBIDY","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("65","TOLOTRA","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","3","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("66","NAIVOSON","","10","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","3","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("67","ZITA","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","2","2023-12-30","femme","","400000");
INSERT INTO workers VALUES("68","ZAKARIA","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","250000");
INSERT INTO workers VALUES("69","FAHAROA ZANDRY","","1","163168498494651368","Mananara, Analanjahana","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","300000");
INSERT INTO workers VALUES("70","LOVA","","1","163168498494651368","Mananara, Analanjahana","sdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","200000");
INSERT INTO workers VALUES("71","LONLON","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","50000");
INSERT INTO workers VALUES("72","LUDOVIC","test","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("73","GINOT","test","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","200000");
INSERT INTO workers VALUES("74","HYACINTE","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","260000");
INSERT INTO workers VALUES("75","DICKSON","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","homme","","300000");
INSERT INTO workers VALUES("76","OLGA","","1","163168498494651368","sdsdsdsdsdsdsdsdsd","dsdsdsd","&agrave; remplir","&agrave; remplir","default.png","1","2023-12-30","femme","","200000");



