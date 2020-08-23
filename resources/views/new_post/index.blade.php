<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Posts</title>
</head>
<body>
    <table>
        @foreach($newPosts as $newPost)
            <tr>
                <td> {{ $newPost->active }}</td>
                <td> {{ $newPost->title }}</td>
            </tr>
        @endforeach
    </table>

    {{ $newPosts->appends(request()->input())->links() }}
</body>
</html>