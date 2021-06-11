create table utente(
id_utente integer auto_increment,
nome varchar(20) unique,
password varchar(255) unique,
primary key (id_utente)
);

create table azienda(
provenienza varchar(20),
nome varchar(20) primary key,
direttore varchar(20),
descrizione varchar(255),
url_logo varchar(255),
num_lavoratori integer default 0
);

create table modello(
codice varchar(20) primary key,
data_nascita date,
nome varchar(20),
sesso varchar(20),
nazionalita varchar(20),
azienda varchar(20),
ingaggio float default 0
);

create table manager(
codice varchar(20) primary key
);

create table contratto(
codice_modello varchar(20),
codice_manager varchar(20) primary key,
index idx_cod(codice_manager),
foreign key(codice_manager) references manager(codice)
);

create table azienda_terza(
negozio varchar(20),
IVA varchar(20) primary key
);

create table lotto_gen(
codice_lotto varchar(20) primary key,
prezzo float,
tipo varchar(20)
);

create table vendita(
nome varchar(20),
IVA varchar(20),
codice varchar(20),
index idx_nome(nome),
index idx_IVA(IVA),
index idx_codice(codice),
foreign key(codice) references lotto_gen(codice_lotto),
foreign key(nome) references azienda(nome),
foreign key(IVA) references azienda_terza(IVA),
primary key(nome, IVA, codice)
);

create table preferiti(
utente integer,
azienda varchar(20),
index idx_utente(utente),
index idx_azienda(azienda),
foreign key (utente) references utente(id_utente) on delete cascade,
foreign key (azienda) references azienda(nome),
primary key (utente, azienda)
);

create table evento(
nome varchar(100) primary key,
data date
);

create table prenotazioni(
utente integer,
evento varchar(255),
index index_utente(utente),
index index_evento(evento),
foreign key (utente) references utente(id_utente) on delete cascade,
foreign key (evento) references evento(nome),
primary key (utente, evento)
);





insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Italia', 'Puma', 'Claudio Musmeci','Azienda tedesca specializzata nello streetwear','./loghi/puma.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Francia', 'Superga', 'Manuel Locatelli','Azienda italiana specializzata in calzature','./loghi/superga.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Spagna', 'Umbro', 'Mario Rossi','Azienda produttrice di scarpe','./loghi/umbro.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Italia', 'Kappa', 'Mario Messina','Azienda italiana specializzata nel casual','./loghi/kappa.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Germania', 'Nike', 'Angela Merkel','Azienda tedesca specializzata nello streetwear','./loghi/nike.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Germania', 'Adidas', 'Thomas Muller','Azienda tedesca specializzata nello streetwear','./loghi/adidas.png') ;
insert into modello values ('A01234', '1999/10/05', 'Salvo Russo', 'Maschio', 'Italia', 'Adidas', 30000);
insert into modello values ('B06634', '1980/11/15', 'Francesco Monaco', 'Maschio', 'Italia','Adidas', 30000);
insert into modello values ('C11111', '2000/01/01', 'Claudio Musmeci', 'Maschio', 'Italia','Adidas', 30000);
insert into modello values ('Z22113', '1992/02/26', 'Sofia Raciti', 'Femmina', 'Italia','Puma', 50000);
insert into modello values ('K09809', '2000/06/25', 'Marc Paul', 'Maschio', 'Francia', 'Superga', 30000);
insert into modello values ('01234', '1979/10/05', 'Rita Pavone', 'Femmina', 'San Marino','Kappa', 50000);
insert into modello values ('F01914', '2001/09/03', 'France Jacques', 'Femmina', 'Francia','Umbro', 50000);
insert into modello values ('G99234', '1997/10/05', 'Belen Rodriguez', 'Femmina', 'Argentina',NULL, 50000);
insert into modello values ('P09624', '1992/11/05', 'Marlon Brando', 'Maschio', 'Spagna','Kappa', 30000);
insert into modello values ('L94798', '1979/05/11', 'Sonia Muller', 'Femmina', 'Germania','Puma', 50000);
insert into manager values ('M11');
insert into manager values ('M22');
insert into manager values ('M33');
insert into manager values ('M44');
insert into manager values ('M55');
insert into manager values ('M66');
insert into manager values ('M77');
insert into manager values ('M88');
insert into manager values ('M99');
insert into contratto values ('A01234','M11');
insert into contratto values ('F01914','M22');
insert into contratto values ('P09624','M33');
insert into contratto values (NULL,'M44');
insert into contratto values ('G99234','M55');
insert into contratto values ('L94798','M66');
insert into contratto values (NULL,'M77');
insert into azienda_terza values ('Negozio1','111111');
insert into azienda_terza values ('Negozio2','222222');
insert into azienda_terza values ('Negozio3','333333');
insert into azienda_terza values ('Negozio4','444444');
insert into azienda_terza values ('Negozio5','555555');
insert into azienda_terza values ('Negozio6','666666');
insert into azienda_terza values ('Negozio7','777777');
insert into lotto_gen values ('A1234',50000,'Scarpe');
insert into lotto_gen values ('B1234',76000,'Magliette');
insert into lotto_gen values ('C1234',30000.5,'Scarpe');
insert into lotto_gen values ('D1234',2000.8,'Pantaloni');
insert into lotto_gen values ('E1234',550000,'Pantaloni');
insert into lotto_gen values ('F1234',50000,'Scarpe');
insert into lotto_gen values ('G1234',2200,'Profumo');
insert into vendita values ('Adidas','222222','A1234');
insert into vendita values ('Adidas','111111','A1234');
insert into vendita values ('Nike','333333','B1234');
insert into vendita values ('Puma','444444','C1234');
insert into vendita values ('Umbro','555555','D1234');
insert into vendita values ('Umbro','111111','E1234');
insert into vendita values ('Kappa','444444','F1234');
insert into vendita values ('Kappa','666666','G1234');
insert into vendita values ('Puma','777777','E1234');
insert into vendita values ('Superga','777777','D1234');