<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
<h1>Create a New Post</h1>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" required><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content" required></textarea><br>
    <button type="submit">Create Post</button>
</form>
<a href="{{ route('posts.index') }}">Back to Posts</a>
</body>
</html>
