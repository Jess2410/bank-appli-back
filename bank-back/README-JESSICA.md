------------ LARAVEL ---------------

Le lancement :
php artisan serve (Starting Laravel development server: http://127.0.0.1:8000)

Package Sanctum :
composer require laravel/sanctum

------------ MySQL ---------------

CONNEXION A LA BASE DE DONNEES MySQL

-   Démarrer MySQL dans XAMPP
-   mysql -u root -p

CREATION DE LA BASE DE DONNEES

-   create database bank;

UTILISATION DE LA BASE DE DONNEES

-   use bank;

Vérifier qu’elle soit connectée dans le fichier ".env": DATABASE = bank
Puis quitter :

-   exit

Migrer les tables :

-   php artisan migrate
