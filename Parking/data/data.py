from random import randint
import numpy as np
import string
import random



######################


print("-- ============================================================\n"
"--    suppression des donnees\n"
"-- ============================================================\n"

"delete from COMMUNE ;\n"
"delete from PARKING ;\n"
"delete from STATIONNEMENT ;\n"
"delete from VEHICULE ;\n"

"commit ;\n"

"-- ============================================================\n"
"--    creation des donnees\n"
"-- ============================================================\n"
)
print("\n")

######################


def day_generator(j):
    if (j == 2):
        return randint(1, 28)
    elif (j in (1,3,5,7,8,10,12)):
        return randint(1, 31)
    elif (j in (4,6,9,11)):
        return randint(1, 30)

#######VEHICULE##############

max_vehicule = 400
imm = []

def imm_generator(chars=string.ascii_uppercase,strings=string.digits):
    return random.choice(chars)+random.choice(chars)+' '+random.choice(strings)+random.choice(strings)+random.choice(strings)+' '+random.choice(chars)+random.choice(chars)

TabVehicule=['Alfa Romeo','Aston Martin','Audi','Dacia','Benelli','BMW','Bugatti','Cadillac','Chevrolet',
             'Chrysler','Citroën','Daihatsu','Dodge','DS ','Ducati','Ferrari','Fiat','Ford','Harley Davidson',
             'Honda','Hyundai','Jaguar','Jeep','Kawasaki','Kia ','Lamborghini','Land Rover','Lexus','Maserati',
             'Mazda','McLaren','Mercedes-Benz','Mini ','Mitsubishi ','Nissan','Norton Motorcycle','Opel',
             'Peugeot','Porsche','Renault','Rolls-Royce','SEAT','Škoda ','Subaru','Suzuki','Tesla','Toyota',
             'Volkswagen','Volvo','Zero Motorcycle']


''' generer dmc '''
def dmc_generator():
    m=randint(1,12)
    return [day_generator(m),m,2010+randint(0,12)]


''' generer kilometrage'''
def kil_generator(year):
    moykil= 15000
    return (2023-year)*moykil+randint(0,999)

TabEtat=['Excellent état','Très bon état',' Bon état','État correct','Mauvaise état']

#generer etat
def state_generator(kilo):
    if(kilo<50000):
        return TabEtat[0]
    elif(kilo<100000):
        return TabEtat[1]
    elif(kilo<150000):
        return TabEtat[2]
    elif(kilo<250000):
        return TabEtat[3]
    else:
        return TabEtat[4]

#creer vehicule
def makeVehicule():
    print("\n")
    print("-- VEHICULE")
    print("\n")
    for i in range(0,max_vehicule+2):
        dmc=dmc_generator()
        kil=kil_generator(dmc[2])
        imm.append(imm_generator())
        print("insert into VEHICULE values ('{}' ,'{}' ,'{}-{}-{}' ,{}, '{}');".format(imm[i],TabVehicule[randint(0,len(TabVehicule)-1 ) ],dmc[2],dmc[1],dmc[0],kil,state_generator(kil)  )   )
    print("\n")
    print("commit ;")



    


#######PARKING###############
#Bordeaux#
TabParking=[("Parking Pey Berland",33000,"Place pey berland"),
("Parking Gambetta",33000,"Rue Edmond Michelet"),
("Parking Alsace-Lorraine",33000,"21 cours Alsace-Lorraine"),


#Pessac#
("Parking Carreire",33600,"4 rue du Docteur Rocaz"),
("Parking Hôtel PREMIERE CLASSE PESSAC",33600,"4 Bis Avenue Antoine-Becquerel"),
("Parking Côte D Argent",33600,"23 Chemin Pomerol"),
            

#Merignac#
("Parking Monge",33700,"17 rue Gracieuse"),
("Parking Poliveau",33700,"39 bis rue Poliveau"),
("Parking Champagny" ,33700,"Face au 13 rue Casimir Perrier")]



#creer parking
def makeParking():
    print("\n")
    print("-- Parking")
    print("\n")
    print("insert into PARKING values (1 ,'Parking Pey Berland' ,100,'Place pey berland' ,3.0 ,33000 );")
    print("insert into PARKING values (2 ,'Parking Gambetta' ,50,'Rue Edmond Michelet' ,1.5 ,33000 );")
    print("insert into PARKING values (3 ,'Parking Alsace-Lorraine' ,50 ,'21 cours Alsace-Lorraine' ,2.0 ,33000 );")
    print("insert into PARKING values (4 ,'Parking Carreire' ,75 ,'4 rue du Docteur Rocaz' ,1.5 ,33600 );")
    print("insert into PARKING values (5 ,'Parking Hôtel PREMIERE CLASSE PESSAC' ,75 ,'4 Bis Avenue Antoine-Becquerel' ,2.0 ,33600 );")
    print("insert into PARKING values (6 ,'Parking Côte D Argent' ,50 ,'23 Chemin Pomerol' ,1.0 ,33600 );")
    print("insert into PARKING values (7 ,'Parking Monge' ,50 ,'17 rue Gracieuse' ,2.5 ,33700 );")
    print("insert into PARKING values (8 ,'Parking Poliveau' ,50 ,'39 bis rue Poliveau' ,1.5 ,33700 );")
    print("insert into PARKING values (9 ,'Parking Champagny' ,80 ,'Face au 13 rue Casimir Perrier' ,1.5 ,33700 );")
    print("\n")
    print("commit ;")



parCap=[100,90,50,75,75,50,50,100,80]


#####COMMUNE###########

TabCommune = [
    (33000,"Bordeaux"),(33700,"Mérignac"),(33600,"Pessac")
]


