@extends(Request::segment(1)=="admin" ? 'layouts.admin' : 'layouts.public')

@section('admincontent')
    @include('consoles.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>List of consoles</h5>
            </div>
            <div class="widget-content nopadding">
                @include('parts.error')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consoles as $console)
                        <tr>
                            <td>{{ $console->name }}</td>
                            <td><a href="/admin/consoles/{{ $console->id }}/edit">Edit</a> | <a href="#" onclick="removeCategory('{{ $console->id }}');">Delete</a></td>
                        </tr>
                        @endforeach
                    </body>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="remove-console">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>
@endsection

@section('adminbeforefooter')
    <script>
        function removeCategory(id) {
            if (confirm("Are you sure?")) {
                $("#remove-console").attr('action', '/admin/consoles/'+id);
                $("#remove-console").submit();
            }
        }
    </script>
@endsection
