
# Laravel In-Memory CRUD Application

This repository contains a Laravel project that implements a simple CRUD (Create, Read, Update, Delete) application for posts, utilizing Laravel's caching mechanism to simulate database operations in memory. This approach is especially useful for demonstration, educational purposes, or prototyping without the need for a persistent database.

## Overview

The application allows users to perform CRUD operations on "posts" where each post consists of a title and content. All data is stored temporarily in Laravel's cache, making it volatile but suitable for development and testing scenarios.

## Features

- **Create Posts**: Users can add new posts.
- **Read Posts**: Users can view all posts.
- **Update Posts**: Users can edit existing posts.
- **Delete Posts**: Users can remove posts.
- **In-Memory Storage**: All CRUD operations are performed on a temporary in-memory store using Laravel's cache.

## Project Setup

### Requirements

- PHP >= 7.3
- Composer
- Laravel >= 8.x

### Installation

1. **Clone the Repository**
   ```bash
   git clone https://nayabkanwal/7CC005/new/main/Workshops/Week-4.git
   cd your-project-directory
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Start the Laravel Development Server**
   ```bash
   php artisan serve
   ```
   This will start the server at `http://localhost:8000`.

### Configurations

No database configurations are needed as all data is handled via Laravel's cache. Ensure the cache configuration in `config/cache.php` is suitable for your environment.

## Usage

Once the server is running, you can navigate to `http://localhost:8000/posts` to start interacting with the application.

- **Creating a Post**: Go to `/posts/create`.
- **Viewing All Posts**: Visit `/posts`.
- **Editing a Post**: Click on 'Edit' next to any post at `/posts`.
- **Deleting a Post**: Click on 'Delete' next to any post at `/posts`.

## Code Structure

- **Routes**: Defined in `routes/web.php`, manage the web requests to various CRUD operations.
- **Controller**: `App\Http\Controllers\PostController` contains the logic for handling all CRUD actions.
- **Views**: Located in `resources/views/posts`, these Blade templates provide the user interface for CRUD operations.
