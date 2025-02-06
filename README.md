# 🚀 Laravel 11 - Site d'authentification sécurisé

## 📌 Introduction
Ce projet est une implémentation sécurisée du système d’authentification sous Laravel 11. Il permet aux utilisateurs de s'inscrire, se connecter, et de se déconnecter en toute sécurité. Il offre une base  pour développer des applications sécurisées et évolutives.

## 🎯 Fonctionnalités
✅ Inscription avec un login unique, e-mail et mot de passe  
✅ Connexion sécurisée avec identifiants
✅ Mot de passe hasher automatiquement
✅ Déconnexion sécurisée  

## 🛠 Technologies utilisées
- **Laravel 11** - Framework PHP puissant  
- **PHP 8.1+** - Langage backend  
- **SQLite** - Base de données légère  
- **Tailwind CSS** - Stylisation moderne  

## 🔧 Installation

### Prérequis
- PHP >= 8.1  
- Composer  
- Node.js & npm  
- SQLite  

### Étapes

#### 1️⃣ Cloner le projet
```bash
git clone https://github.com/utilisateur/projet.git
cd projet
```

#### 2️⃣ Installer les dépendances
```bash
composer install
npm install
```

#### 3️⃣ Configurer l’environnement
```bash
cp .env.example .env
```
Modifier `.env` pour spécifier SQLite :
```ini
DB_CONNECTION=sqlite
DB_DATABASE=/chemin/vers/database.sqlite
```

#### 4️⃣ Générer la clé de l’application
```bash
php artisan key:generate
```

#### 5️⃣ Lancer les migrations
```bash
php artisan migrate
```

#### 6️⃣ Compiler les assets front-end
```bash
npm run build
```

#### 7️⃣ Démarrer le serveur local
```bash
php artisan serve
```

## 🎮 Utilisation
📌 **Créer un compte/ S'inscrire** : `/register`  
📌 **Se connecter** : `/login`  
📌 **Retour** : Redirection après connexion  
📌 **Déconnexion** : Bouton de déconnexion  

## 📩 Contact
📧 AILEM Amira - Ailem.mira@gmail.com
