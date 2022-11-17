
from random import randint
import numpy as np
import string
import random



def day_generator(j):
    if (j == 2):
        return randint(1, 28)
    elif (j in (1,3,5,7,8,10,12)):
        return randint(1, 31)
    elif (j in (4,6,9,11)):
        return randint(1, 30)

#######VEHICULE##############

max_vehicule = 100

def imm_generator(chars=string.ascii_uppercase,strings=string.digits):
    return random.choice(chars)+random.choice(chars)+' '+random.choice(strings)+random.choice(strings)+random.choice(strings)+' '+random.choice(chars)+random.choice(chars)

TabVehicule=['Alfa Romeo','Aston Martin','Audi','Dacia','Benelli','BMW','Bugatti','Cadillac','Chevrolet',
             'Chrysler','Citroën','Daihatsu','Dodge','DS ','Ducati','Ferrari','Fiat','Ford','Harley Davidson',
             'Honda','Hyundai','Jaguar','Jeep','Kawasaki','Kia ','Lamborghini','Land Rover','Lexus','Maserati',
             'Mazda','McLaren','Mercedes-Benz','Mini ','Mitsubishi ','Nissan','Norton Motorcycle','Opel',
             'Peugeot','Porsche','Renault','Rolls-Royce','SEAT','Škoda ','Subaru','Suzuki','Tesla','Toyota',
             'Volkswagen','Volvo','Zero Motorcycle']

def dmc_generator():
    m=randint(1,12)
    return [day_generator(m), m, 2010 + randint(0,12)]

def kil_generator(year):
    moykil= 15000
    return (2023-year) * moykil + randint(0,999)

TabEtat=['Excellent état','Très bon état',' Bon état','État correct','Mauvaise état']
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


def makeVehicule():
    print("\n")
    print("-- VEHICULE")
    print("\n")
    for i in range(0,max_vehicule):
        dmc=dmc_generator()
        kil=kil_generator(dmc[2]) 
        print("insert into VEHICULE values ('{}' ,'{}' ,'{}-{}-{}' ,{}, '{}');".format(imm_generator(),TabVehicule[randint(0,len(TabVehicule)-1 ) ],dmc[2],dmc[1],dmc[0],kil,state_generator(kil)  )   )
    print("\n")
    print("commit ;")



    


