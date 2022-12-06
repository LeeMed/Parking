-- Pour avoir toutes les communes
select * from COMMUNE;

-- Pour avoir tous les parkings d'une commune (ex : bordeaux)
select * from PARKING 
where CODE_POSTALE = 33000;

-- Pour avoir tous stationnement d'un parking à un moment donné (ex : 2022-11-23 16:14:0) 
SELECT * FROM STATIONNEMENT
WHERE ID_PARKING = $parking AND DATE_STATIONNEMENT_E <= '2022-11-23 16:14:0' 
AND (DATE_STATIONNEMENT_S is NULL OR DATE_STATIONNEMENT_S >= '2022-11-23 16:14:0');



-- Pour avoir toutes les places disponible dans un parking (ex : parkind d'id = 1)
WITH RECURSIVE NUMS AS (
    SELECT 1 AS NUMERO_DE_PLACE
    UNION ALL
    SELECT NUMERO_DE_PLACE + 1 AS NUMERO_DE_PLACE
    FROM NUMS
    WHERE NUMS.NUMERO_DE_PLACE < (SELECT CAPACITE FROM PARKING
    WHERE ID_PARKING=1)
)

SELECT NUMERO_DE_PLACE
FROM NUMS
WHERE NUMERO_DE_PLACE NOT IN(
SELECT NUMERO_DE_PLACE
FROM  STATIONNEMENT 
WHERE DATE_STATIONNEMENT_E IS NOT NULL AND DATE_STATIONNEMENT_S IS NULL AND ID_PARKING=1);



-- Pour avoir la liste des parkings saturés à un moment donné (ex : 2022-11-25 22:00:00)
select NOM_PARKING
from (select S.ID_PARKING, NOM_PARKING,P.CAPACITE, COUNT(*) from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
    where (S.DATE_STATIONNEMENT_E <= '2022-11-25 22:00:00' AND (S.DATE_STATIONNEMENT_S >= '2022-11-25 22:00:00' OR S.DATE_STATIONNEMENT_S is null))
    group by S.ID_PARKING, NOM_PARKING
    having COUNT(*) = P.CAPACITE) AS T;


-- Pour avoir la liste de voitures qui se sont garées dans deux parkings différents au cours d'une journée 
select NUMERO_IMMATRICULATION
from (select DISTINCT S.ID_PARKING , NUMERO_IMMATRICULATION from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
    where (S.DATE_STATIONNEMENT_E <= '2022-11-23 16:14:0' AND (S.DATE_STATIONNEMENT_S >= '2022-11-23 16:14:0' OR S.DATE_STATIONNEMENT_S is null)) ) AS T
group by NUMERO_IMMATRICULATION
having COUNT(*) >= 2;





