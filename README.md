# AgenceWebSymfony

## Symfony 5 / Laragon / php7.4.6 / nginx

Projet personnel réaliser :

Application symfony qui liste des logements disponible/à vendre

Le home : 4 items listé maximum

sinon aller dans acheter.

### Installation

1 - Installer Symfony 
https://symfony.com/download

2 - Composer Install
dans la racine du repo : composer install

3 - Lancer le projet avec une console
```
php -S 127.0.0.1:8000 -t public 
```
ou 

```
php bin/console server:run
```
### Base de données
Les fichiers de migrations se trouvent dans le repo src/migration
A la racine du projet effectuer la commande :

// Pour générer les fichiers de migration 
php bin/console make:migration

// Pour faire la migration de la base de données 
php bin\console doctrine:migration:migrate


### Routes
```
/admin : Pour le pannel d'administration (ajouter, editer, supprimer)
/biens : pour la liste de tous les biens
/home  : pour les 4 premiers biens à vendre

```
### Fixtures
Afin d'intégrer plusieurs produits d'un seul coup exécuter la commande : 
```
php bin/console doctrine:fixtures:load
```
qui va executer le fichier présent dans le dossier DataFixtures
(Cela va générer 10 produits avec des valeurs aléatoire)


## Enjoy
