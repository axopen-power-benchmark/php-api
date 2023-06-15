# PHP API avec Symfony et Doctrine

Ce projet fait partie de l'étude de la consommation énergétique des frameworks
de développement en conditions réelles.

Des informations sur le protocole utilisé pour les tests se trouve [ici](https://github.com/axopen-power-benchmark/setup-benchmark)

## Dépendances

Pour compiler le projet les dépendances suivantes doivent être installé :

```shell
composer
php
symfony

# Lancer la commande suivante
composer install # installe les dépendances du projet dont symfony et doctrine  
```

## Éxecution du serveur

En developpement on peut utiliser la commande `symfony server:start`

Pour la production un serveur Web doit renvoyer le fichier public/index.php
Pour plus d'information pour configurer le serveur web se référer
à la documentation de Symfony

## Configuration

Dans dossier courant lors du lancement de l'API doit se trouver un fichier
```.env```
On retrouve la configuration de la base de données dans ce fichier :
```dotenv
...
DATABASE_URL="mysql://root@127.0.0.1:3306/power_benchmark_2?serverVersion=8&charset=utf8mb4"
...
```

## Routes

### GET /api/chantier

Retourne un chantier random en mode eager

### POST /api/chantier

Update un chantier random avec des valeurs random et retourne le chantier updater
