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

insert into VEHICULE values ( '12 A45 68 ' , 'BMW' , '02-APR-18' , 18521 , 'BON ETAT' ) ;

commit ;

-- STATIONNEMENT

insert into STATIONNEMENT values ( 1 , '01-01-2022 12:12:12:12' , '02-01-2022 12:12:12:12' , 1 ) ;

commit ;

-- PARKING

insert into PARKING values ( 1 , 'JACKDAW' , 200 , '7 AVENUE PEY BERLAND' , 2 ) ;

commit ;

-- COMMUNE

insert into COMMUNE values ( 33600 , 'PESSAC' ) ;

commit ;

-- ============================================================
--    verification des donnees
-- ============================================================

select count(*),'= 1 ?','VEHICULE' from VEHICULE 
union
select count(*),'= 1 ?','STATIONNEMENT' from STATIONNEMENT 
union
select count(*),'= 1 ?','PARKING' from PARKING 
union
select count(*),'= 1 ?','COMMUNE' from COMMUNE ;
