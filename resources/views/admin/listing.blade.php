@extends('layouts.admin')

@section('content')
<div class="">
    <div class="page-title">
        <h3>{{$title}}</h3>
        <form class="filter-form" action="{{route('listing.index', ['model' => $model])}}" method="post">
            @csrf
            <fieldset>
                <legend>Tìm kiếm:</legend>

                @foreach ($configs as $config)
                    @if (!empty($config['filter']))
                        @if (empty($config['filter_value']))
                            {{ $config['filter_value'] = '' }}
                        @endif

                        @if (empty($config['filter_from_value']))
                            {{ $config['filter_from_value'] = '' }}
                        @endif

                        @if (empty($config['filter_to_value']))
                            {{ $config['filter_to_value'] = '' }}
                        @endif

                        @switch($config['filter'])
                            @case('equal')
                                <div class="filter-item">
                                    <label for="{{$config['name']}}">{{$config['name']}}:</label>
                                    <input type="text" name="{{$config['field']}}" value="{{ $config['filter_value'] }}">
                                </div>
                                @break
                            @case('like')
                                <div class="filter-item">
                                    <label for="{{$config['name']}}">{{$config['name']}}:</label>
                                    <input type="text" name="{{$config['field']}}" value="{{ $config['filter_value'] }}">
                                </div>
                                @break

                            @case('between')
                            <div class="filter-item">
                                <label for="price">{{$config['name']}} từ:</label>
                                <input type="text" name="{{$config['field']}}[from]" value="{{ $config['filter_from_value'] }}">
                                <label for="price">Đến:</label>
                                <input type="text" name="{{$config['field']}}[to]" value="{{ $config['filter_to_value'] }}">
                            </div>
                                @break

                            @default

                        @endswitch
                    @endif
                @endforeach



                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </fieldset>
        </form>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
            <h2>Bordered table <small>Bordered table subtitle</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <!-- <th>#</th> -->

                        @foreach ($configs as $config)

                            @if ($orderBy['field'] == $config['field'])
                                @if ($orderBy['sort'] == "desc")
                                    @php
                                        $sortHtml = '<i class="fa fa-sort-desc" aria-hidden="true"></i>';
                                        $typeSort = '_asc';
                                    @endphp
                                @else
                                    @php
                                        $sortHtml = '<i class="fa fa-sort-asc" aria-hidden="true"></i>';
                                        $typeSort = '_desc';
                                    @endphp
                                @endif
                            @else
                                @php
                                    $typeSort = '_desc';
                                    $sortHtml = '<i class="fa fa-sort" aria-hidden="true"></i>';
                                @endphp
                            @endif

                            @if(isset($config['sort']))
                                <th>{{ $config['name'] }}<a class="sort-icon" href="{{route('listing.index', ['model' => $model, 'sort' => $config['field'] . $typeSort ]) }}">{!! $sortHtml !!}</a></th>
                            @else
                                <th>{{ $config['name'] }}</th>
                            @endif
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <!-- <th scope="row">{{ $loop->index + 1 }}</th> -->
                            @foreach ($configs as $config)
                                @switch($config['type'])
                                    @case("text")
                                        <td>{{ $record[$config['field']] }}</td>
                                        @break

                                    @case("image")
                                        <td><image height="80px" onerror="this.src='/admin_images/no_product.png'" src="{{$record[$config['field']]}}"/> </td>
                                        @break

                                    @case("number")
                                        <td>{{ number_format($record[$config['field']]) }}</td>
                                        @break
                                    @case("copy")
                                        <td><a href="#"><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp;{{ $config['name'] }}</td>
                                        @break
                                    @case("edit")
                                        <td><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;{{ $config['name'] }}</td>
                                        @break
                                    @case("delete")
                                        <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;{{ $config['name'] }}</td>
                                        @break

                                    @default
                                        <td>{{ $record[$config['field']] }}</td>
                                @endswitch
                            @endforeach
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                {{$records->links("pagination::bootstrap-4")}}

            </div>
        </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

@endsection