# test-mentalworks
Site permettant de référencer des clients avec leur nom, adresse mail, nom de l'entreprise et numéro de téléphone grace à un formulaire. Il permet aussi de référencer des sites internet avec le nom du site, lien du site, choisir un client que nous avons déjà créé et la version de php du site grace à un formulaire. La liste des sites est ensuite affichés sur la page d'accueil

Les technologies utilisés sont : 
- Symfony
- php
- Bootstrap
- Twig
- Validator

Pour l'installation il vous fera faire dans l'ordre :
- composer install
- Modifier le .env avec vos identifiant de connexion
- php bin/console doctrine:database:create
- php bin/console doctrine:schema:update --force

Ensuite pour accéder au site il vous faudra faire dans l'ordre : 
- Symfony server:start
- accéder au site avec l'url suivant : http://localhost:8000/

Normalement si vous avez tout suivi dans l'ordre vous devrez pouvoir accéder au site et à ses fonctionnalités
