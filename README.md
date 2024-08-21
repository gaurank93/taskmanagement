# Task Management System

## Project Overview

This is a Task Management System built with Laravel. The application allows users to manage tasks with features like user authentication, role-based access control, CRUD operations, and document upload functionality.

## Version

- **Laravel Version**: 10.x
- **PHP Version**: 8.1.x

## Requirements

Before you begin, ensure you have met the following requirements:

- **PHP**: 8.1 or higher
- **Composer**: 2.x
- **Database**: MySQL 5.7+ or MariaDB equivalent
- **Web Server**: Apache or Nginx

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/gaurank93/taskmanagement.git
```
### 2. Install dependencies
```bash
composer install
```
### 3. Run migrations and seed the database
```bash
php artisan migrate --seed
```
### 4. Run migrations and seed the database
```bash
php artisan serve
```
### 5.  Access the application
Open your browser and go to http://localhost:8000.

Document Upload: Users can upload documents related to tasks. Ensure that your storage is correctly linked using:
```bash
php artisan storage:link
```
License
This project is open-source and available under the MIT License.
