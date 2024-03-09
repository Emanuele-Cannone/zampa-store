@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">@lang('common.add') @lang('common.article')</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('articles.store') }}" method="post">
                @method('post')
                @csrf
                @include('article.partials.form')
                <div class="form-group">
                    <button class="btn btn-success" type="submit"><i
                            class="fas fa-save"></i> @lang('common.save')</button>
                </div>
            </form>
        </div>
    </div>
@stop
