@extends(Request::segment(1)=="admin" ? 'layouts.admin' : 'layouts.public')

@section('content')
    <h1>List of games</h1>
    <div class="col-md-12 text-right">
        <span data-toggle="collapse" data-target="#filters" id="toggle-filters">Toggle filters</span>
    </div>
    <div class="col-md-12 panel-collapse collapse" id="filters">
        <form class="form-inline">
            <div class="col-md-8">
                <h2>Filters</h2>
                <div class="form-group">
                    <label for="search_title">Title:&nbsp;</label>
                    <input type="text" class="form-control" id="search_title" name="search_title" placeholder="Title" value="{{ request('search_title') }}">
                </div>
                <div class="form-group">
                    <label for="search_published">Published at:&nbsp;</label>
                    <input type="text" class="form-control" id="search_published" name="search_published" placeholder="Title" value="{{ request('search_published') }}">
                </div>
                <div class="form-group">
                    <label for="search_publisher">Publisher:&nbsp;</label>
                    <select class="form-control" id="search_publisher" name="search_publisher">
                        <option value=''>(all)</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}"
                                @if ($publisher->id==request('search_publisher'))
                                    selected
                                @endif
                            >{{ $publisher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="search_category">Category:&nbsp;</label>
                    <select class="form-control" id="search_category" name="search_category">
                        <option value=''>(all)</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if ($category->id==request('search_category'))
                                    selected
                                @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="search_console">Console:&nbsp;</label>
                    <select class="form-control" id="search_console" name="search_console">
                        <option value=''>(all)</option>
                        @foreach ($consoles as $console)
                            <option value="{{ $console->id }}"
                                @if ($console->id==request('search_console'))
                                    selected
                                @endif
                            >{{ $console->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="search_tag">Tag:&nbsp;</label>
                    <select class="form-control" id="search_tag" name="search_tag">
                        <option value=''>(all)</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                @if ($tag->id == request('search_tag'))
                                    selected
                                @endif
                            >{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <h2>Ordering</h2>
                <div class="form-group">
                    <label for="order_by">Order by:&nbsp;</label>
                    <select class="form-control" id="order_by" name="order_by">
                        <option value=''>(none)</option>
                        <option value='title.asc' @if (request('order_by')=='title.asc') selected @endif>Title (asc)</option>
                        <option value='title.desc' @if (request('order_by')=='title.desc') selected @endif>Title (desc)</option>
                        <option value='console_id.asc' @if (request('order_by')=='console_id.asc') selected @endif>Console (asc)</option>
                        <option value='console_id.desc' @if (request('order_by')=='console_id.desc') selected @endif>Console (desc)</option>
                        <option value='published.asc' @if (request('order_by')=='published.asc') selected @endif>Published at (asc)</option>
                        <option value='published.desc' @if (request('order_by')=='published.desc') selected @endif>Published at (desc)</option>
                        <option value='publisher_id.asc' @if (request('order_by')=='publisher_id.asc') selected @endif>Publisher (asc)</option>
                        <option value='publisher_id.desc' @if (request('order_by')=='publisher_id.desc') selected @endif>Publisher (desc)</option>
                        <option value='metagamescore.asc' @if (request('order_by')=='metagamescore.asc') selected @endif>Meta Game Score (asc)</option>
                        <option value='metagamescore.desc' @if (request('order_by')=='metagamescore.desc') selected @endif>Meta Game Score (desc)</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-actions text-right">
                    <button type="submit" class="btn btn-success">Apply</button>
                    <a href="#" onclick="resetSearch();"><button type="button" class="btn btn-danger">Reset</button></a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <table id="gameslist" class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Console</th>
                    <th>Pub. at</th>
                    <th>Publisher</th>
                    <th>MGS</th>
                    <th>Links</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                <tr>
                    <td>{{ $game->title }}</td>
                    <td>@if ($game->console) {{ $game->console->name }} @endif</td>
                    <td>{{ $game->published }}</td>
                    <td>@if ($game->publisher) {{ $game->publisher->name }} @endif</td>
                    <td>{{ $game->metagamescore }}</td>
                    <td>@if ($game->url) <a href="{{ $game->url }}" target="_blank">Game's link</a> | @endif <a href="/games/{{ $game->id }}">View datasheet</a></td>
                </tr>
                @endforeach
            </body>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Console</th>
                    <th>Pub. at</th>
                    <th>Publisher</th>
                    <th>MGS</th>
                    <th>Links</th>
                </tr>
            </tfoot>
        </table>
        <div id="pagination" class="text-center">
            {{ $games->links() }}
        </div>
        <form method="POST" action="/games/export">
            {{ csrf_field() }}
            <input type="hidden" name="search_title" value="{{ request('search_title') }}">
            <input type="hidden" name="search_published" value="{{ request('search_published') }}">
            <input type="hidden" name="search_publisher" value="{{ request('search_publisher') }}">
            <input type="hidden" name="search_category" value="{{ request('search_category') }}">
            <input type="hidden" name="search_console" value="{{ request('search_console') }}">
            <input type="hidden" name="search_tag" value="{{ request('search_tag') }}">
            <div class="form-actions text-right">
                <button type="submit" class="btn btn-primary">Export result</button>
            </div>
        </form>
    </div>
@endsection

@section('admincontent')
    @include('games.adminheader')
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-search"></i> </span>
                <h5>Search</h5>
            </div>
            <form class="form-horizontal">
                <div class="col-md-12">
                    <div class="control-group">
                        <label for="search_title" class="control-label">Title:&nbsp;</label>
                        <div class="controls">
                            <input type="text" class="span12" id="search_title" name="search_title" placeholder="Title" value="{{ request('search_title') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-actions text-right">
                        <button type="submit" class="btn btn-success">Apply</button>
                        <a href="#" onclick="resetSearch();"><button type="button" class="btn btn-danger">Reset</button></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>List of games</h5>
            </div>
            <div class="widget-content nopadding">
                @include('parts.error')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Console</th>
                            <th>Pub. at</th>
                            <th>Publisher</th>
                            <th>MGS</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                        <tr>
                            <td>{{ $game->title }}</td>
                            <td>@if ($game->console) {{ $game->console->name }} @endif</td>
                            <td>{{ $game->published }}</td>
                            <td>@if ($game->publisher) {{ $game->publisher->name }} @endif</td>
                            <td>{{ $game->metagamescore }}</td>
                            <td>{{ $game->url }}</td>
                            <td><a href="/admin/games/{{ $game->id }}/edit">Edit</a> | <a href="#" onclick="removeGame('{{ $game->id }}');">Delete</a></td>
                        </tr>
                        @endforeach
                    </body>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Console</th>
                            <th>Pub. at</th>
                            <th>Publisher</th>
                            <th>MGS</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                <div id="pagination" class="text-center">
                    {{ $games->links() }}
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="remove-game">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>
@endsection

@section('beforefooter')
    <script>
        function resetSearch() {
            $("input[name*=search_]").val('');
            $.each($('select option'), function (i, e) {
                if ($(e).val() == '') {
                    $(e).attr('selected', true);
                } else {
                    $(e).attr('selected', false);
                }
            });
        }
    </script>
    <style>
        #gameslist {
            margin-top: 30px;
        }

        #toggle-filters {
            cursor: pointer;
            color: #428bca;
        }
    </style>
@endsection

@section('adminbeforefooter')
    <script>
        function removeGame(id) {
            if (confirm("Are you sure?")) {
                $("#remove-game").attr('action', '/admin/games/'+id);
                $("#remove-game").submit();
            }
        }

        function resetSearch() {
            $("input[name*=search_]").val('');
            $.each($('select option'), function (i, e) {
                if ($(e).val() == '') {
                    $(e).attr('selected', true);
                } else {
                    $(e).attr('selected', false);
                }
            });
        }
    </script>
    <style>
        #pagination ul li {
            list-style-type: none;
            display: inline-block;
        }
    </style>
@endsection
