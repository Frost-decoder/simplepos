# SimplePOS

A CodeIgniter 4 POS foundation using a MySQL database.

## Features

- View customer and user records
- Add and edit customers
- Add and edit users
- Form validation
- JPG and PNG avatar uploads up to 2 MB
- Login and logout
- Secure password hashing
- Session-based authentication
- Protected pages
- CSRF protection

## Requirements

- XAMPP
- PHP
- MySQL
- Composer

## Setup

1. Place the project inside `C:\xampp\htdocs`.
2. Start Apache and MySQL in XAMPP.
3. Import `database_export/simplepos_db.sql` in phpMyAdmin.
4. Configure the `.env` database settings:

```ini
database.default.hostname = localhost
database.default.database = simplepos_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

5. Run the database commands:

```bash
php spark migrate
php spark db:seed UserPasswordSeeder
```

6. Start the application:

```bash
php spark serve
```

7. Open `http://localhost:8080/login`.

## Test Account

- Username: `admin01`
- Password: `Staff123!`