# NSUK AI Chatbot - Deployment Checklist

## ✅ **Pre-Deployment Checklist**

### **1. Environment Configuration**

- [ ] `.env` file created from `.env.example`
- [ ] `CHATBASE_API_KEY` set to: `0bad557c-187f-482d-a5c4-a208f5fa6497`
- [ ] `CHATBASE_CHATBOT_ID` set to: `n0-Qe4suEVbJZBZYU4zG2`
- [ ] `APP_KEY` generated (`php artisan key:generate`)
- [ ] `APP_ENV` set to `production`
- [ ] `APP_DEBUG` set to `false`
- [ ] Database credentials configured
- [ ] NSUK contact information updated

### **2. Dependencies**

- [ ] PHP 8.2+ installed
- [ ] Composer dependencies installed (`composer install --optimize-autoloader --no-dev`)
- [ ] Node.js dependencies installed (`npm install`)
- [ ] Production assets built (`npm run build`)

### **3. Database**

- [ ] Database created
- [ ] Migrations run (`php artisan migrate --force`)
- [ ] Database seeded (`php artisan db:seed --force`)
- [ ] Database connection tested

### **4. Caching & Optimization**

```bash
# Run these commands
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

- [ ] Configuration cached
- [ ] Routes cached
- [ ] Views cached
- [ ] Events cached

### **5. Security**

- [ ] `.env` file not in version control
- [ ] `.gitignore` properly configured
- [ ] File permissions set correctly (755 for directories, 644 for files)
- [ ] Storage directory writable (`chmod -R 775 storage`)
- [ ] Bootstrap cache writable (`chmod -R 775 bootstrap/cache`)
- [ ] HTTPS enabled (if applicable)
- [ ] CSRF protection enabled

### **6. Testing**

- [ ] Test greeting: "hello"
- [ ] Test database question: "when was nsuk established"
- [ ] Test Chatbase question: "what are the admission requirements"
- [ ] Test user registration
- [ ] Test user login
- [ ] Test chat history
- [ ] Test new chat creation
- [ ] Test mobile responsiveness

---

## 🚀 **Deployment Steps**

### **Step 1: Prepare Application**

```bash
# Clone repository
git clone <repository-url>
cd nsuk-ai

# Install dependencies
composer install --optimize-autoloader --no-dev
npm install
npm run build

# Set up environment
cp .env.example .env
nano .env  # Edit with your settings
php artisan key:generate
```

### **Step 2: Configure Environment**

Edit `.env` file:

```env
APP_NAME="NSUK AI Chatbot"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nsuk_ai
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

CHATBASE_API_KEY=0bad557c-187f-482d-a5c4-a208f5fa6497
CHATBASE_CHATBOT_ID=n0-Qe4suEVbJZBZYU4zG2

NSUK_CONTACT_NUMBER="+234-XXX-XXX-XXXX"
NSUK_SUPPORT_EMAIL="support@nsuk.edu.ng"
NSUK_WEBSITE="https://nsuk.edu.ng"
```

### **Step 3: Set Up Database**

```bash
# Run migrations
php artisan migrate --force

# Seed database
php artisan db:seed --force
```

### **Step 4: Optimize Application**

```bash
# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Optimize autoloader
composer dump-autoload --optimize
```

### **Step 5: Set Permissions**

```bash
# Set ownership (adjust user/group as needed)
sudo chown -R www-data:www-data storage bootstrap/cache

# Set permissions
sudo chmod -R 775 storage bootstrap/cache
```

### **Step 6: Configure Web Server**

#### **Apache (.htaccess)**

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

#### **Nginx**

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/nsuk-ai/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### **Step 7: SSL Certificate (Optional but Recommended)**

```bash
# Using Certbot for Let's Encrypt
sudo certbot --nginx -d your-domain.com
```

### **Step 8: Set Up Supervisor (for Queue Workers)**

Create `/etc/supervisor/conf.d/nsuk-ai.conf`:

```ini
[program:nsuk-ai-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /path/to/nsuk-ai/artisan queue:work --sleep=3 --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/path/to/nsuk-ai/storage/logs/worker.log
```

Then:

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start nsuk-ai-worker:*
```

---

## 🔍 **Post-Deployment Verification**

### **1. Application Health**

- [ ] Homepage loads correctly
- [ ] Login page accessible
- [ ] Registration working
- [ ] Dashboard accessible after login

### **2. Chatbot Functionality**

- [ ] Greeting responses work
- [ ] Database search returns correct answers
- [ ] Chatbase AI responds correctly
- [ ] Conversation context maintained
- [ ] Chat history saves properly

### **3. Performance**

- [ ] Page load time < 3 seconds
- [ ] Chatbase API response time < 5 seconds
- [ ] Database queries optimized
- [ ] No console errors

### **4. Security**

- [ ] HTTPS enabled
- [ ] API keys not exposed
- [ ] CSRF protection working
- [ ] Authentication required for chat routes
- [ ] No sensitive data in logs

### **5. Monitoring**

- [ ] Error logs accessible
- [ ] Application logs working
- [ ] Disk space sufficient
- [ ] Database backups configured

---

## 📊 **Monitoring & Maintenance**

### **Log Locations**

```
storage/logs/laravel.log          # Application logs
storage/logs/worker.log           # Queue worker logs
/var/log/nginx/error.log          # Nginx errors
/var/log/nginx/access.log         # Nginx access
```

### **Regular Maintenance Tasks**

```bash
# Clear old logs (weekly)
php artisan log:clear

# Optimize database (monthly)
php artisan optimize:clear
php artisan optimize

# Update dependencies (as needed)
composer update
npm update

# Backup database (daily)
php artisan backup:run
```

### **Monitoring Commands**

```bash
# Check application status
php artisan about

# Check queue status
php artisan queue:monitor

# Check failed jobs
php artisan queue:failed

# View real-time logs
tail -f storage/logs/laravel.log
```

---

## 🚨 **Rollback Plan**

If deployment fails:

```bash
# 1. Restore previous version
git checkout previous-tag

# 2. Restore database backup
mysql nsuk_ai < backup.sql

# 3. Clear caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 4. Restart services
sudo systemctl restart nginx
sudo systemctl restart php8.2-fpm
```

---

## 📞 **Support Contacts**

- **Technical Issues**: tech@nsuk.edu.ng
- **Chatbase Support**: support@chatbase.co
- **Laravel Issues**: Check logs and documentation

---

## 🎉 **Deployment Complete!**

Once all items are checked:

1. ✅ Application is live
2. ✅ All features tested
3. ✅ Monitoring in place
4. ✅ Backups configured
5. ✅ Team notified

**Your NSUK AI Chatbot is now ready to serve students and staff!** 🚀

---

**Last Updated**: November 2024
