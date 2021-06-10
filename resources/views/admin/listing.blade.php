@extends('layouts.admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Tables <small>Some examples to get you started</small></h3>
        </div>

        <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
            </div>
        </div>
        </div>
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
                        <th>#</th>
                        @foreach ($configs as $config)
                            <th>{{ $config['name'] }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
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