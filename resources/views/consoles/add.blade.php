@extends('layouts.admin')

@section('admincontent')
    @include('consoles.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-plus-sign"></i> </span>
                <h5>Add console</h5>
            </div>
            <div class="widget-content nopadding">
                @include('parts.error')
                <form class="form-horizontal" method="POST" action="/admin/consoles">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="controls">
                            <input type="text" class="span12" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/admin/consoles"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
