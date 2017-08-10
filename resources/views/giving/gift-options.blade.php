@extends('layouts.template')
@section('title')
    Giving options
@endsection

@section('content')
    <div class="row-fluid">
        @include('admin.settings-menu')

        <div class="span10">
            <div class="widget-box no-top">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-calendar"></i></span>
                    <h5>Giving options</h5>
                    <div class="buttons">
                        <a class="btn btn-inverse btn-mini" href="/giving/gift-options"><i class="icon-plus"></i> New
                            gift option</a>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="alert alert-info">
                        These are the options available to members to choose from when giving online. e.g. Building
                        fund, overseas missions, etc
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <table class="table table-responsive table-striped">
                                @foreach($gOptions as $go)
                                    <tr class="@if($go->active==0) bg-danger @endif">
                                        <td>
                                            <a href="?option={{$go->id}}">{{$go->name}}</a>
                                            <em class="text-danger">@if($go->active==0) inactive @endif</em>
                                        </td>
                                        <td>
                                            {!! $go->desc !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="span6">
                            @if(isset($_GET['option']) && $_GET['option'] !=="")
                                {!! Form::model($gOption,['url'=>'giving/gift-options/'.$gOption->id,'method'=>'put']) !!}
                                <h4>Edit option</h4>
                            @else
                                {!! Form::open(['url'=>'giving/gift-options','method'=>'post']) !!}
                                <h4>New option</h4>
                            @endif
                            <label>Name</label>
                            {{Form::text('name',null,['required'=>'required'])}}
                            <label>Amount <i class="small">(optional)</i></label>
                            {!! Form::text('amount') !!}
                            <label>Description</label>
                            {{Form::textarea('desc',null,['required'=>'required','rows'=>3,'class'=>'span12 editor'])}}
                            <label>Active?</label>
                            {{Form::select('active',[1=>'Yes',0=>'No'])}}
                            <br/>
                            <button class="btn btn-default">Submit</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@include('partials.summer',['editor'=>'.editor'])