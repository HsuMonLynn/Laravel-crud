<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Categories</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>@foreach($post->categories as $category){{ $category->name }} | @endforeach</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>