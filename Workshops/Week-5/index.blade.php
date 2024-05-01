<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <style>
        body {
            padding: 20px;
        }
        .pagination {
            font-size: 14px;
            display: flex;
            flex-direction: row;
        }
        .pagination li a {
            color: black; /* Color for pagination links */
        }
        .pagination .page-link {
            padding: 0.5rem 0.75rem; /* Adjust padding for pagination links */
        }
    </style>

</head>

<body>
<h1>Posts</h1>

<!-- Search form -->
<form action="{{ route('posts.index') }}" method="GET">
    <input type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<ul>
    @foreach ($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post['id']) }}">{{ $post['title'] }}</a>
            - <a href="{{ route('posts.edit', $post['id']) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<!-- Pagination Links -->
<div class="pagination">
    {{ $posts->links() }}
</div>

<a href="{{ route('posts.create') }}">Create Post</a>

</body>
</html>
