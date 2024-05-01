<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function __construct()
    {
        Cache::rememberForever('posts', function () {
            return collect([
                ['id' => 1, 'title' => 'Introduction to Laravel', 'content' => 'Content of Laravel introduction'],
                ['id' => 2, 'title' => 'Advanced Laravel', 'content' => 'Content of advanced Laravel topics']
            ]);
        });
    }

    public function index(Request $request)
    {
        $posts = Cache::get('posts');

        // Handle search functionality
        if ($search = $request->input('search')) {
            $posts = $posts->filter(function ($post) use ($search) {
                return stripos($post['title'], $search) !== false || stripos($post['content'], $search) !== false;
            });
        }

        // Custom pagination logic
        $perPage = 2; // Number of items per page
        $currentPage = $request->input('page', 1); // Default to first page
        $currentItems = $posts->slice(($currentPage - 1) * $perPage, $perPage)->values();

        // Create a paginator
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentItems,
            $posts->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        return view('posts.index', ['posts' => $paginator]);
    }



    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $newPost = $request->only(['title', 'content']);
        $newPost['id'] = Cache::get('posts')->max('id') + 1;

        $posts = Cache::get('posts')->push($newPost);
        Cache::put('posts', $posts);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Cache::get('posts')->firstWhere('id', $id);
        if (!$post) {
            return abort(404, 'Post not found');
        }
        return view('posts.show', ['post' => $post]);
    }


    public function edit($id)
    {
        $post = Cache::get('posts')->firstWhere('id', $id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        // Fetch the existing collection of posts from the cache
        $posts = Cache::get('posts');

        // Initialize a flag to check if the post is updated
        $updated = false;

        // Map through the posts to find and update the specific post
        $updatedPosts = $posts->map(function ($post) use ($id, $request, &$updated) {
            if ($post['id'] == $id) {
                $updated = true;  // Set the flag to true as the post is found and being updated
                return [
                    'id' => $post['id'],
                    'title' => $request->input('title', $post['title']),  // Using input method to fetch data
                    'content' => $request->input('content', $post['content'])
                ];
            }
            return $post;
        });

        if ($updated) {
            // Re-save the updated collection to the cache
            Cache::put('posts', $updatedPosts);
            // Logging the newly updated post for debugging
            \Log::info('Updated post:', ['post' => $updatedPosts->firstWhere('id', $id)]);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return redirect()->route('posts.show', ['id' => $id]);
    }


    public function destroy($id)
    {
        $posts = Cache::get('posts');
        $posts = $posts->reject(function ($p) use ($id) {
            return $p['id'] == $id;
        });
        Cache::put('posts', $posts);

        return redirect()->route('posts.index');
    }
}
