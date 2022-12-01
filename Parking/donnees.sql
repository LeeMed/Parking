-- ============================================================
--    suppression des donnees
-- ============================================================

delete from COMMUNE ;
delete from PARKING ;
delete from STATIONNEMENT ;
delete from VEHICULE ;

commit ;

-- ============================================================
--    creation des donnees
-- ============================================================

-- VEHICULE


insert into VEHICULE values ('LI 743 RP' ,'Fiat' ,'2019-5-25' ,60177, 'Très bon état');
insert into VEHICULE values ('LP 108 OC' ,'Lexus' ,'2017-11-6' ,90924, 'Très bon état');
insert into VEHICULE values ('FK 341 VP' ,'Dodge' ,'2015-11-21' ,120174, ' Bon état');
insert into VEHICULE values ('KD 186 IR' ,'Jeep' ,'2022-7-7' ,15845, 'Excellent état');
insert into VEHICULE values ('BV 346 MS' ,'Dodge' ,'2022-10-17' ,15293, 'Excellent état');
insert into VEHICULE values ('EZ 490 LU' ,'Kawasaki' ,'2018-11-18' ,75124, 'Très bon état');
insert into VEHICULE values ('VX 254 ZH' ,'Aston Martin' ,'2022-4-29' ,15231, 'Excellent état');
insert into VEHICULE values ('XG 100 MD' ,'Benelli' ,'2022-12-31' ,15569, 'Excellent état');
insert into VEHICULE values ('CQ 646 CV' ,'Lexus' ,'2012-5-26' ,165618, 'État correct');
insert into VEHICULE values ('CR 436 WU' ,'Kawasaki' ,'2010-11-9' ,195526, 'État correct');
insert into VEHICULE values ('QO 623 LW' ,'Kawasaki' ,'2016-7-17' ,105667, ' Bon état');
insert into VEHICULE values ('LU 611 LO' ,'DS ' ,'2020-10-14' ,45987, 'Excellent état');
insert into VEHICULE values ('CR 593 WE' ,'Bugatti' ,'2021-2-7' ,30397, 'Excellent état');
insert into VEHICULE values ('XY 980 KE' ,'Volkswagen' ,'2020-6-17' ,45746, 'Excellent état');
insert into VEHICULE values ('ZQ 108 NU' ,'Subaru' ,'2020-3-31' ,45025, 'Excellent état');
insert into VEHICULE values ('SS 183 QN' ,'SEAT' ,'2017-2-25' ,90015, 'Très bon état');
insert into VEHICULE values ('NF 510 HN' ,'Porsche' ,'2015-10-4' ,120795, ' Bon état');
insert into VEHICULE values ('CP 917 DR' ,'Mercedes-Benz' ,'2016-12-25' ,105780, ' Bon état');
insert into VEHICULE values ('UA 650 JI' ,'Fiat' ,'2020-7-6' ,45244, 'Excellent état');
insert into VEHICULE values ('CJ 950 RE' ,'Ferrari' ,'2018-10-22' ,75712, 'Très bon état');
insert into VEHICULE values ('GF 112 NI' ,'Volkswagen' ,'2013-1-18' ,150132, 'État correct');
insert into VEHICULE values ('FT 974 VL' ,'Daihatsu' ,'2019-7-17' ,60936, 'Très bon état');
insert into VEHICULE values ('AH 099 UO' ,'Norton Motorcycle' ,'2019-12-4' ,60625, 'Très bon état');
insert into VEHICULE values ('XR 258 MU' ,'Rolls-Royce' ,'2019-7-28' ,60027, 'Très bon état');
insert into VEHICULE values ('VJ 819 JG' ,'SEAT' ,'2022-5-10' ,15356, 'Excellent état');
insert into VEHICULE values ('JD 584 OE' ,'Mercedes-Benz' ,'2019-8-25' ,60006, 'Très bon état');
insert into VEHICULE values ('LI 089 ER' ,'Ferrari' ,'2012-9-5' ,165026, 'État correct');
insert into VEHICULE values ('JO 016 HW' ,'Daihatsu' ,'2010-3-23' ,195169, 'État correct');
insert into VEHICULE values ('TK 372 BH' ,'Ferrari' ,'2021-5-21' ,30556, 'Excellent état');
insert into VEHICULE values ('ZS 102 VN' ,'Dacia' ,'2021-6-20' ,30709, 'Excellent état');
insert into VEHICULE values ('YD 263 WY' ,'Toyota' ,'2022-2-18' ,15716, 'Excellent état');
insert into VEHICULE values ('ML 582 IO' ,'Norton Motorcycle' ,'2018-1-4' ,75021, 'Très bon état');
insert into VEHICULE values ('CC 173 CC' ,'Aston Martin' ,'2016-9-14' ,105322, ' Bon état');
insert into VEHICULE values ('WG 044 NL' ,'Ducati' ,'2011-9-19' ,180335, 'État correct');
insert into VEHICULE values ('CH 334 FB' ,'Subaru' ,'2013-4-23' ,150606, 'État correct');
insert into VEHICULE values ('HW 116 RO' ,'Dacia' ,'2020-2-19' ,45259, 'Excellent état');
insert into VEHICULE values ('GQ 258 DL' ,'Mini ' ,'2013-4-9' ,150719, 'État correct');
insert into VEHICULE values ('FX 894 TQ' ,'Chrysler' ,'2015-9-25' ,120541, ' Bon état');
insert into VEHICULE values ('LP 775 CN' ,'Porsche' ,'2015-10-1' ,120631, ' Bon état');
insert into VEHICULE values ('BW 156 WE' ,'Tesla' ,'2015-10-3' ,120831, ' Bon état');
insert into VEHICULE values ('QB 606 KP' ,'Lexus' ,'2012-12-4' ,165745, 'État correct');
insert into VEHICULE values ('XI 067 QV' ,'Norton Motorcycle' ,'2010-8-2' ,195945, 'État correct');
insert into VEHICULE values ('ND 172 JB' ,'Ferrari' ,'2017-10-10' ,90958, 'Très bon état');
insert into VEHICULE values ('TO 463 OJ' ,'Bugatti' ,'2012-9-7' ,165463, 'État correct');
insert into VEHICULE values ('SC 037 CU' ,'Maserati' ,'2013-9-11' ,150680, 'État correct');
insert into VEHICULE values ('NG 414 ZW' ,'Audi' ,'2020-1-30' ,45967, 'Excellent état');
insert into VEHICULE values ('RS 135 RU' ,'Peugeot' ,'2011-3-20' ,180046, 'État correct');
insert into VEHICULE values ('WH 581 DN' ,'Aston Martin' ,'2022-1-28' ,15007, 'Excellent état');
insert into VEHICULE values ('DT 939 OS' ,'Jeep' ,'2012-1-11' ,165886, 'État correct');
insert into VEHICULE values ('QE 839 TF' ,'Benelli' ,'2019-10-7' ,60247, 'Très bon état');
insert into VEHICULE values ('IW 962 WN' ,'Daihatsu' ,'2017-8-30' ,90850, 'Très bon état');
insert into VEHICULE values ('BI 686 YA' ,'Bugatti' ,'2015-11-24' ,120624, ' Bon état');
insert into VEHICULE values ('TO 448 AJ' ,'Honda' ,'2022-8-4' ,15529, 'Excellent état');
insert into VEHICULE values ('BL 056 ZW' ,'Harley Davidson' ,'2013-8-18' ,150118, 'État correct');
insert into VEHICULE values ('YF 265 RX' ,'Jeep' ,'2011-6-27' ,180817, 'État correct');
insert into VEHICULE values ('PJ 466 XO' ,'Lexus' ,'2016-5-26' ,105966, ' Bon état');
insert into VEHICULE values ('JA 377 YN' ,'Cadillac' ,'2022-1-22' ,15250, 'Excellent état');
insert into VEHICULE values ('EM 390 PL' ,'Mercedes-Benz' ,'2022-12-23' ,15237, 'Excellent état');
insert into VEHICULE values ('JJ 467 YS' ,'Dacia' ,'2020-11-21' ,45430, 'Excellent état');
insert into VEHICULE values ('XB 630 DR' ,'Daihatsu' ,'2022-9-30' ,15078, 'Excellent état');
insert into VEHICULE values ('KH 769 IX' ,'Jaguar' ,'2021-11-4' ,30984, 'Excellent état');
insert into VEHICULE values ('RB 581 KU' ,'Hyundai' ,'2022-7-26' ,15965, 'Excellent état');
insert into VEHICULE values ('DH 669 HR' ,'Lexus' ,'2018-9-19' ,75862, 'Très bon état');
insert into VEHICULE values ('ID 883 GU' ,'Tesla' ,'2012-6-28' ,165682, 'État correct');
insert into VEHICULE values ('AO 551 YE' ,'Volvo' ,'2021-7-1' ,30646, 'Excellent état');
insert into VEHICULE values ('UW 212 KV' ,'BMW' ,'2012-4-8' ,165236, 'État correct');
insert into VEHICULE values ('TO 601 AS' ,'Ducati' ,'2022-3-19' ,15954, 'Excellent état');
insert into VEHICULE values ('NB 283 GB' ,'Ford' ,'2022-7-13' ,15868, 'Excellent état');
insert into VEHICULE values ('RN 773 WL' ,'Bugatti' ,'2021-5-8' ,30822, 'Excellent état');
insert into VEHICULE values ('RE 145 CO' ,'Peugeot' ,'2013-6-5' ,150726, 'État correct');
insert into VEHICULE values ('XK 052 CA' ,'Zero Motorcycle' ,'2017-9-3' ,90888, 'Très bon état');
insert into VEHICULE values ('DO 638 OE' ,'Ducati' ,'2020-12-2' ,45841, 'Excellent état');
insert into VEHICULE values ('GI 473 MT' ,'Citroën' ,'2019-8-14' ,60420, 'Très bon état');
insert into VEHICULE values ('ED 978 XX' ,'Ferrari' ,'2017-2-28' ,90040, 'Très bon état');
insert into VEHICULE values ('YD 260 QA' ,'Mini ' ,'2021-9-5' ,30194, 'Excellent état');
insert into VEHICULE values ('WH 567 VU' ,'Ford' ,'2016-3-30' ,105666, ' Bon état');
insert into VEHICULE values ('YZ 460 MN' ,'Kia ' ,'2020-3-11' ,45354, 'Excellent état');
insert into VEHICULE values ('OE 013 SL' ,'Nissan' ,'2010-4-13' ,195772, 'État correct');
insert into VEHICULE values ('WN 295 CK' ,'Dacia' ,'2010-2-2' ,195405, 'État correct');
insert into VEHICULE values ('RV 549 BE' ,'Volvo' ,'2020-5-20' ,45288, 'Excellent état');
insert into VEHICULE values ('OJ 609 DN' ,'Renault' ,'2013-3-16' ,150182, 'État correct');
insert into VEHICULE values ('HW 267 HB' ,'Ducati' ,'2011-4-17' ,180233, 'État correct');
insert into VEHICULE values ('WO 528 IR' ,'Ferrari' ,'2012-4-14' ,165494, 'État correct');
insert into VEHICULE values ('IP 428 IV' ,'Volkswagen' ,'2022-11-25' ,15901, 'Excellent état');
insert into VEHICULE values ('WC 082 QN' ,'Suzuki' ,'2022-1-11' ,15832, 'Excellent état');
insert into VEHICULE values ('EO 591 OQ' ,'Dodge' ,'2016-5-31' ,105441, ' Bon état');
insert into VEHICULE values ('CO 349 JH' ,'Fiat' ,'2016-11-23' ,105072, ' Bon état');
insert into VEHICULE values ('YU 353 MI' ,'Ferrari' ,'2022-3-1' ,15529, 'Excellent état');
insert into VEHICULE values ('GO 964 NP' ,'Bugatti' ,'2020-3-4' ,45628, 'Excellent état');
insert into VEHICULE values ('WF 481 GR' ,'Citroën' ,'2015-11-29' ,120618, ' Bon état');
insert into VEHICULE values ('MC 004 AY' ,'Audi' ,'2022-9-15' ,15490, 'Excellent état');
insert into VEHICULE values ('XV 456 JQ' ,'Volvo' ,'2011-7-3' ,180016, 'État correct');
insert into VEHICULE values ('WI 882 MC' ,'Honda' ,'2014-7-21' ,135783, ' Bon état');
insert into VEHICULE values ('HE 386 BV' ,'Toyota' ,'2014-4-19' ,135330, ' Bon état');
insert into VEHICULE values ('TS 162 VD' ,'Bugatti' ,'2010-1-16' ,195170, 'État correct');
insert into VEHICULE values ('IG 746 ZB' ,'Nissan' ,'2017-6-1' ,90864, 'Très bon état');
insert into VEHICULE values ('NB 679 QE' ,'Fiat' ,'2013-12-13' ,150906, 'État correct');
insert into VEHICULE values ('VE 315 ER' ,'Jeep' ,'2013-10-11' ,150867, 'État correct');
insert into VEHICULE values ('PJ 860 QE' ,'Ducati' ,'2013-2-13' ,150448, 'État correct');
insert into VEHICULE values ('JB 883 KM' ,'Hyundai' ,'2010-9-22' ,195161, 'État correct');


