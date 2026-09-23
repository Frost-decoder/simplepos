# SimplePOS Database Version

SimplePOS is a CodeIgniter 4 application that displays customer and user records from a MySQL database using Models and Query Builder.

## Features

- Four working pages
- MySQL database connection
- CustomerModel and UserModel
- Records retrieved using `findAll()`
- Responsive customer and user tables

## Database

- Database name: `simplepos_db`
- Tables: `customers` and `users`
- SQL export: `database_export/simplepos_db.sql`

## Local Installation

1. Install PHP, Composer, XAMPP, and CodeIgniter 4.
2. Copy the project into `C:\xampp\htdocs`.
3. Start MySQL in the XAMPP Control Panel.
4. Open phpMyAdmin.
5. Import `database_export/simplepos_db.sql`.
6. Copy `env` and rename the copy to `.env`.
7. Configure `.env` with:

```ini
database.default.hostname = localhost
database.default.database = simplepos_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306