#creer commune
def makeCommune():
    print("\n")
    print("-- COMMUNE")
    print("\n")
    for (x,y) in TabCommune:
        print("insert into COMMUNE values ({},'{}');".format(x,y) )
    print("\n")

    print("commit ;")




######STATIONNEMENT#########

max_stationnement = 50

#generer date entree
def gen_date_e(jr):
    
    return [jr,11,2022,6+randint(0,14),randint(0,59),00]

#generer date sortie
def gen_date_s(date_e):
    date_e[3]=date_e[3]+randint(0,23-date_e[3])
    date_e[4]=date_e[4]+randint(0,59-date_e[4])
    return date_e
#generer date sortie saturee
def gen_date_s_satu(date_e):
    date_e[3]=22
    date_e[4]=randint(0,59)
    return date_e
  
def proba_null(jr):
    if((randint(1,3)*jr)==30):
            return 0
    return 1


#2 voiture dans le meme parking
def samePar():
     date_e=[30,11,2022,8,30,00]
     date_s=[30,11,2022,12,45,00]
     print("insert into STATIONNEMENT values ({} , '{}-{}-{} {}:{}:{}' , '{}-{}-{} {}:{}:{}' , {} , {} , '{}' );".format(3601,date_e[2],date_e[1],date_e[0],date_e[3],date_e[4],date_e[5],date_s[2],date_s[1],date_s[0],date_s[3],date_s[4],date_s[5],4,56,imm[max_vehicule]) )
     date_e=[30,11,2022,8,00,00]
     date_s=[30,11,2022,13,45,00]
     print("insert into STATIONNEMENT values ({} , '{}-{}-{} {}:{}:{}' , '{}-{}-{} {}:{}:{}' , {} , {} , '{}' );".format(3602,date_e[2],date_e[1],date_e[0],date_e[3],date_e[4],date_e[5],date_s[2],date_s[1],date_s[0],date_s[3],date_s[4],date_s[5],4,57,imm[max_vehicule+1]) )
     date_e=[30,11,2022,15,30,00]
     date_s=[30,11,2022,20,45,00]
     print("insert into STATIONNEMENT values ({} , '{}-{}-{} {}:{}:{}' , '{}-{}-{} {}:{}:{}' , {} , {} , '{}' );".format(3603,date_e[2],date_e[1],date_e[0],date_e[3],date_e[4],date_e[5],date_s[2],date_s[1],date_s[0],date_s[3],date_s[4],date_s[5],9,75,imm[max_vehicule]) )
     date_e=[30,11,2022,14,30,00]
     date_s=[30,11,2022,21,45,00]
     print("insert into STATIONNEMENT values ({} , '{}-{}-{} {}:{}:{}' , '{}-{}-{} {}:{}:{}' , {} , {} , '{}' );".format(3604,date_e[2],date_e[1],date_e[0],date_e[3],date_e[4],date_e[5],date_s[2],date_s[1],date_s[0],date_s[3],date_s[4],date_s[5],9,76,imm[max_vehicule+1]) )



#generer stationnement
def makeStationnement():
     print("\n")
     print("-- STATIONNEMENT")
     print("\n")
     for jr in range(0,8):
         for par in range(1,10):
             for i in range(1,max_stationnement+1):
                 date_e=gen_date_e(jr+23)
                 j=date_e.copy()
                 if((jr == 2 and ( par==7 or par==3)) or (jr == 5 and ( par==2 or par==8))):
                     date_s=gen_date_s_satu(j)
                     if(proba_null(jr+23)):
                          print("insert into STATIONNEMENT values ({} , '{}-{}-{} {}:{}:{}' , '{}-{}-{} {}:{}:{}' , {} , {} , '{}' );".format(i+50*(par-1)+450*jr,date_e[2],date_e[1],date_e[0],date_e[3],date_e[4],date_e[5],date_s[2],date_s[1],date_s[0],date_s[3],date_s[4],date_s[5],par,i,imm[randint(0,max_vehicule -1)]) )
                     else:
                          print("insert into STATIONNEMENT values ({} , '{}-{}-{} {}:{}:{}' , {} , {} , {} , '{}' );".format(i+50*(par-1)+450*jr,date_e[2],date_e[1],date_e[0],date_e[3],date_e[4],date_e[5],'null',par,i,imm[randint(0,max_vehicule-1)]) )
                 else:    
                     date_s=gen_date_s(j)
                     if(proba_null(jr+23)):
                         print("insert into STATIONNEMENT values ({} , '{}-{}-{} {}:{}:{}' , '{}-{}-{} {}:{}:{}' , {} , {} , '{}' );".format(i+50*(par-1)+450*jr,date_e[2],date_e[1],date_e[0],date_e[3],date_e[4],date_e[5],date_s[2],date_s[1],date_s[0],date_s[3],date_s[4],date_s[5],par,i,imm[randint(0,max_vehicule -1)]) )
                     else:
                         print("insert into STATIONNEMENT values ({} , '{}-{}-{} {}:{}:{}' , {} , {} , {} , '{}' );".format(i+50*(par-1)+450*jr,date_e[2],date_e[1],date_e[0],date_e[3],date_e[4],date_e[5],'null',par,i,imm[randint(0,max_vehicule-1)]) )


     samePar()    
        
     print("\n")    
     print("commit ;")




makeVehicule()
makeCommune()
makeParking()
makeStationnement()

####################
print("\n")
print("-- ============================================================\n"
"--    verification des donnees\n"
"-- ============================================================\n"
"select count(*),'= 402 ?','VEHICULE' from VEHICULE \n"
"union\n"
"select count(*),'=  3604','STATIONNEMENT' from STATIONNEMENT\n"
"union\n"
"select count(*),'= 9 ?','PARKING' from PARKING\n"
"union\n"
"select count(*),'= 3 ?','COMMUNE' from COMMUNE ;\n"
)























































































































































































