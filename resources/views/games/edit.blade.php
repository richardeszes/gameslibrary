@extends('layouts.admin')

@section('admincontent')
    @include('games.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                <h5>Edit game</h5>
            </div>
            <div class="widget-content nopadding">
                @include('parts.error')
                <form class="form-horizontal" method="POST" action="/admin/games/{{ $game->id }}" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="controls">
                            <input type="text" class="span12" id="title" name="title" placeholder="Title" value="{{ $game->title }}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="category_id" class="col-sm-2 control-label">Category</label>
                        <div class="controls">
                            <select class="span12" id="category_id" name="category_id">
                                <option value=''>(please select)</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id==$game->category_id)
                                            selected
                                        @endif
                                    >{{ $category->name }}</option>
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
                                    <option value="{{ $console->id }}"
                                        @if ($console->id==$game->console_id)
                                            selected
                                        @endif
                                    >{{ $console->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="published" class="col-sm-12 control-label">Published at</label>
                        <div class="controls">
                            <input type="text" class="span12" id="published" name="published" placeholder="Published at (YYYY-MM-DD)" value="{{ $game->published }}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="publisher_id" class="col-sm-12 control-label">Publisher</label>
                        <div class="controls">
                            <select class="span12" id="publisher_id" name="publisher_id">
                                <option value=''>(please select)</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}"
                                        @if ($publisher->id==$game->publisher_id)
                                            selected
                                        @endif
                                    >{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="url" class="col-sm-12 control-label">URL</label>
                        <div class="controls">
                            <input type="text" class="span12" id="url" name="url" placeholder="URL" value="{{ $game->url }}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="coverimage" class="col-sm-12 control-label">Cover image</label>
                        <div class="controls">
                            @if($game->coverimage)
                                <img src="/uploads/{{ $game->coverimage }}">
                            @endif
                            <input type="file" class="span12" id="coverimage" name="coverimage" placeholder="Cover image" value="{{ $game->coverimage }}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="metagamescore" class="col-sm-12 control-label">Meta Game Score</label>
                        <div class="controls">
                            <input type="text" class="span12" id="metagamescore" name="metagamescore" placeholder="Meta Game Score" value="{{ $game->metagamescore }}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="tags" class="col-sm-12 control-label">Tags</label>
                        <div class="controls">
                            <select id="tags" name="tags[]" multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        @foreach ($game->tags as $cur_tag)
                                            @if ($cur_tag->id == $tag->id)
                                                selected
                                            @endif
                                        @endforeach
                                    >{{ $tag->name }}</option>
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
