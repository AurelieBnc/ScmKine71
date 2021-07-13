# ScmKine71
site internet du cabinet SCM KINE+71

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
php bin/ console assets:install public

```
