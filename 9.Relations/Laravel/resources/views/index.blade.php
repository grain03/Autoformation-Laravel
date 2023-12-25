<!-- index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>

    <label for="category">Filter by Category:</label>
    <select id="category">
        <option value="">All</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <label for="category">Filter by Tag:</label>
    <select id="category">
        <option value="">All</option>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    <button onclick="filterPosts()">Filter</button>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Tag</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function filterPosts() {
            var category = document.getElementById("category").value;
            // Perform filtering logic here
        }
    </script>
</body>
</html>