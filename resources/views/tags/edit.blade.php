@extends('layouts.admin')

@section('admincontent')
    @include('tags.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                <h5>Add tag</h5>
            </div>
            <div class="widget-content nopadding">
                @include('parts.error')
                <form class="form-horizontal" method="POST" action="/admin/tags/{{ $id }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="controls">
                            <input type="text" class="span12" id="name" name="name" placeholder="Name" value="{{ $name }}">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/admin/tags"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
