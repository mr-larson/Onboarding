# Gestion d'Onboarding

## Description

Cette application web est conçue pour gérer le processus d'onboarding pour une ou plusieurs sociétés. Elle permet de gérer les sociétés, leurs établissements, les collaborateurs, ainsi que les étapes et les tâches liées à l'onboarding. L'application utilise Laravel pour le backend et Vue.js pour le frontend.

### Fonctionnalités principales :
- Gestion des sociétés et des établissements.
- Suivi des collaborateurs et de leurs contrats.
- Définition et gestion des étapes d'onboarding personnalisées.
- Attribution et suivi des tâches d'onboarding.
- Gestion documentaire pour l'onboarding (contrats, fiches d'information).
- Notifications pour suivre les échéances des tâches.

## Technologies utilisées

- **Backend** : Laravel 10 avec Sail (utilisation de Docker pour l'environnement de développement)
- **Frontend** : Vue.js 3
- **CSS** : Tailwind CSS
- **Authentification** : Laravel Breeze
- **Base de données** : MySQL (ou tout autre système compatible)

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants :
- Docker (pour utiliser Laravel Sail)
- Composer
- Node.js et npm

## Installation

1. Clonez ce dépôt :

    ```bash
    git clone https://github.com/votre-utilisateur/votre-projet.git
    ```

2. Accédez au répertoire du projet :

    ```bash
    cd votre-projet
    ```

3. Installez les dépendances PHP avec Composer :

    ```bash
    composer install
    ```

4. Installez les dépendances JavaScript avec npm :

    ```bash
    npm install
    ```

5. Copiez le fichier `.env.example` pour créer un fichier `.env` :

    ```bash
    cp .env.example .env
    ```

6. Générez une clé d'application Laravel :

    ```bash
    php artisan key:generate
    ```

7. Configurez les variables d'environnement dans le fichier `.env`, notamment la connexion à la base de données.

8. Lancez les containers Docker avec Sail :

    ```bash
    ./vendor/bin/sail up
    ```

9. Exécutez les migrations pour créer les tables dans la base de données :

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

## Utilisation

- Accédez à l'interface web via `http://localhost` après avoir démarré les containers Docker.
- Pour créer une société, ajoutez des collaborateurs et gérez les étapes d'onboarding, connectez-vous avec un compte administrateur.
- Suivez l'avancement des étapes d'onboarding via le tableau de bord.

## Tests

Pour exécuter les tests unitaires :

```bash
./vendor/bin/sail artisan test
```
