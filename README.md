Here's a concise README template for your Laravel and Vue.js project:

---

# Product Management System

## Overview

This project is a Product Management System built using Laravel for the backend and Vue.js for the frontend. It allows users to create and manage products and categories through a web interface and a command line interface (CLI).

## Features

- **Product Management**
    - Create, view, and delete products.
    - Products can belong to multiple categories.
    - Supports image uploads for products.

- **Category Management**
    - Create and delete categories from the command line.
    - Hierarchical category structure with parent-child relationships.

- **Sorting and Filtering**
    - Browse products with sorting options (by name and price).
    - Filter products by categories.

- **Automated Testing**
    - Unit tests for product and category creation.

## Requirements

- PHP >= 8.1
- Laravel >= 10.10
- Composer

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/omartbou/Laravel-vuejs-coding-challenge
   ```

2. Navigate to the project directory:
   ```bash
   cd Laravel-vuejs-coding-challenge
   ```

3. Install PHP dependencies:
   ```bash
   composer install
   ```

4. Install Node.js dependencies:
   ```bash
   npm install
   ```

5. Set up the environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

6. Configure your database in the `.env` file.

7. Run migrations:
   ```bash
   php artisan migrate
   ```

8. Seed the database (optional):
   ```bash
   php artisan db:seed
   ```

9. Start the local development server:
   ```bash
   php artisan serve
   ```

10. Run the frontend build:
    ```bash
    npm run dev
    ```

## Usage

- Access the application at `http://127.0.0.1:8000`.
- Use the command line to create and delete categories:
  ```bash
  php artisan category:create "Category Name"
  php artisan category:delete 1
  ```

## Running Tests

To run the automated tests, use the following command:

```bash
php artisan test
```

## Running Commands

php artisan category:create "Category Name"
php artisan product:create "Product Name" "Product Description" <price> <path_to_image> 
php artisan category:delete "Category ID"
php artisan product:create "Product ID"



---
