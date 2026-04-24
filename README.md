# Corpus — Plateforme de gestion d'articles

> Application web de publication et gestion d'articles construite avec **Laravel 13**, design **glassmorphism corporate** fond clair.

---

## Stack technique

| Couche | Technologie |
|--------|-------------|
| Framework | Laravel 13.x |
| Language | PHP 8.5 |
| Base de données | MySQL / SQLite |
| Moteur de templates | Blade |
| Stockage fichiers | Laravel Storage (disk `public`) |
| Emails | Symfony Mailer via SMTP (Mailtrap) |
| Frontend | HTML/CSS vanilla — Glassmorphism |
| Fonts | Instrument Serif + Figtree (Google Fonts) |

---

## Prérequis

- PHP >= 8.2
- Composer
- Node.js >= 18 (optionnel, si assets à compiler)
- MySQL 8+ ou SQLite
- Extension PHP : `pdo`, `mbstring`, `openssl`, `fileinfo`, `gd`

---

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/votre-repo/corpus.git
cd corpus
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurer la base de données dans `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=corpus
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Lancer les migrations

```bash
php artisan migrate
```

Avec données de test :

```bash
php artisan migrate --seed
```

### 6. Lier le stockage public

```bash
php artisan storage:link
```

### 7. Lancer le serveur de développement

```bash
php artisan serve
```

L'application est accessible sur `http://127.0.0.1:8000`

---

## Configuration email (Mailtrap)

Dans `.env`, renseignez vos identifiants SMTP Mailtrap :

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=votre_username_mailtrap
MAIL_PASSWORD=votre_password_mailtrap
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@corpus.app"
MAIL_FROM_NAME="${APP_NAME}"
```

> Retrouvez vos identifiants sur [mailtrap.io](https://mailtrap.io) → **Inboxes → SMTP Settings**

Après toute modification du `.env` :

```bash
php artisan config:clear
php artisan cache:clear
```

---

## Structure des vues

```
resources/views/
├── articles/
│   ├── index.blade.php     # Liste de tous les articles
│   ├── create.blade.php    # Formulaire de création
│   ├── edit.blade.php      # Formulaire de modification
│   └── show.blade.php      # Détail d'un article
└── types/
    ├── index.blade.php     # Liste des types
    ├── create.blade.php    # Créer un type
    └── edit.blade.php      # Modifier un type
```

---

## Routes principales

| Méthode | URI | Action |
|---------|-----|--------|
| GET | `/articles` | Liste des articles |
| GET | `/articles/create` | Formulaire création |
| POST | `/articles` | Enregistrer un article |
| GET | `/articles/{id}` | Afficher un article |
| GET | `/articles/{id}/edit` | Formulaire édition |
| PUT | `/articles/{id}` | Mettre à jour |
| DELETE | `/articles/{id}` | Supprimer |
| GET | `/types` | Liste des types |
| GET | `/types/create` | Formulaire création type |
| POST | `/types` | Enregistrer un type |
| GET | `/types/{id}/edit` | Formulaire édition type |
| PUT | `/types/{id}` | Mettre à jour un type |
| DELETE | `/types/{id}` | Supprimer un type |

---

## Modèles & Relations

```
User
 └── hasMany → Article

Type
 └── hasMany → Article

Article
 ├── belongsTo → User
 └── belongsTo → Type
```

### Champs de la table `articles`

| Colonne | Type | Description |
|---------|------|-------------|
| `id` | bigint | Clé primaire |
| `title` | string | Titre de l'article |
| `content` | text | Contenu |
| `type_id` | foreignId | Référence vers `types` |
| `user_id` | foreignId | Référence vers `users` |
| `image` | string\|null | Chemin image dans `storage/app/public` |
| `created_at` | timestamp | Date de création |
| `updated_at` | timestamp | Date de modification |

---

## Upload d'images

Les images sont stockées dans `storage/app/public/articles/` et accessibles via `storage/articles/`.

Format recommandé : **JPEG ou WEBP, 1200×630px, < 500 Ko**

Le lien symbolique doit être créé une seule fois :

```bash
php artisan storage:link
```

---

## Design system

Le design utilise un thème **glassmorphism fond clair** cohérent sur toutes les pages.

| Variable CSS | Valeur | Usage |
|---|---|---|
| `--bg` | `#f2f4f8` | Fond de page |
| `--glass` | `rgba(255,255,255,0.72)` | Cartes verre |
| `--navy` | `#2d3a5e` | Texte principal |
| `--periwinkle` | `#6478d4` | Accent principal |
| `--rose` | `#c8708a` | Accent secondaire |
| `--amber` | `#d4924a` | Bandeaux édition |
| `--sage` | `#5a9e82` | Messages succès |

Typographies : **Instrument Serif** (titres) · **Figtree** (corps)

---

## Commandes utiles

```bash
# Vider tous les caches
php artisan optimize:clear

# Voir toutes les routes
php artisan route:list

# Créer un modèle + migration + controller
php artisan make:model NomModele -mrc

# Relancer les migrations (⚠️ efface les données)
php artisan migrate:fresh --seed

# Logs en temps réel
tail -f storage/logs/laravel.log
```

---

## Variables d'environnement essentielles

```env
APP_NAME=Corpus
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_DATABASE=corpus

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=

FILESYSTEM_DISK=public
```

---

## Auteur

Projet développé par Coumba et Diorobo — étudiant en cybersécurité & développement web.
Institut Polytechnique Panafricain · Dakar, Sénégal.

---

## Licence

Usage académique et personnel. Tous droits réservés.
