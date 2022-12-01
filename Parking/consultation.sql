select * from COMMUNE;

select * from PARKING 
where CODE_POSTALE = 75056;

select * from VEHICULE
where NUMERO_IMMATRICULATION = 'LI 743 RP';

select NUMERO_DE_PLACE from STATIONNEMENT
where DATE_STATIONNEMENT_E not null and DATE_STATIONNEMENT_S is null and ID_PARKING=1;

select NOM_PARKING
from (select S.ID_PARKING, NOM_PARKING, COUNT(*) from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
    where (S.DATE_STATIONNEMENT_E <= $date AND (S.DATE_STATIONNEMENT_S >= $date OR S.DATE_STATIONNEMENT_S is null))
    group by S.ID_PARKING, NOM_PARKING
    having COUNT(*) = P.CAPACITE) AS T;

select NUMERO_IMMATRICULATION
from (select DISTINCT S.ID_PARKING , NUMERO_IMMATRICULATION from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
    where (S.DATE_STATIONNEMENT_E <= $date AND (S.DATE_STATIONNEMENT_S >= $date OR S.DATE_STATIONNEMENT_S is null)) ) AS T
group by NUMERO_IMMATRICULATION
having COUNT(*) >= 2;


with CTE as 
(
    select 1 Number
    union all
    select Number + 1 from CTE where Number < 100
)
select * from CTE


