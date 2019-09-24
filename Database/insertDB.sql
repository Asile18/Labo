DELETE FROM `checking`;
INSERT INTO `checking` (`checkId`,`userId`,`checkIn`,`checkOut`,`hostelId`)
VALUES
(1,1,"20/11/19","25/11/19",1),
(2,2,"30/11/19","08/12/19",2),
(3,3,"01/12/19","02/12/19",3),
(4,4,"04/12/19","07/12/19",4),
(5,5,"05/12/19","15/12/19",5),
(6,6,"15/12/19","25/12/19",6),
(7,7,"16/12/19","20/12/19",7),
(8,8,"23/12/19","25/12/19",8),
(9,9,"01/01/20","10/01/20",9),
(10,10,"10/01/20","14/01/20",10);
        
DELETE FROM `faq`;
INSERT INTO `faq` (`faqId`, `question`, `answer`, `priority`) VALUES
(1, 'Puis-je ajouter des personnes supplémentaires à ma réservation initale?', 'Oui, il suffit d\'aller dans l\'historique de vos réservations et de cliquer sur \'ajouter des options\'.', 8),
(2, 'Comment resever ma chambre?', 'Visitez \'Accueil\' pour ensuite faire une recherche ciblée.', 9),
(3, 'Comment annuler une réservation?', 'Visitez votre historique de réservation et cliquez sur \'annulation\'.', 8);

DELETE FROM `forum`;
INSERT INTO `forum` (`forumId`,`forumName`) 
VALUES
(1, 'Annonces'),
(2, 'Best Western Forum'),
(3, 'Le Louise Hotel Forum'),
(4, 'Makarem Hotel Forum'),
(5, 'Wakanda Hotel Forum'),
(6, 'Rheola Forum');

DELETE FROM `hostel`;
INSERT INTO `hostel` 
(`hostelName`,`hostelStars`,`hostelId`,`add_postCode`,`add_number`,`add_streetName`,`add_country`,`coo_lat`,`coo_long`,`phone`,`email`,`pool`,`valet`,`roomService`,`touristTaxes`,`isDeleted`,`forumId`) 
VALUES 
('Best Western', 3,1, '90242', 9060, 'Imperial Hwy', 'États-Unis', '33.9167441', '-118.135607', '+1 562-861-9100', 'bestwestern@mosanto.com', 1, 1, 0, 1, 0, 2),
('Le Louise Hotel', 5,2, '1050', 40, 'Avenue de la Toison d Or ', 'Belgique', '50.836207', '4.357159', '02 514 22 00', 'lelouise@hostel.com', 0, 1, 1, 5, 0, 3),
('Makarem Hotel', 5,3, '24231', 150, 'Ajyad Street', 'Arabie saoudite', '21.417389', '39.828707', '+966 12 572 0500', 'makarem-makkah@hotel.com', 1, 1, 1, 7, 0, 4),
('Wakanda Hotel', 4,4, '12500', 22, 'rue Seydi Djamil', 'Sénégal', '14.688519', '-17.451762', '+221 33 823 78 18', 'wakola@hotmail.com', 0, 1, 1, 7, 0, 5),
('Rheola', 4,5, '6005', 18, 'Rheola St.', 'Australie', '-31.949710', '115.835102', '+61 8 9365 8999', 'rheola@kangoo.au', 1, 1, 1, 5, 0, 6);


DELETE FROM `message`;
INSERT INTO `message` 
(`messageContent`,`postDate`,`messageId`,`userId`,`subjectId`,`isActive`) 
VALUES 
("Lorem ipsum dolor","21/10/18",1,1,1,"1"),
("Lorem ipsum dolor sit amet, consectetuer","28/09/19",2,2,2,"1"),
("Lorem ipsum dolor sit amet, consectetuer adipiscing elit.","10/03/20",3,3,3,"1"),
("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed","17/03/19",4,4,4,"1"),
("Lorem","02/12/18",5,5,5,"1"),("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur","05/05/20",6,6,6,"1"),
("Lorem ipsum dolor sit amet,","21/08/19",7,7,7,"1"),("Lorem ipsum","21/06/20",8,8,8,"1"),
("Lorem ipsum dolor sit amet, consectetuer adipiscing elit.","08/10/18",9,9,9,"0"),
("Lorem ipsum dolor sit amet, consectetuer adipiscing elit.","06/01/20",10,10,10,"0");

