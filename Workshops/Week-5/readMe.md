
# Laravel Posts Application - Week 5 Enhancements

This `README` documents the enhancements made to the Laravel Posts application during Week 5. The focus for this week was on introducing search functionality and custom pagination to improve user interaction and application scalability.

## Enhancements Overview

1. **Search Functionality**: Allows users to search for posts by keywords in the titles or content.
2. **Pagination**: Implements custom pagination to manage the display of posts, making the application scalable as the number of posts grows.

## Technical Details

### Search Functionality

- **Implementation**: Added a filter in the `index` method of the `PostController` that checks for a `search` query parameter and filters posts based on this parameter.
- **Difficulty**: Managing the search functionality to work seamlessly with pagination presented some challenges, particularly ensuring that search results are correctly paginated.

### Pagination

- **Implementation**: Custom pagination was implemented to handle the slicing of posts directly from a cached collection, allowing for effective page-by-page navigation.
- **Difficulty**: Customizing pagination to work with in-memory data (using Laravel's Cache) instead of database-driven data proved challenging. Ensuring that pagination links correctly reflected the state of the current page and search filters required careful management of collection transformations.

## Code Structure

- **Controller**: The `PostController` contains all the logic for fetching, filtering, and paginating posts.
- **Blade Files**: Views are managed in the `resources/views/posts` directory, with separate Blade files for listing posts (`index.blade.php`), creating new posts (`create.blade.php`), and editing existing posts (`edit.blade.php`).

## Project Setup

### Requirements

- PHP >= 7.3
- Composer
- Laravel >= 8.x

### Installation

1. **Download Code Files and Add them to Specific folders**
  - Add `routes/web.php` to `routes` folder as it will contain the routes for site
  - Add `posts/files` to `resources/views/posts` as they will be the views of site
  - Add `PostController.php` to `app/Http/Controllers/PostController.php` as it will be the main controller of the website

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
- **Pagination** is done on same page at `/posts`.
- **Search** is done main page at `/posts`.

## Code Structure

- **Routes**: Defined in `routes/web.php`, manage the web requests to various CRUD operations.
- **Controller**: `App\Http\Controllers\PostController` contains the logic for handling all CRUD actions.
- **Views**: Located in `resources/views/posts`, these Blade templates provide the user interface for CRUD operations.
