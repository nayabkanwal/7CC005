<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
<h1>Edit Post</h1>
<form method="POST" action="{{ route('posts.update', $post['id']) }}">
    @csrf
    @method('PUT')
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" value="{{ $post['title'] }}" required><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content" required>{{ $post['content'] }}</textarea><br>
    <button type="submit">Update Post</button>
</form>
<a href="{{ route('posts.index') }}">Back to Posts</a>
</body>
</html>
