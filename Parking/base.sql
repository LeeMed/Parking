-- ============================================================
--   Nom de la base   :  Parking                                
--   Nom de SGBD      :  ORACLE Version 7.0                    
--   Date de creation :  04/11/22                       
-- ============================================================

drop table if exists COMMUNE cascade;

drop table if exists PARKING cascade;

drop table if exists STATIONNEMENT cascade;

drop table if exists VEHICULE cascade;

-- ============================================================
--   Table : VEHICULE                                            
-- ============================================================
create table VEHICULE
(
    NUMERO_IMMATRICULATION          VARCHAR(7)                not null,
    MARQUE                          VARCHAR(20)               not null,
    DMC                             DATE                      not null,
    KILOMETRAGE                     INT                       not null,
    ETAT                            CHAR(20)                  not null,
    constraint pk_vehicule primary key (NUMERO_IMMATRICULATION)
);

-- ============================================================
--   Table : STATIONNEMENT                                       
-- ============================================================
create table STATIONNEMENT
(
    ID_STATIONNEMENT                INT                    not null,
    DATE_STATIONNEMENT_E            DATETIME               not null,
    DATE_STATIONNEMENT_S            DATETIME                       ,
    ID_PARKING                     INT                     not null,
    NUMERO_DE_PLACE                 INT                    not null,
    NUMERO_IMMATRICULATION          VARCHAR(7)             not null,
    constraint pk_stationnement primary key (ID_STATIONNEMENT)
);

-- ============================================================
--   Table : PARKING                                              
-- ============================================================
create table PARKING
(
    ID_PARKING                     INT                    not null,
    NOM_PARKING                    CHAR(30)               not null,
    CAPACITE                       INT                    not null,
    ADRESSE_PARKING                CHAR(20)               not null,
    TARIF                          INT                    not null,
    CODE_POSTALE                   INT                    not null,
    constraint pk_parking primary key (ID_PARKING)
);

-- ============================================================
--   Table : COMMUNE                                              
-- ============================================================
create table COMMUNE
(
    CODE_POSTALE                   INT                    not null,
    NOM_DE_COMMUNE                 CHAR(30)               not null,
    constraint pk_commune primary key (CODE_POSTALE)
);

alter table PARKING
    add constraint fk1_parking foreign key (CODE_POSTALE)
       references COMMUNE(CODE_POSTALE);

alter table STATIONNEMENT
    add constraint fk1_stationnement foreign key (ID_PARKING)
       references PARKING(ID_PARKING);

alter table STATIONNEMENT
    add constraint fk2_stationnement foreign key (NUMERO_IMMATRICULATION)
       references VEHICULE(NUMERO_IMMATRICULATION);

