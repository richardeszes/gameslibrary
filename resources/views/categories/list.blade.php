@extends(Request::segment(1)=="admin" ? 'layouts.admin' : 'layouts.public')

@section('admincontent')
    @include('categories.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>List of categories</h5>
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
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><a href="/admin/categories/{{ $category->id }}/edit">Edit</a> | <a href="#" onclick="removeCategory('{{ $category->id }}');">Delete</a></td>
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
    <form method="POST" action="" id="remove-category">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>
@endsection

@section('adminbeforefooter')
    <script>
        function removeCategory(id) {
            if (confirm("Are you sure?")) {
                $("#remove-category").attr('action', '/admin/categories/'+id);
                $("#remove-category").submit();
            }
        }
    </script>
@endsection
