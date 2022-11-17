select * from COMMUNE;

select * from PARKING 
where CODE_POSTALE = 75056;

select * from VEHICULE
where NUMERO_IMMATRICULATION = 'LI 743 RP';

select NUMERO_DE_PLACE from STATIONNEMENT
where DATE_STATIONNEMENT_E not null and DATE_STATIONNEMENT_S is null and ID_PARKING=1;

with CTE as 
(
    select 1 Number
    union all
    select Number + 1 from CTE where Number < 100
)
select * from CTE

