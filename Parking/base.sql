-- ============================================================
--   Nom de la base   :  Parking                                
--   Nom de SGBD      :  ORACLE Version 7.0                    
--   Date de creation :  04/11/22                       
-- ============================================================

drop table COMMUNE cascade constraints;

drop table PARKING cascade constraints;

drop table STATIONNEMENT cascade constraints;

drop table VEHICULE cascade constraints;

-- ============================================================
--   Table : VEHICULE                                            
-- ============================================================
create table VEHICULE
(
    NUMERO_IMMATRICULATION          VARCHAR(7)                not null,
    MARQUE                          VARCHAR(20)               not null,
    DMC                             DATE                      not null,
    KILOMETRAGE                     NUMBER(20)                not null,
    ETAT                            CHAR(20)                  not null,
    constraint pk_vehicule primary key (NUMERO_IMMATRICULATION)
);

-- ============================================================
--   Table : STATIONNEMENT                                       
-- ============================================================
create table STATIONNEMENT
(
    ID_STATIONNEMENT                NUMBER(3)              not null,
    DATE_STATIONNEMENT_E            DATETIME               not null,
    DATE_STATIONNEMENT_S            DATETIME                       ,
    NUMERO_DE_PLACE                 NUMBER(3)              not null,
    constraint pk_stationnement primary key (ID_STATIONNEMENT)
);

-- ============================================================
--   Table : PARKING                                              
-- ============================================================
create table PARKING
(
    ID_PARKING                     NUMBER(3)              not null,
    NOM_PARKING                    CHAR(30)               not null,
    CAPACITE                       NUMBER(3)              not null,
    ADRESSE_PARKING                CHAR(20)               not null,
    TARIF                          NUMBER(3)              not null,
    constraint pk_parking primary key (ID_PARKING)
);

-- ============================================================
--   Table : COMMUNE                                              
-- ============================================================
create table COMMUNE
(
    CODE_POSTALE                   NUMBER(5)              not null,
    NOM_DE_COMMUNE                 CHAR(30)               not null,
    constraint pk_commune primary key (CODE_POSTALE)
);

alter table PARKING
    add constraint fk1_parking foreign key (CODE_POSTALE)
       references COMMUNE (CODE_POSTALE);

alter table STATIONNEMENT
    add constraint fk1_stationnement foreign key (ID_PARKING)
       references PARKING (ID_PARKING);

alter table STATIONNEMENT
    add constraint fk2_stationnement foreign key (NUMERO_IMMATRICULATION)
       references VEHICULE (NUMERO_IMMATRICULATION);

