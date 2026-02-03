# Project Overview #
This is a simple Laravel backend application to manage Authors and their Books.
It includes CRUD operations, one‑to‑many relationship, request validation, and image upload for books using Laravel’s storage system.
-------------------------------------------------------------------------------------------------------
# Features #
Author CRUD (Create, Read, Update, Delete)

Book CRUD with image upload

One Author → Many Books relationship

Form validation

Bootstrap UI

Image upload & preview

Clean MVC structure
------------------------------------------------------------------------------------------
# Setup Instructions #
git clone https://github.com/kanyasalve/book-author-management.git
cd book-author-management
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve
----------------------------------------------------------------------------
# Open in browser #

http://127.0.0.1:8000/authors
http://127.0.0.1:8000/books

