CREATE table CLIENT(
	NCLI char(4) not null Primary key,
	NOM char(40) not null,
	ADRESSE char(60),
	LOCALITE char(40) not null,
	CAT char(2),
	COMPTE numeric
) ENGINE=InnoDB;

CREATE table PRODUIT(
	NPRO char(5) not null Primary key,
	LIBELLE char(50) not null,
	PRIX numeric(15.2) not null,
	QSTOCK numeric 
) ENGINE=InnoDB;

CREATE table COMMANDE(
	NCOM numeric not null Primary key,
	DATCOM date not null,
	NCLI char(4) not null,
	foreign key (NCLI) references client(NCLI)
) ENGINE=InnoDB;

CREATE table DETAIL(
	QCOM numeric not null,
	NPRO char(5) not null,
	NCOM numeric not null,
	constraint FK_DETAILCOM foreign key (NCOM) references COMMANDE(NCOM) on delete cascade,
	constraint FK_DETAILPRO foreign key (NPRO) references PRODUIT(NPRO) on delete cascade,
	constraint PK_Detail primary key (NCOM, NPRO)
) ENGINE=InnoDB;