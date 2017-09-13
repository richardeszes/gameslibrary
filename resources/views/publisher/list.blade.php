@extends(Request::segment(1)=="admin" ? 'layouts.admin' : 'layouts.public')

@section('admincontent')
    @include('publisher.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>List of publishers</h5>
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
                        @foreach ($publishers as $publisher)
                        <tr>
                            <td>{{ $publisher->name }}</td>
                            <td><a href="/admin/publishers/{{ $publisher->id }}/edit">Edit</a> | <a href="#" onclick="removeCategory('{{ $publisher->id }}');">Delete</a></td>
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
    <form method="POST" action="" id="remove-publisher">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>
@endsection

@section('adminbeforefooter')
    <script>
        function removeCategory(id) {
            if (confirm("Are you sure?")) {
                $("#remove-publisher").attr('action', '/admin/publishers/'+id);
                $("#remove-publisher").submit();
            }
        }
    </script>
@endsection