#######PARKING###############
#Paris#
TabParking=[("Parking Louvre Pyramides",75056,"15 rue des Pyramides"),
("Parking Les Halles- Saint Eustache",75056,"22 Rue des Halles"),
("Parking Rivoli-Sébastopol",75056,"5 rue Pernelle"),
("Parking Hôtel de Ville",75056,"6 Quai de Gesvres"),
("Parking Gay Lussac",75056,"Face au 45 rue Gay Lussac"),
("Parking Lagrange-Maubert Notre-Dame",75056,"15 rue Lagrange"),
("Parking Polytechnique",75056,"Impasse J H Lartigue"),

#Bordeaux#
("Parking Pey Berland",33063,"Place pey berland"),
("Parking Gambetta",33063,"Rue Edmond Michelet"),
("Parking Alsace-Lorraine",33063,"21 cours Alsace-Lorraine"),
("Parking Cité Mondiale",33063,"20 Quai des Chartrons"),
("Parking Sainte Catherine",33063,"15 rue Honoré Tessier"),
("Parking Victoire",33063,"Place de la Victoire"),
("Parking Les Capucins",33063,"Rue Emile Laparra"), 

#Merignac#
("Parking Monge",33281,"17 rue Gracieuse"),
("Parking Poliveau",33281,"39 bis rue Poliveau"),
("Parking Marché Saint Germain",33281,"Face au 1  Rue Lobineau"),
("Parking Bac Montalembert",33281,"9 rue Montalembert"),
("Parking Gouraud ",33281,"5 ave Emile Pouvillon"),
("Parking Champagny" ,33281,"Face au 13 rue Casimir Perrier"),

#Toulouse#
("Parking Madeleine-Tronchet ",31555,"Face au 21 place de la Madeleine"),
("Parking Haussmann Berri ",31555,"Face au 155 Bvd Hausmann"),
("Parking St Augustin ",31555,"18 rue de Laborde"),
("Parking Anvers ",31555,"41 bvd Rochechouard"),
("Parking Meyerbeer-Opéra ",31555,"3 rue de la Chaussée d Antin"),

#Nantes#
("Parking Mayran ",44109,"5 rue Mayran"),
("Parking Milton",44109,"35 rue Milton"),
("Parking Colonel Fabien",44109,"3 rue Louis Blanc"),
("Parking Récollets",44109,"3 passage des Récollets"),
("Parking René Boulanger",44109,"1 ter rue René Boulanger"),

#Montpellier#
("Parking Hôpital Saint Louis",34172,"1 avenue Claude Vellefaux"),
("Parking Roquette",34172,"Face au 19 rue Servan"),
("Parking Hector Malot",34172,"Angle avenue Daumesnil et rue Hector Malot"),
("Parking Reuilly Diderot",34172,"34 rue de Reuilly"),

#Strasbourg#
("Parking Charléty Coubertin",67482,"17 avenue Pierre de Coubertin"),
("Parking Charléty Thomire",67482,"Rue Thomire"),
("Parking Hôpital Sainte-Anne",67482,"100 rue de la Santé"),
("Parking Didot",67482,"Place Moro Giafferi 2 rue Didot"),

#Lille#
("Parking Général Beuret",59350,"31 rue du Général Beuret"),
("Parking Porte d Auteuil ",59350,"8 avenue du Général Sarail"),
("Parking Jean Bouin" ,59350,"17 rue Nungesser et Coli"),
("Parking Delessert",59350,"13 rue Beethoven"),

#Grenoble#
("Parking Flandrin",38185,"2 boulevard Flandrin"),
("Parking Emile Augier",38185,"50 boulevard Emile Augier"),
("Parking Gros Boulainvilliers",38185,"15 rue de Boulainvilliers"),
("Parking Mozart",38185,"56-67 avenue Mozart"),

#"Poitiers#
("Parking Carnot ",86194,"20 bis avenue Carnot"),
("Parking Prony ",86194,"37 rue Prony"),
("Parking Sainte Périne",86194,"Angle rue Chardon-Lagache et rue Mirabeau"),
("Parking Péreire",86194,"209 Boulevard Pereire"),
("Parking Carpeaux",86194," 7 rue Carpeaux"),

#Nancy#
("Parking Marcadet",54395,"142 rue Marcadet"),
("Parking Claude Bernard" ,54395,"12 rue Chana Orloff"),
("Parking Hôpital Robert Debré",54395,"48 boulevard Sérurier"),

#La Rochelle#
("Parking Printemps Nation ",17300,"22 rue de Lagny"),
("Parking Val d Europe - Serris Montévrain",17300,"77 rue de la Charbonnière"),
("Parking Vaires Torcy",17300,"17 avenue des Mésanges"),

#Orléans#
("Parking Vaires Centre Ville",45234,"Rue de la Gare"),
("Parking de la Gare de Chatou",45234,"Place Maurice Bertaux"),
("Parking Place Berteaux",45234,"Place Maurice Bertaux"),

#Tours#
("Parking Centre-Ville",37261,"Face au 13 rue Albert Guilpin"),
("Parking Hôpital Henri Mondor",37261,"1 rue Gustave Eiffel"),
("Parking Joinville ",37261,"23 rue de Paris"),

#Marseille#
("Parking Gare Saint Charles",13055,"1 avenue Pierre Semard"),
("Parking Sainte Barbe",13055,"16 rue Sainte Barbe"),
("Parking Gare Saint-Charles",13055,"15 Boulevard Maurice Bourdet "),
("Parking Grand Garage Méditerranéen",13055,"44 place aux Huiles"),
("Parking Saint Charles Services",13055,"36 boulevard Charles Nédelec" ),
("Parking Cours Julien",13055,"Cours Julien"),
("Parking Estienne d Orves",13055,"Place aux Huiles"),

#Lyon#
("Parking Immeuble CARDINAL CAMPUS" ,69123,"25 rue Pauline Kergomard"),
("Parking La Guillotière- Bonnefoi",69123,"4-6 rue Bonnefoi"),
("Parking Immeuble FAC-HABITAT LA GUILLOTIÈRE" ,69123,"14 rue du Docteur Crestin"),
("Parking Immeuble CARDINAL CAMPUS BUTTERFLY ",69123,"40 Route de Vienne"),
("Parking Gare Jean Macé",69123,"24 rue Gerland"),
("Parking Bellecour - Campanile",69123,"4-6 Rue Mortier"),

#Pessac#
("Parking Carreire",33318,"4 rue du Docteur Rocaz"),
("Parking Hôtel PREMIERE CLASSE PESSAC",33318,"4 Bis Avenue Antoine-Becquerel"),
("Parking Côte D Argent",33318,"23 Chemin Pomerol"),
("Parking Castellane",33318,"33 Chemin Pomerol"),
("Parking Schoelcher",33318,"20 rue Pierre Curie")]


def makeParking():
    print("\n")
    print("-- Parking")
    print("\n")
    i =0
    for (x,y,z) in TabParking:
        i=i+1
        print("insert into PARKING values ({} ,'{}' ,{} ,'{}' ,{} ,{} );".format(i, x , 50*randint(2,6) , z ,0.5*randint(4, 20), y) )
    print("\n")

    print("commit ;")






#####COMMUNE###########

TabCommune = [
    (75056,"Paris"),(13055,"Marseille"),(69123,"Lyon"),(31555,"Toulouse"),(44109,"Nantes"),
    (34172,"Montpellier"),(67482,"Strasbourg"),(33063,"Bordeaux"),(59350,"Lille"),(38185,"Grenoble"),
    (37261,"Tours"),(45234,"Orléans"),(54395,"Nancy"),(86194,"Poitiers"),(17300,"La Rochelle"),
    (33281,"Mérignac"),(33318,"Pessac")
]



def makeCommune():
    print("\n")
    print("-- COMMUNE")
    print("\n")
    for (x,y) in TabCommune:
        print("insert into COMMUNE values ({},'{}');".format(x,y) )
    print("\n")

    print("commit ;")






makeVehicule()
makeCommune()
makeParking()

























































































































































































