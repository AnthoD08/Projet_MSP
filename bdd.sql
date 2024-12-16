CREATE TABLE Roles(
   id INT,
   role VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE genres(
   id INT,
   genre VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE langues(
   id INT,
   langue VARCHAR(255) NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(langue)
);

CREATE TABLE batiments(
   id INT,
   batiment VARCHAR(50) NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(batiment)
);

CREATE TABLE etages(
   id INT,
   etage VARCHAR(255) NOT NULL,
   id_batiment INT NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE adherents(
   id INT,
   adherent VARCHAR(255) NOT NULL,
   id_adherent INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(id_adherent)
);

CREATE TABLE Utilisateurs(
   id INT,
   identifiant VARCHAR(255) NOT NULL,
   mot_de_passe VARCHAR(255) NOT NULL,
   id_role INT,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(identifiant),
   FOREIGN KEY(id_1) REFERENCES Roles(id)
);

CREATE TABLE Livres(
   id INT,
   titre VARCHAR(255) NOT NULL,
   ISBN BIGINT NOT NULL,
   auteurs VARCHAR(255) NOT NULL,
   editeur VARCHAR(255) NOT NULL,
   publication INT NOT NULL,
   resume TEXT,
   id_1 INT NOT NULL,
   id_2 INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(ISBN),
   FOREIGN KEY(id_1) REFERENCES genres(id),
   FOREIGN KEY(id_2) REFERENCES langues(id)
);

CREATE TABLE emprunts(
   id INT,
   ISBN BIGINT NOT NULL,
   id_commentaire INT,
   date_emprunt DATE NOT NULL,
   date_retour DATE,
   id_adherent BIGINT NOT NULL,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(ISBN),
   UNIQUE(id_commentaire),
   FOREIGN KEY(id_1) REFERENCES adherents(id)
);

CREATE TABLE commentaires(
   id INT,
   commentaire TEXT,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES emprunts(id)
);

CREATE TABLE emprunt_livres(
   id INT,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Livres(id),
   FOREIGN KEY(id_1) REFERENCES emprunts(id)
);

CREATE TABLE etages_batiments(
   id INT,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES batiments(id),
   FOREIGN KEY(id_1) REFERENCES etages(id)
);

CREATE TABLE genres_etages(
   id INT,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES genres(id),
   FOREIGN KEY(id_1) REFERENCES etages(id)
);

CREATE TABLE utilisateurs_batiments(
   id INT,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Utilisateurs(id),
   FOREIGN KEY(id_1) REFERENCES batiments(id)
);
