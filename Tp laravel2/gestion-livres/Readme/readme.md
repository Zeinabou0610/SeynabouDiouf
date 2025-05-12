# Application Laravel - Gestion de Livres et Avis

## Présentation du projet

Ce projet est une application web développée avec le framework Laravel. Elle permet la gestion d'une collection de livres et la publication d'avis par des utilisateurs.  
L'objectif pédagogique est de consolider les compétences autour de Laravel, notamment les migrations, les relations Eloquent, les vues dynamiques et la manipulation de formulaires.

## Objectifs pédagogiques

- Mettre en place des **migrations** de base de données
- Gérer des **relations entre modèles** Eloquent
- Afficher dynamiquement les données dans des vues Blade
- Créer des **formulaires interactifs** avec validation
- Structurer un projet Laravel de manière professionnelle (MVC)

---

## Fonctionnalités de l’application

### 1. Gestion des Livres

- Ajout de nouveaux livres
- Affichage de la liste complète des livres
- Consultation des détails d’un livre
- Affichage des avis associés à un livre

### 2. Système d’Avis

- Possibilité pour un utilisateur de laisser un avis sur un livre
- Champs disponibles : nom d’utilisateur, note sur 5, commentaire
- Affichage de tous les avis associés à chaque livre
- Validation des champs lors de la soumission

### 3. Bonus (si implémenté)

- Calcul automatique de la **note moyenne** pour chaque livre
- **Pagination** de la liste des livres
- **Modification des avis**
- **Page 404 personnalisée** en cas de lien invalide

---

## Technologies utilisées

- PHP 8+
- Laravel 10+
- MySQL / MariaDB
- Blade (moteur de template Laravel)
- Bootstrap (pour le design)
- Laravel Eloquent ORM

---

## Installation du projet

### Prérequis

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js + npm (facultatif si on compile les assets)

### Étapes d'installation

1. **Cloner le dépôt**

```bash
git clone https://github.com/votre-utilisateur/tp-laravel-livres-avis.git
cd tp-laravel-livres-avis