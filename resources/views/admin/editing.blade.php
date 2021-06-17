@extends('layouts.admin')

@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>Form Basic Elements <small>different form elements</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
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
            <br />
            <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data"
                action="{{ route('editing.store', ['model' => 'product']) }}">
                @csrf
                @if (!empty($configs))
                    @foreach ($configs as $config)
                        @switch($config['type'])
                            @case('text')
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">{{ $config['name'] }}<span
                                            class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" name="{{ $config['field'] }}"
                                            placeholder="{{ $config['name'] }}"
                                            class="@error($config['field']) is-invalid @enderror" />

                                        @error($config['field'])
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @break
                            @case('number')
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">{{ $config['name'] }}<span
                                            class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" name="{{ $config['field'] }}"
                                            placeholder="{{ $config['name'] }}"
                                            class="@error($config['field']) is-invalid @enderror" />

                                        @error($config['field'])
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @break
                            @case('image')
                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">{{ $config['name'] }}<span
                                            class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="file" class="" name="{{ $config['field'] }}" />
                                    </div>
                                </div>
                            @break
                            @case('ckeditor')
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">{{ $config['name'] }} <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea id="{{ $config['field'] }}" class="form-control ckeditor-box" rows="3"
                                            name="{{ $config['field'] }}"
                                            placeholder="{{ $config['name'] }}">{{ $config['name'] }}</textarea>
                                    </div>
                                </div>
                            @break
                            @default

                        @endswitch
                    @endforeach
                @endif

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
