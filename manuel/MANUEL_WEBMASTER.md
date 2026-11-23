# 🛠️ MANUEL WEBMASTER - PostAir
## Installation & Maintenance

**Version:** 1.0 | **Laravel 12.0** | **PHP 8.2+**

---

## 🏗️ ARCHITECTURE

**Stack:** Laravel 12.0 | PHP 8.2+ | MySQL/SQLite | Vite + Tailwind CSS

---

## 💻 INSTALLATION RAPIDE

```bash
# 1. Cloner & dépendances
git clone <repo> postair && cd postair
composer install && npm install

# 2. Configurer
cp .env.example .env
php artisan key:generate

# 3. Migrer BD
php artisan migrate --force

# 4. Compiler assets
npm run build

# 5. Permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## ⚙️ CONFIGURATION ESSENTIELLE

### .env Principal
```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://postair.com
APP_KEY=base64:xxxxx

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=postair_db
DB_USERNAME=postair_user
DB_PASSWORD=strong_password

CACHE_DRIVER=redis
SESSION_DRIVER=database
LOG_LEVEL=error
```

---

## 👥 GESTION UTILISATEURS

### Créer Admin
```bash
php artisan tinker
>>> $user = new App\Models\User;
>>> $user->name = 'Admin';
>>> $user->email = 'admin@postair.com';
>>> $user->password = bcrypt('SecurePass123!');
>>> $user->save();
>>> exit
```

### Commandes Utiles
```bash
# Modifier password
php artisan tinker
>>> User::find(1)->update(['password' => bcrypt('NewPass')])

# Lister users
>>> User::all(['id','name','email'])

# Supprimer user
>>> User::where('email','user@mail.com')->delete()
```

---

## 🗄️ BASE DE DONNÉES

### Migrations
```bash
php artisan migrate:status        # Lister
php artisan migrate               # Exécuter
php artisan migrate:rollback      # Annuler
php artisan migrate:refresh --seed  # Reset + seed
php artisan make:migration name   # Créer
```

### Fichiers Principaux
- `create_users_table.php` - Utilisateurs
- `create_posts_table.php` - Publications
- `create_cache_table.php` - Cache

---

## 💾 SAUVEGARDES

### Script Automatique
```bash
#!/bin/bash
BACKUP_DIR="/backup/postair"
APP_DIR="/var/www/postair"
DATE=$(date +%Y%m%d_%H%M%S)

mkdir -p $BACKUP_DIR

# Base de données
mysqldump -u user -p db | gzip > $BACKUP_DIR/db_$DATE.sql.gz

# Storage
tar -czf $BACKUP_DIR/storage_$DATE.tar.gz -C $APP_DIR storage/

# Nettoyer (>30j)
find $BACKUP_DIR -type f -mtime +30 -delete
```

### Restaurer
```bash
mysql -u user -p db < backup.sql
tar -xzf storage_backup.tar.gz
```

---

## 🔧 MAINTENANCE

### Quotidien
```bash
tail -f storage/logs/laravel-*.log    # Logs
df -h                                  # Espace disque
systemctl status nginx php8.2-fpm     # Services
```

### Caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Optimisation
```bash
composer dump-autoload -o
php artisan config:cache
php artisan route:cache
npm run build
```

### Tâches Planifiées (cron)
```bash
* * * * * cd /var/www/postair && php artisan schedule:run
```

---

## 🔐 SÉCURITÉ

### Vérifications
```bash
chmod 600 .env                    # Fichier config
chmod 755 storage bootstrap/cache # Répertoires
chown www-data:www-data storage   # Propriétaire

# Permissions
ls -la .env   # Doit être -rw------- (600)
```

### Updates & Audit
```bash
composer audit           # Vérifier vulnérabilités
composer update --lock   # Security patches
npm audit fix            # Dépendances NPM
```

### HTTPS (Let's Encrypt)
```bash
certbot certonly --nginx -d postair.com
# Renouvellement auto: cron à 0 3 * * *
certbot renew --quiet
```

---

## ⚡ PERFORMANCE

### Monitoring
```bash
tail -f storage/logs/laravel-*.log
htop                           # CPU/Mémoire
iostat 1                       # I/O
```

### Optimisations
```bash
# Indexes BD
php artisan make:migration add_indexes_to_posts --table=posts

# Redis (cache/sessions)
REDIS_HOST=127.0.0.1
REDIS_PORT=6379

# Config caching
php artisan config:cache
php artisan route:cache
```

---

## 🐛 TROUBLESHOOTING

| Erreur | Solution |
|--------|----------|
| "App key not set" | `php artisan key:generate` |
| "SQLSTATE[HY000]" | `php artisan migrate --force` + permissions |
| "Class not found" | `composer dump-autoload -o` |
| "Permission denied" | `chmod 755 storage/; chown www-data storage/` |
| "No space left" | `rm -f storage/logs/laravel-*.log.*` |
| Connection slow | Vérifier indexes, activer cache |

---

## 📊 COMMANDES ESSENTIELLES

```bash
php artisan --version            # Version
php artisan serve                # Dev server
php artisan tinker               # Shell PHP
php artisan migrate              # Migrer BD
php artisan db:seed              # Seeders
php artisan cache:clear          # Clear cache
php artisan down --message "..."  # Maintenance
php artisan up                   # Fin maintenance
php artisan optimize             # Optimiser
```

---

## 🚀 CHECKLIST PRODUCTION


- [ ] APP_DEBUG=false dans .env
- [ ] APP_ENV=production dans .env
- [ ] Base de données MySQL configurée et testée
- [ ] SSL/HTTPS (Let's Encrypt) configuré
- [ ] Permissions fichiers correctes
- [ ] Script de sauvegarde automatique en place
- [ ] Email (SMTP) configuré et testé
- [ ] Cron jobs actifs pour scheduled tasks
- [ ] Monitoring et alertes en place
- [ ] Sauvegardes testées et restaurables
- [ ] Performance optimisée (caching, indexes)
- [ ] Audit de sécurité complet
- [ ] Tests unitaires/fonctionnels passés

---

**© 2026 PostAir - Manuel Webmaster**
