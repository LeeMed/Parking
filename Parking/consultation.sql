select * from COMMUNE;

select * from PARKING 
where CODE_POSTALE = 75056;

select * from VEHICULE
where NUMERO_IMMATRICULATION = 'LI 743 RP';

select NUMERO_DE_PLACE from STATIONNEMENT
where DATE_STATIONNEMENT_E not null and DATE_STATIONNEMENT_S is null and ID_PARKING=1;

select NOM_PARKING
from (select ID_PARKING, NOM_PARKING, COUNT(*) from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
    where (S.HEURE_STATIONNEMENT_E <= $date AND ( S.HEURE_STATIONNEMENT_S in 'NULL' OR S.HEURE_STATIONNEMENT_S >= $date))
    group by ID_PARKING, NOM_PARKING
    having COUNT(*) = P.CAPACITE);

select NUMERO_IMMATRICULATION
from (select ID_PARKING DISTINCT, NUMERO_IMMATRICULATION from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
    where (S.HEURE_STATIONNEMENT_E <= $date AND ( S.HEURE_STATIONNEMENT_S in 'NULL' OR S.HEURE_STATIONNEMENT_S >= $date)) )
group by NUMERO_IMMATRICULATION
having COUNT(*) >= 2;



with CTE as 
(
    select 1 Number
    union all
    select Number + 1 from CTE where Number < 100
)
select * from CTE