commit ;


-- COMMUNE


insert into COMMUNE values (75056,'Paris');
insert into COMMUNE values (13055,'Marseille');
insert into COMMUNE values (69123,'Lyon');
insert into COMMUNE values (31555,'Toulouse');
insert into COMMUNE values (44109,'Nantes');
insert into COMMUNE values (34172,'Montpellier');
insert into COMMUNE values (67482,'Strasbourg');
insert into COMMUNE values (33063,'Bordeaux');
insert into COMMUNE values (59350,'Lille');
insert into COMMUNE values (38185,'Grenoble');
insert into COMMUNE values (37261,'Tours');
insert into COMMUNE values (45234,'Orléans');
insert into COMMUNE values (54395,'Nancy');
insert into COMMUNE values (86194,'Poitiers');
insert into COMMUNE values (17300,'La Rochelle');
insert into COMMUNE values (33281,'Mérignac');
insert into COMMUNE values (33318,'Pessac');


commit ;


-- Parking


insert into PARKING values (1 ,'Parking Louvre Pyramides' ,100 ,'15 rue des Pyramides' ,6.0 ,75056 );
insert into PARKING values (2 ,'Parking Les Halles- Saint Eustache' ,100 ,'22 Rue des Halles' ,7.5 ,75056 );
insert into PARKING values (3 ,'Parking Rivoli-Sébastopol' ,150 ,'5 rue Pernelle' ,5.0 ,75056 );
insert into PARKING values (4 ,'Parking Hôtel de Ville' ,250 ,'6 Quai de Gesvres' ,3.0 ,75056 );
insert into PARKING values (5 ,'Parking Gay Lussac' ,250 ,'Face au 45 rue Gay Lussac' ,3.5 ,75056 );
insert into PARKING values (6 ,'Parking Lagrange-Maubert Notre-Dame' ,250 ,'15 rue Lagrange' ,8.0 ,75056 );
insert into PARKING values (7 ,'Parking Polytechnique' ,250 ,'Impasse J H Lartigue' ,8.5 ,75056 );
insert into PARKING values (8 ,'Parking Pey Berland' ,200 ,'Place pey berland' ,6.0 ,33063 );
insert into PARKING values (9 ,'Parking Gambetta' ,300 ,'Rue Edmond Michelet' ,8.0 ,33063 );
insert into PARKING values (10 ,'Parking Alsace-Lorraine' ,300 ,'21 cours Alsace-Lorraine' ,9.5 ,33063 );
insert into PARKING values (11 ,'Parking Cité Mondiale' ,150 ,'20 Quai des Chartrons' ,5.5 ,33063 );
insert into PARKING values (12 ,'Parking Sainte Catherine' ,300 ,'15 rue Honoré Tessier' ,3.0 ,33063 );
insert into PARKING values (13 ,'Parking Victoire' ,150 ,'Place de la Victoire' ,5.0 ,33063 );
insert into PARKING values (14 ,'Parking Les Capucins' ,300 ,'Rue Emile Laparra' ,4.0 ,33063 );
insert into PARKING values (15 ,'Parking Monge' ,300 ,'17 rue Gracieuse' ,7.5 ,33281 );
insert into PARKING values (16 ,'Parking Poliveau' ,200 ,'39 bis rue Poliveau' ,7.5 ,33281 );
insert into PARKING values (17 ,'Parking Marché Saint Germain' ,200 ,'Face au 1  Rue Lobineau' ,2.0 ,33281 );
insert into PARKING values (18 ,'Parking Bac Montalembert' ,300 ,'9 rue Montalembert' ,9.0 ,33281 );
insert into PARKING values (19 ,'Parking Gouraud ' ,200 ,'5 ave Emile Pouvillon' ,4.5 ,33281 );
insert into PARKING values (20 ,'Parking Champagny' ,300 ,'Face au 13 rue Casimir Perrier' ,9.0 ,33281 );
insert into PARKING values (21 ,'Parking Madeleine-Tronchet ' ,300 ,'Face au 21 place de la Madeleine' ,4.5 ,31555 );
insert into PARKING values (22 ,'Parking Haussmann Berri ' ,150 ,'Face au 155 Bvd Hausmann' ,5.0 ,31555 );
insert into PARKING values (23 ,'Parking St Augustin ' ,150 ,'18 rue de Laborde' ,6.0 ,31555 );
insert into PARKING values (24 ,'Parking Anvers ' ,200 ,'41 bvd Rochechouard' ,9.5 ,31555 );
insert into PARKING values (25 ,'Parking Meyerbeer-Opéra ' ,300 ,'3 rue de la Chaussée d Antin' ,6.0 ,31555 );
insert into PARKING values (26 ,'Parking Mayran ' ,150 ,'5 rue Mayran' ,5.5 ,44109 );
insert into PARKING values (27 ,'Parking Milton' ,100 ,'35 rue Milton' ,3.5 ,44109 );
insert into PARKING values (28 ,'Parking Colonel Fabien' ,300 ,'3 rue Louis Blanc' ,6.5 ,44109 );
insert into PARKING values (29 ,'Parking Récollets' ,250 ,'3 passage des Récollets' ,5.5 ,44109 );
insert into PARKING values (30 ,'Parking René Boulanger' ,300 ,'1 ter rue René Boulanger' ,7.5 ,44109 );
insert into PARKING values (31 ,'Parking Hôpital Saint Louis' ,150 ,'1 avenue Claude Vellefaux' ,7.0 ,34172 );
insert into PARKING values (32 ,'Parking Roquette' ,150 ,'Face au 19 rue Servan' ,2.0 ,34172 );
insert into PARKING values (33 ,'Parking Hector Malot' ,300 ,'Angle avenue Daumesnil et rue Hector Malot' ,2.5 ,34172 );
insert into PARKING values (34 ,'Parking Reuilly Diderot' ,250 ,'34 rue de Reuilly' ,3.5 ,34172 );
insert into PARKING values (35 ,'Parking Charléty Coubertin' ,300 ,'17 avenue Pierre de Coubertin' ,5.0 ,67482 );
insert into PARKING values (36 ,'Parking Charléty Thomire' ,200 ,'Rue Thomire' ,2.0 ,67482 );
insert into PARKING values (37 ,'Parking Hôpital Sainte-Anne' ,150 ,'100 rue de la Santé' ,3.5 ,67482 );
insert into PARKING values (38 ,'Parking Didot' ,150 ,'Place Moro Giafferi 2 rue Didot' ,9.5 ,67482 );
insert into PARKING values (39 ,'Parking Général Beuret' ,150 ,'31 rue du Général Beuret' ,7.5 ,59350 );
insert into PARKING values (40 ,'Parking Porte d Auteuil ' ,250 ,'8 avenue du Général Sarail' ,8.0 ,59350 );
insert into PARKING values (41 ,'Parking Jean Bouin' ,300 ,'17 rue Nungesser et Coli' ,7.5 ,59350 );
insert into PARKING values (42 ,'Parking Delessert' ,100 ,'13 rue Beethoven' ,7.0 ,59350 );
insert into PARKING values (43 ,'Parking Flandrin' ,150 ,'2 boulevard Flandrin' ,7.0 ,38185 );
insert into PARKING values (44 ,'Parking Emile Augier' ,250 ,'50 boulevard Emile Augier' ,9.5 ,38185 );
insert into PARKING values (45 ,'Parking Gros Boulainvilliers' ,200 ,'15 rue de Boulainvilliers' ,2.5 ,38185 );
insert into PARKING values (46 ,'Parking Mozart' ,200 ,'56-67 avenue Mozart' ,6.0 ,38185 );
insert into PARKING values (47 ,'Parking Carnot ' ,200 ,'20 bis avenue Carnot' ,6.5 ,86194 );
insert into PARKING values (48 ,'Parking Prony ' ,300 ,'37 rue Prony' ,9.5 ,86194 );
insert into PARKING values (49 ,'Parking Sainte Périne' ,250 ,'Angle rue Chardon-Lagache et rue Mirabeau' ,7.5 ,86194 );
insert into PARKING values (50 ,'Parking Péreire' ,250 ,'209 Boulevard Pereire' ,2.0 ,86194 );
insert into PARKING values (51 ,'Parking Carpeaux' ,150 ,' 7 rue Carpeaux' ,5.0 ,86194 );
insert into PARKING values (52 ,'Parking Marcadet' ,200 ,'142 rue Marcadet' ,5.0 ,54395 );
insert into PARKING values (53 ,'Parking Claude Bernard' ,150 ,'12 rue Chana Orloff' ,10.0 ,54395 );
insert into PARKING values (54 ,'Parking Hôpital Robert Debré' ,100 ,'48 boulevard Sérurier' ,9.0 ,54395 );
insert into PARKING values (55 ,'Parking Printemps Nation ' ,300 ,'22 rue de Lagny' ,7.0 ,17300 );
insert into PARKING values (56 ,'Parking Val d Europe - Serris Montévrain' ,200 ,'77 rue de la Charbonnière' ,7.5 ,17300 );
insert into PARKING values (57 ,'Parking Vaires Torcy' ,250 ,'17 avenue des Mésanges' ,5.0 ,17300 );
insert into PARKING values (58 ,'Parking Vaires Centre Ville' ,100 ,'Rue de la Gare' ,4.5 ,45234 );
insert into PARKING values (59 ,'Parking de la Gare de Chatou' ,250 ,'Place Maurice Bertaux' ,5.0 ,45234 );
insert into PARKING values (60 ,'Parking Place Berteaux' ,100 ,'Place Maurice Bertaux' ,7.5 ,45234 );
insert into PARKING values (61 ,'Parking Centre-Ville' ,300 ,'Face au 13 rue Albert Guilpin' ,3.5 ,37261 );
insert into PARKING values (62 ,'Parking Hôpital Henri Mondor' ,300 ,'1 rue Gustave Eiffel' ,4.0 ,37261 );
insert into PARKING values (63 ,'Parking Joinville ' ,100 ,'23 rue de Paris' ,4.5 ,37261 );
insert into PARKING values (64 ,'Parking Gare Saint Charles' ,300 ,'1 avenue Pierre Semard' ,8.0 ,13055 );
insert into PARKING values (65 ,'Parking Sainte Barbe' ,250 ,'16 rue Sainte Barbe' ,9.0 ,13055 );
insert into PARKING values (66 ,'Parking Gare Saint-Charles' ,250 ,'15 Boulevard Maurice Bourdet ' ,8.0 ,13055 );
insert into PARKING values (67 ,'Parking Grand Garage Méditerranéen' ,300 ,'44 place aux Huiles' ,5.5 ,13055 );
insert into PARKING values (68 ,'Parking Saint Charles Services' ,200 ,'36 boulevard Charles Nédelec' ,2.0 ,13055 );
insert into PARKING values (69 ,'Parking Cours Julien' ,300 ,'Cours Julien' ,9.5 ,13055 );
insert into PARKING values (70 ,'Parking Estienne d Orves' ,200 ,'Place aux Huiles' ,2.5 ,13055 );
insert into PARKING values (71 ,'Parking Immeuble CARDINAL CAMPUS' ,200 ,'25 rue Pauline Kergomard' ,8.0 ,69123 );
insert into PARKING values (72 ,'Parking La Guillotière- Bonnefoi' ,200 ,'4-6 rue Bonnefoi' ,4.0 ,69123 );
insert into PARKING values (73 ,'Parking Immeuble FAC-HABITAT LA GUILLOTIÈRE' ,150 ,'14 rue du Docteur Crestin' ,4.5 ,69123 );
insert into PARKING values (74 ,'Parking Immeuble CARDINAL CAMPUS BUTTERFLY ' ,100 ,'40 Route de Vienne' ,9.0 ,69123 );
insert into PARKING values (75 ,'Parking Gare Jean Macé' ,300 ,'24 rue Gerland' ,8.5 ,69123 );
insert into PARKING values (76 ,'Parking Bellecour - Campanile' ,300 ,'4-6 Rue Mortier' ,5.5 ,69123 );
insert into PARKING values (77 ,'Parking Carreire' ,150 ,'4 rue du Docteur Rocaz' ,5.0 ,33318 );
insert into PARKING values (78 ,'Parking Hôtel PREMIERE CLASSE PESSAC' ,100 ,'4 Bis Avenue Antoine-Becquerel' ,3.5 ,33318 );
insert into PARKING values (79 ,'Parking Côte D Argent' ,100 ,'23 Chemin Pomerol' ,5.0 ,33318 );
insert into PARKING values (80 ,'Parking Castellane' ,200 ,'33 Chemin Pomerol' ,2.0 ,33318 );
insert into PARKING values (81 ,'Parking Schoelcher' ,250 ,'20 rue Pierre Curie' ,3.0 ,33318 );


