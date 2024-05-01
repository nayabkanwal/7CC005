<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
</head>
<body>
@if($post)
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
@else
    <p>Post not found.</p>
@endif
<a href="{{ route('posts.index') }}">Back to Posts</a>
</body>
</html>
