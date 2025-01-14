insert into QUIZ(idQuiz, nomQuiz) values (1,"UwU Quiz"),
                                         (2,"Feur Quiz");

insert into QUESTION(nomQuestion, texte, score, types) values ("FURRY", "Qu'est ce qu'un UwU ?", 10,"Radio"),
                                                          ("Feur", "Quoi", 100,"ChekBox");

insert into CONTENIR(idQuiz, nomQuestion) values (1,"FURRY"),
                                                 (1,"Feur"),
                                                 (2,"Feur");

