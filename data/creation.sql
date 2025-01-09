CREATE TABLE UTILISATEUR (
    idUtilisateur VARCHAR(16),
    nomUtilisateur VARCHAR(42),
    motDePasse VARCHAR(42),
    PRIMARY KEY (idUtilisateur)
);

CREATE TABLE QUIZ (
    idQuiz INT(8),
    nomQuiz VARCHAR(42),
    PRIMARY KEY (idQuiz)
);

CREATE TABLE QUESTION (
    idQuestion INT(8),
    nom VARCHAR(42),
    texte VARCHAR(42),
    score INT(4),
    types VARCHAR(42),
    PRIMARY KEY (idQuestion)
);

CREATE TABLE REALISER (
    idUtilisateur VARCHAR(16),
    idQuiz INT(8),
    date DATE,
    score INT(4),
    PRIMARY KEY (idUtilisateur, idQuiz, date)
);

CREATE TABLE CONTENIR (
    idQuiz INT(8),
    idQuestion INT(8),
    PRIMARY KEY (idQuiz,idQuestion)
);

CREATE TABLE CORRIGER (
    idQuestion INT(8),
    reponse VARCHAR(16),
    PRIMARY KEY (idQuestion, reponse)
);

CREATE TABLE CHOIX (
    idQuestion INT(8),
    choix VARCHAR(16),
    PRIMARY KEY (idQuestion, reponse)
);
