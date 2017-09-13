@extends('layouts.admin')

@section('admincontent')
    @include('publisher.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                <h5>Edit publisher</h5>
            </div>
            <div class="widget-content nopadding">
                @include('parts.error')
                <form class="form-horizontal" method="POST" action="/admin/publishers/{{ $id }}">
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
                        <a href="/admin/publishers"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
