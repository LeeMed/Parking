-- Ajout d'un Véhicule
INSERT into VEHICULE values ('AB 132 CD' ,'Renault' ,'2022-09-23 10:20:00' , 1000, 'Excellent état');


-- Ajout d'un stationnement
INSERT into STATIONNEMENT values (4000 , '2022-11-23 10:20:00' , null , 1 , 50 , 'AB 819 JJ');


-- Modification du tarif d'un parking
UPDATE PARKING set TARIF = 1 where ID_PARKING = 1;


-- Ajout d'une date de sortie d'un parking pour une voiture
UPDATE STATIONNEMENT set DATE_STATIONNEMENT_S='2022-11-30 10:20:00' where ID_STATIONNEMENT=3213;


-- Supression d'un véhicule
DELETE FROM VEHICULE WHERE NUMERO_IMMATRICULATION = 'AB 819 JJ';


