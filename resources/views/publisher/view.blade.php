@extends(Request::segment(1)=="admin" ? 'layouts.admin' : 'layouts.public')

@section('content')
    <a href="{{ url()->previous() }}">< Back</a>
    <h1>{{ $name }} games</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Link</th>
        </tr>
        @foreach ($games as $game)
        <tr>
            <td>{{ $game['title'] }}</td>
            <td><a href='/games/{{ $game['id'] }}'>View datasheet</a></td>
        </tr>
        @endforeach
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
