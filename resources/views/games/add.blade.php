@extends('layouts.admin')

@section('admincontent')
    @include('games.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-plus-sign"></i> </span>
                <h5>Add game</h5>
            </div>
            <div class="widget-content nopadding">
                @include('parts.error')
                <form class="form-horizontal" method="POST" action="/admin/games" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="controls">
                            <input type="text" class="span12" id="title" name="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="category_id" class="col-sm-2 control-label">Category</label>
                        <div class="controls">
                            <select class="span12" id="category_id" name="category_id">
                                <option value=''>(please select)</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="console_id" class="col-sm-2 control-label">Console</label>
                        <div class="controls">
                            <select class="span12" id="console_id" name="console_id">
                                <option value=''>(please select)</option>
                                @foreach ($consoles as $console)
                                    <option value="{{ $console->id }}">{{ $console->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="published" class="col-sm-2 control-label">Published at</label>
                        <div class="controls">
                            <input type="text" class="span12" id="published" name="published" placeholder="Published at (YYYY-MM-DD)">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="publisher_id" class="col-sm-2 control-label">Publisher</label>
                        <div class="controls">
                            <select class="span12" id="publisher_id" name="publisher_id">
                                <option value=''>(please select)</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="url" class="col-sm-2 control-label">URL</label>
                        <div class="controls">
                            <input type="text" class="span12" id="url" name="url" placeholder="URL">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="coverimage" class="col-sm-2 control-label">Cover image</label>
                        <div class="controls">
                            <input type="file" class="span12" id="coverimage" name="coverimage" placeholder="Cover image">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="metagamescore" class="col-sm-2 control-label">Meta Game Score</label>
                        <div class="controls">
                            <input type="text" class="span12" id="metagamescore" name="metagamescore" placeholder="Meta Game Score">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="tags" class="col-sm-12 control-label">Tags</label>
                        <div class="controls">
                            <select id="tags" name="tags[]" multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/admin/games"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('adminbeforefooter')
    <script>
        $(document).ready(function () {
            $("#tags").select2({
                tags: true
            });
        });
    </script>
@endsection
