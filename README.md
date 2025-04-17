# ExpenseTracker

A simple and functional personal expense tracker web application built with Laravel (API backend), Blade views (frontend), and Docker for containerization. This application uses Laravel Sanctum for secure token-based API authentication and allows users to track their expenses, categorize them, and visualize their spending.

# Features

1.User authentication (register, login, logout, password reset) via Laravel Sanctum
2.Add, edit, view and delete expenses
3.Add, edit, view and delete categories
4.Categorize expenses
5.Filter expenses by category and date
6.View expense analytics with pie/bar charts
7.RESTful API endpoints for all data operations
8.Responsive UI using Laravel Blade & Axios
9.Dockerized environment for consistent setup

# Tech Stack

1.Backend: Laravel 11.0 (API driven)
2.Frontend: Laravel Blade + Axios + Chart.js
3.Authentication: Laravel Sanctum
4.Database: MySQL
5.Containerization: Docker & Docker Compose

# Authentication with Sanctum

This project uses Laravel Sanctum to authenticate users via API tokens. After logging in, a token is returned, which must be included in the Authorization header for all protected API requests:

     Authorization: Bearer YOUR_ACCESS_TOKEN

## Installation

# Laravel 11.0 : use the below command for creating a laravel project

    composer create-project laravel/laravel:^11.0 ExpenseTracker

# Git : Clone the repository

Create a repository in git and clone it with the laravel folder as below.

        git clone git@github.com:anumohanonline97/ExpenseTracker.git
        cd ExpenseTracker

# Environment Setup

Copy .env.example to .env:

    cp .env.example .env

Update the .env values for database, Sanctum config, and app URL.

# Build and Run with Docker

I have manually included the ngnix, php folders and Dockerfile, docker-compose.yml files for dockerization.
Run the following command to build with docker.

    docker-compose up -d --build

# Install Laravel Dependencies & Run Migrations

    docker exec -it expense_app composer install
    docker exec -it expense_app php artisan key:generate
    docker exec -it expense_app php artisan migrate
    docker exec -it expense_app php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# Seeder Test data 

Run the following command to refresh the migartions and populate the table with test data using seeders in laravel.

    docker exec -it expense_app php artisan migrate:fresh --seed

# Sanctum Configuration Notes

Ensure SANCTUM_STATEFUL_DOMAINS in .env includes your app’s domain

Sanctum middleware is used in api.php routes, in laravel 11.0 there is no api.php so I have run the following command to get that inside the docker container in bash.

    php artisan install:api

Protected routes are grouped inside this middleware 

    Route::middleware('auth:sanctum')->group(function () {
    });

# How to run the app

1. Visit http://localhost:8082
2. Register a new account or log in with seeder data
3. Add expenses and categorize them
4. Filter expenses and view analytics

# API Endpoints

    ## Authentication not required

        POST	/api/signup	            Register	
        POST	/api/login	            Login (returns token)

    ## Authentication required

        POST	/api/logout	                      Logout	
        POST	/api/passwordreset	              Reset password
        GET	    /api/categories	                  List all categories
        POST	/api/categories	                  Add new category
        PUT	    /api/categories/{id}	          Update category
        DELETE	/api/categories/{id}	          Delete category
        GET	    /api/expenses	                  List expenses
        POST	/api/expenses	                  Add expense
        GET	    /api/expenses/{id}	              Show single expense
        PUT	    /api/expenses/{id}	              Update expense
        DELETE	/api/expenses/{id}	              Delete expense
        GET	    /api/expenses/filter	          Filter by category/date
        GET	    /api/expenses/analytics	          Summary chart data	

# Author

Anu Mohan
GITHUB : anumohanonline97
Email  : anumohanonline97@gmail.com







