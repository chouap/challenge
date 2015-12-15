insert into cms.`autor` (`id`, `firstname`, `lastname`) values (1, 'Mark', 'Twain');
insert into cms.`autor` (`id`, `firstname`, `lastname`) values (2, 'Gustave', 'Le Bon');
insert into cms.`autor` (`id`, `firstname`, `lastname`) values (3, 'Robin', 'Hobb');
insert into cms.`autor` (`id`, `firstname`, `lastname`) values (4, 'David', 'Gemmell');

insert into cms.`article` (`title`, `content`, `publication_date`, `autor_id`)
	values ('Citation', 'Ils ne savaient pas que c\'était impossible, alors ils l\'ont fait', NOW(), 1);

insert into cms.`article` (`title`, `content`, `publication_date`, `autor_id`)
	values ('Citation', 'Ils sont incapable de pencher pour un partie sans mépriser l\'opposant', NOW(), 2);
	
insert into cms.`article` (`title`, `content`, `publication_date`, `autor_id`)
	values ('Citation', 'Accepter ses expériences, les mettes à profit au lieu d\'en rester prisonnier', NOW(), 3);
	
insert into cms.`article` (`title`, `content`, `publication_date`, `autor_id`)
	values ('Citation', 'L\'arbre de la connaissance porte les fruits de l\'arrogance', NOW(), 4);
	
