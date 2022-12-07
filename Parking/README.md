# General information
Database Server used is MariaDB 10.4.17.

Some info regarding our database :

- servername = "localhost"
- username = "root"
- password = ""
- dbname = "mohammed"



# First step

Download [XAMPP](https://www.apachefriends.org/download.html)

We used XAMPP 7.2.34

The username and password **must** be like the ones mentioned before.

# Second step

Put the this folder (where there is all the code) in the htdocs folder that is in the XAMPP folder.

# Third step 

Go to phpMyAdmin (open XAMPP and write localhost in your browser the click on phpMyAdmin on the top right of the screen) then go to the databases window and create a new database with the name **mohammed** and option **utf8mb4_general_ci**.

Go to the database that you just created, go to the import section and import the file **create.sql**. This will create our entities (COMMUNE, PARKING, VEHICULE and STATIONNEMENT).

Then go back to the import section and import the file **donnees.sql**. This will insert all the necessary data in the database.

# Final step

X = name of the folder that you put in htdocs

Now you can go to your favorite browser and go to localhost/X. You should now be able to see our interface that will be linked with the database you just created.


