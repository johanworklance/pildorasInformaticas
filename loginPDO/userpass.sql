

DROP TABLE IF EXISTS `userspass`;

CREATE TABLE `userspass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO userspass VALUES('','Johan','1234');

INSERT INTO userspass VALUES('','Alexis','123');