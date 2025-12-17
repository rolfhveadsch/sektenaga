# Sekte Naga Management System

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.4-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MYSQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

**Modern School Management System**

[Demo](#) • [Documentation](INSTALLATION_GUIDE.md) • [Quick Start](QUICK_START.md)

</div>

---

## 🚀 Quick Start

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySql

### Installation

1. **Clone repository**
```bash
git clone https://github.com/rolfhveadsch/sektenaga
cd sektenaga
```

2. **Install dependencies**
```bash
composer install
composer require yajra/laravel-datatables-oracle
npm install
npm install alpinejs
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Create database**
```bash
Open phpMyAdmin, then create a new database according to the database name (DB_DATABASE=) in .env
```

5. **Run migrations & seeders**
```bash
php artisan migrate
php artisan db:seed
```

6. **Build assets**
```bash
npm run build
```

7. **Start server**
```bash
php artisan serve
```

8. **Login**
- URL: http://localhost:8000
- Email: `admin@school.com`
- Password: `password`
