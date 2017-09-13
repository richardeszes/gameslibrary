@extends(Request::segment(1)=="admin" ? 'layouts.admin' : 'layouts.public')

@section('content')
    <a href="/games">< Back to the list</a>
    <h1>{{ $title }}</h1>
    <table>
        <tr>
            <th>Console</th>
            <td><a href='/consoles/{{ $console['id'] }}'>{{ $console['name'] }}</a></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><a href='/categories/{{ $category['id'] }}'>{{ $category['name'] }}</a></td>
        </tr>
        <tr>
            <th>Published at</th>
            <td>{{ $published }}</td>
        </tr>
        <tr>
            <th>Publisher</th>
            <td><a href='/publishers/{{ $publisher['id'] }}'>{{ $publisher['name'] }}</a></td>
        </tr>
        <tr>
            <th>Url</th>
            <td>@if ($url) <a href='{{ $url }}' target='_blank'>{{ $url }}</a> @endif</td>
        </tr>
        <tr>
            <th>Cover image</th>
            <td>@if($coverimage)
                <img src="/uploads/{{ $coverimage }}">
            @endif</td>
        </tr>
        <tr>
            <th>Meta Game Score</th>
            <td>{{ $metagamescore }}</td>
        </tr>
        <tr>
            <th>Tags</th>
            <td>@foreach ($tags as $tag)
                <a href="/tags/{{ $tag['id'] }}"><span class='tag'>{{ $tag['name'] }}</span></a>
            @endforeach</td>
        </tr>
    </table>
    <style>
        .tag {
            background-color: #CCC;
            border-radius: 3px;
            padding: 5px;
            display: inline-block;
        }

        table {
            width: 100%;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }
    </style>
@endsection
