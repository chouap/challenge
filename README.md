Challenge
===================


Cr�ation de la base de donn�es
-------------

Jouer les fichiers sql dans le r�pertorie "sql" :

- structure.sql
- data.sql

----------


Routes disponible
-------------------

R�cup�rer un article :

url: article/{id} 
m�thode : GET


R�cup�rer un auteur :

url : autor/{id}
method : GET


Ajouter un article :

url : article
param�tre : title, content, publicationDate, autorId (case sensitive)
method : POST


A Symfony project created on December 15, 2015, 10:54 am.