DELETE FROM `picture`;
INSERT INTO `picture` (`pictureId`,`roomId`,`picturePath`) 
VALUES 
(1,1,"https://images.pexels.com/photos/1838554/pexels-photo-1838554.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(2,1,"https://images.pexels.com/photos/275845/pexels-photo-275845.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(3,2,"https://images.pexels.com/photos/2507010/pexels-photo-2507010.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(4,2,"https://images.pexels.com/photos/2467285/pexels-photo-2467285.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(5,2,"https://images.pexels.com/photos/262048/pexels-photo-262048.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(6,2,"https://images.pexels.com/photos/2736388/pexels-photo-2736388.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(7,3,"https://images.pexels.com/photos/271619/pexels-photo-271619.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(8,3,"https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(9,4,"https://images.pexels.com/photos/2029719/pexels-photo-2029719.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(10,5,"https://images.pexels.com/photos/210604/pexels-photo-210604.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(11,5,"https://images.pexels.com/photos/2507016/pexels-photo-2507016.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(12,6,"https://images.pexels.com/photos/2775320/pexels-photo-2775320.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(13,7,"https://images.pexels.com/photos/237393/pexels-photo-237393.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(14,7,"https://images.pexels.com/photos/2725675/pexels-photo-2725675.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(15,8,"https://images.pexels.com/photos/210604/pexels-photo-210604.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(16,8,"https://images.pexels.com/photos/2290753/pexels-photo-2290753.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(17,8,"https://images.pexels.com/photos/1457847/pexels-photo-1457847.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(18,9,"https://images.pexels.com/photos/2134224/pexels-photo-2134224.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(19,9,"https://images.pexels.com/photos/1028379/pexels-photo-1028379.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(20,9,"https://images.pexels.com/photos/280121/pexels-photo-280121.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(21,9,"https://images.pexels.com/photos/189293/pexels-photo-189293.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(22,10,"https://images.pexels.com/photos/545012/pexels-photo-545012.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(23,10,"https://images.pexels.com/photos/279652/pexels-photo-279652.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(24,10,"https://images.pexels.com/photos/1030834/pexels-photo-1030834.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"),
(25,10,"https://images.pexels.com/photos/221457/pexels-photo-221457.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

DELETE FROM `option`;
INSERT INTO `option`(`optionId`, `optionName`, `optionPrice`, `isPossible`) 
VALUES 
(1,"WIFI",10,1), 
(2,"breakfast",20,1),
(3,"petsAllowed",15,1),
(4,"airConditionner",15,1),
(5,"TV",15,1);

DELETE FROM `existanceoptionroomtype`;
INSERT INTO `existanceoptionroomtype`(`optionId`, `roomTypeId`) 
VALUES 
(1,1),
(1,2),
(1,3),
(2,3),
(3,3),
(3,2),
(4,1),
(4,2),
(4,3),
(5,3),
(5,2),
(5,1);

DELETE FROM `adds`;
INSERT INTO `adds`
(`optionId`, `reservationId`)
VALUES 
(1,1),
(1,10),
(2,9),
(3,5),
(4,8),
(1,7),
(1,9);

DELETE FROM `price`;
INSERT INTO `price`(`priceId`, `value`, `roomTypeId`, `seasonId`) 
VALUES 
(1,50,1,1), 
(2,100,1,2), 
(3,150,1,3), 
(4,100,2,1), 
(5,150,2,2), 
(6,200,2,3), 
(7,150,3,1), 
(8,200,3,2), 
(9,250,3,3);

DELETE FROM `reservation`;
INSERT INTO `reservation` 
(`reservationId`,`startDate`,`endDate`,`insurance`,`isCancelled`,`childrenQuantity`,`adultQuantity`,`totalPrice`,`roomId`,`userId`) 
VALUES 
(1,"06/10/18","19/10/12","1","1",1,2,248,9,4),
(2,"11/11/19","18/11/04","1","1",3,3,603,2,8),
(3,"28/10/04","12/02/06","1","1",4,2,166,8,3),
(4,"17/08/07","15/06/08","0","0",1,2,514,6,5),
(5,"01/12/05","29/09/11","0","0",0,2,643,4,10),
(6,"20/11/18","02/01/09","0","0",2,4,679,1,7),
(7,"31/07/19","25/09/18","1","1",1,1,257,2,7),
(8,"16/07/10","24/01/08","1","1",1,1,828,7,10),
(9,"10/06/14","18/03/05","1","1",1,3,697,6,4),
(10,"30/09/05","30/11/07","0","0",2,4,230,7,8);

DELETE FROM `review`;
INSERT INTO `review` (`reviewId`,`reviewStars`,`comment`,`isApproved`,`userId`,`roomId`)
VALUES (1,3,"Très belle chambre par contre moyen pour la tache de pisse sur le lit",1,1,1);

DELETE FROM `role`;
INSERT INTO `role` (`roleId`,`roleName`)
VALUES (1,"Client"),(2,"Admin"),(3,"Moderator");

DELETE FROM `room`;
INSERT INTO `room` (`roomId`,`roomName`,`shortDescription`,`longDescription`,`childrenCapacity`,`adultCapacity`,`bathroomQuantity`,`toiletQuantity`,`balcony`,`deleteDate`,`isDeleted`,`roomTypeId`,`hostelId`)
VALUES (1, 'Chambre Picasso', 'Chambre avec un seul lit', 'Chambre face à la mer super cool et chouette et belle vue et lorem', 2, 1, 1, 2, 0, NULL, 0, 1, 1),
(2, 'Libero Limited', 'felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis', 'arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris', 2, 2, 2, 1, 1, NULL, 0, 3, 1),
(3, 'In Magna Phasellus Ltd', 'turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in,', 'dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos', 0, 4, 1, 1, 0, NULL, 0, 1, 2),
(4, 'Praesent Eu Limited', 'non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit', 'Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse', 0, 1, 1, 2, 0, NULL, 0, 1, 2),
(5, 'Mi Enim Condimentum Incorporated', 'orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis', 'ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus', 6, 6, 1, 2, 1, NULL, 1, 3, 3),
(6, 'Non Feugiat Nec Industries', 'Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue.', 'augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem', 0, 4, 2, 2, 0, NULL, 1, 2, 3),
(7, 'Eleifend Nec Foundation', 'dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem', 'ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis', 1, 6, 3, 1, 0, NULL, 1, 1, 4),
(8, 'Phasellus Limited', 'faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu', 'ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis', 4, 6, 2, 1, 1, NULL, 1, 1, 4),
(9, 'Ante Dictum Mi Limited', 'Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis', 'mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi.', 6, 3, 2, 3, 1, NULL, 1, 2, 5),
(10, 'Etiam Gravida Molestie PC', 'a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor', 'nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum', 1, 1, 1, 2, 1, NULL, 1, 1, 5),
(11, 'Diam Limited', 'lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras', 'Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur', 5, 6, 3, 2, 1, NULL, 0, 1, 1),
(12, 'Etiam Vestibulum Massa LLP', 'magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo', 'gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed', 0, 2, 1, 3, 1, NULL, 0, 1, 1),
(13, 'Interdum Consulting', 'Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus', 'Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris', 2, 5, 3, 2, 1, NULL, 0, 2, 2),
(14, 'Curabitur Ltd', 'nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet', 'vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis', 3, 5, 1, 2, 0, NULL, 0, 1, 2),
(15, 'Lacinia Mattis Integer Ltd', 'In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius', 'nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.', 4, 3, 2, 2, 1, NULL, 0, 2, 3),
(16, 'Mattis Cras Incorporated', 'varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis,', 'eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit', 3, 3, 3, 2, 1, NULL, 1, 3, 3),
(17, 'Sapien Imperdiet Industries', 'a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis', 'risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing', 1, 4, 2, 2, 1, NULL, 0, 2, 4),
(18, 'Lobortis Ltd', 'consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla', 'non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec', 4, 2, 3, 1, 1, NULL, 0, 1, 5),
(19, 'Erat Neque Corp.', 'ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus', 'at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam', 2, 1, 2, 2, 0, NULL, 1, 2, 5),
(20, 'Est Mauris Rhoncus Institute', 'mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet,', 'eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris', 0, 2, 1, 1, 0, NULL, 1, 3, 1),
(21, 'In Lorem Foundation', 'magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem', 'turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus', 6, 6, 2, 3, 1, NULL, 0, 1, 2),
(22, 'Purus Nullam Scelerisque Company', 'morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem', 'Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum', 4, 1, 2, 1, 1, NULL, 0, 3, 3),
(23, 'Ipsum Porta Inc.', 'Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus.', 'tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem,', 4, 4, 2, 1, 0, NULL, 1, 2, 4),
(24, 'Ultrices Duis Volutpat Institute', 'non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus', 'Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed', 0, 1, 2, 1, 0, NULL, 1, 2, 5);

DELETE FROM `room_type`;
INSERT INTO `room_type` (`roomTypeId`,`roomTypeName`)
VALUES (1,"Single"),(2,"Double"),(3,"Master Suite");

DELETE FROM `season`;
INSERT INTO `season` (`seasonId`,`seasonName`,`startDate`,`endDate`)
VALUES (1,"Basse saison","01/10","31/01"), (2,"Moyenne saison","01/02","31/05"), (3,"Haute saison","01/06","31/09");

DELETE FROM `subject`;
INSERT INTO `subject` (`subjectId`,`subjectTitle`,`subjectContent`,`isActive`,`postDate`,`forumId`,`userId`) 
VALUES 
(1,"test 1", "content 1", "1", "11/12/16",1 ,1),
(2,"test 2", "content 2", "2", "11/12/16",2 ,2),
(3,"test 3", "content 3", "3", "11/12/16",3 ,3),
(4,"test 4", "content 4", "4", "11/12/16",4 ,4),
(5,"test 5", "content 5", "5", "11/12/16",5 ,5),
(6,"test 6", "content 6", "6", "11/12/16",6 ,6),
(7,"test 7", "content 7", "7", "11/12/16",7 ,7),
(8,"test 8", "content 8", "8", "11/12/16",8 ,8),
(9,"test 9", "content 9", "9", "11/12/16",9 ,9),
(10,"test 10", "content 10", "10", "11/12/16",10 ,10);

DELETE FROM `user`;
INSERT INTO `user` (`userId`,`firstName`,`lastName`,`email`,`country`,`phone`,`password`,`roleId`)
VALUES 
(1,"Lance","Aiko","a.odio.semper@netusetmalesuada.org","Maldives","0496512341","testpassword",1), 
 (2,"Elias","Le Champion","elias@netusetmalesuada.org","Belgique","04965000141","testpassword",1), 
  (3,"Kloe","La freeky Control","kloe@gmail.org","Belgique","0478000141","testpassword",1), 
 (5,"Sterio","La moustatche","strio@gmail.com","Belgique","0478000141","testpassword",2), 
 (6,"Brigitte","La mauvaise","brigitte@gmail.com","Belgique","0478000141","testpassword",2),
 (7,"Ahmed","Candidat","ahmed@gmail.com","Belgique","0478000141","testpassword",2),
  (8,"Stephan","Champagne","stef@gmail.com","Belgique","0478000141","testpassword",1),
  (9,"Omar","Toutsourir","omar@gmail.com","Belgique","0478000141","testpassword",1),
(10,"Christophe","lefevre","chris@gmail.com","Belgique","0478000141","testpassword",1);