commit ;


-- STATIONNEMENT

insert into STATIONNEMENT values ( 1 , '2022-01-01 12:12:12' , '2022-01-01 14:12:12' ,1, 1,'LI 743 RP' ) ;
insert into STATIONNEMENT values ( 2 , '2022-01-01 12:10:12' , '2022-01-02 12:12:12' ,1, 2,'LP 108 OC' ) ;
insert into STATIONNEMENT values ( 3 , '2022-01-02 13:12:12' , '2022-01-03 12:12:12',1, 3,'LI 743 RP' ) ;
insert into STATIONNEMENT values ( 4 , '2022-01-01 08:12:12' ,'2022-04-01 12:12:12',1, 4,'FK 341 VP' ) ;
insert into STATIONNEMENT values ( 5 , '2022-01-05 12:12:12' , '2022-01-05 12:19:12',1, 5,'KD 186 IR' ) ;
insert into STATIONNEMENT values ( 6 , '2022-01-01 10:12:12' , '2022-04-01 12:12:12',1, 6,'BV 346 MS' ) ;
insert into STATIONNEMENT values ( 7 , '2022-01-04 18:12:12' , '2022-01-06 12:12:12',1, 7,'BV 346 MS' ) ;
insert into STATIONNEMENT values ( 8 , '2022-01-03 11:12:12' , null,1, 8,'LI 743 RP' ) ;

commit ;




-- ============================================================
--    verification des donnees
-- ============================================================

select count(*),'= 100 ?','VEHICULE' from VEHICULE 
union
select count(*),'= 2 ?','STATIONNEMENT' from STATIONNEMENT 
union
select count(*),'= 81 ?','PARKING' from PARKING 
union
select count(*),'= 17 ?','COMMUNE' from COMMUNE ;
