# General information
Database Server used is MariaDB 10.4.17.

Some info regarding our database :

- servername = "localhost"
- username = "root"
- password = ""
- dbname = "mohammed"


# How to acess the interface

## First step

Download [XAMPP](https://www.apachefriends.org/download.html)

We used XAMPP 7.2.34

The username and password **must** be like the ones mentioned before.

## Second step

Put the this folder (where there is all the code) in the htdocs folder that is in the XAMPP folder.

## Third step 

Go to phpMyAdmin (open XAMPP and write localhost in your browser the click on phpMyAdmin on the top right of the screen) then go to the databases window and create a new database with the name **mohammed** and option **utf8mb4_general_ci**.

Go to the database that you just created, go to the import section and import the file **create.sql**. This will create our entities (COMMUNE, PARKING, VEHICULE and STATIONNEMENT).

Then go back to the import section and import the file **donnees.sql**. This will insert all the necessary data in the database.

## Final step

X = name of the folder that you put in htdocs

Now you can go to your favorite browser and go to localhost/X. You should now be able to see our interface that will be linked with the database you just created.



# Info about the files

- **create.sql** : enables us to create the base of our database.
- **donnees.sql** : allows us to fill our database with all the necessary information.
- **Consultation.sql** : has all the sql statement for the **consultation** part of our inteface.
- **statistiques.sql** : has all the sql statement for the **statistique** part of our inteface.
- **maj.sql** : has all the sql statement for the **Mise à jour** part of our inteface.

