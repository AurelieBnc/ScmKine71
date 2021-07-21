# ScmKine71
site internet du cabinet SCM KINE+71

## Environnement de développement

### Pré-requis

* PHP 7.4
* Composer
* Symfony CLI

Vous pouvez vérifier les pré-requis avec la commmande suivante de la CLI Symfony :
```
symfony check:requirements
```

## Installation

### Cloner le projet
```
git clone https://github.com/AurelieBnc/ScmKine71.git
```
### Créer un fichier .env.local et réecrire les paramètres d'environnement dans le fichier .env (changer user_db et password_db )

```
DATABASE_URL="mysql://user_db:password_db@127.0.0.1:3306/arcade?serverVersion=8.0.12"
```

### Déplacer le terminal dans le dossier cloné
```
cd ScmKine71
```

### Taper les commandes suivantes :
```
composer install
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console assets:install public
php bin/ console ckeditor:install

```

## Lancer les tests unitaires
```
php bin/phpunit --testdox
```

## Variables globales
```
Des variables gloables sont disponibles et modifiables dans le fichier services.yaml :
    site_name: 'SCM Kines+71'
    coefAM: 60        => pourcentage de remboursement par l'assurance maladie
    coefMut: 40       => pourcentage restant pris en charge classiquement par les mutuelles
    coefPrix: 2.15    => coefficient applicable au code AMK et AMS afin d'obtenir le montant gloabl du service
