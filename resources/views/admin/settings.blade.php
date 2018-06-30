@extends('layouts.admin-template')
@section('title')
    @lang("System Settings")
@endsection
@section('content')
    <div class="row">
        @include('admin.settings-menu')

        <div class="col-sm-9">
            <div class="card card-default no-top">
                <div class="card-header bg_lg"><span class="icon"><i class="icon-calendar"></i></span>
                    <h5>@lang("Settings")</h5>
                    <div class="buttons">

                    </div>
                </div>
                <div class="card-body">
                    <div class="alert content-alert alert-danger alert-white rounded">
                        {{--<a href="#" class="close"><i class="icon-times-circle-o"></i> </a>--}}
                        <div class="icon">
                            <i class="icon-warning"></i>
                        </div>
                        <p class="category small">
                            @lang("All site configurations are managed in") <code>.evn</code> @lang("file located in the root
                            of your application.")<br/>
                            <span class="text-danger">
                    @lang("Change these settings only if you know what you are doing!")
                </span>
                        </p>
                    </div>
                    <div class="alert alert-danger">
                        {!! Form::open(['url'=>'settings/backup']) !!}
                        <button class="btn btn-warning"><i class="icon-database"></i> @lang("Backup First!")</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {!! Form::open() !!}
                            {!! Form::textarea('envContent',$envContent,['rows'=>20,'class'=>'col-sm-12']) !!}
                            <button class="btn btn-default"><i class="icon-save"></i> @lang("Update")</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <hr/>
                    {!! Form::open(['url'=>'settings/logo','method'=>'post','files'=>'true']) !!}
                    <label>Upload logo </label>

                    <img class="thumbnail" src="/img/logo.png"
                         style="width:300px;"/>

                    {{Form::file('logo')}}
                    <hr/>

                    <button class="btn btn-success">@lang("Update")</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection
