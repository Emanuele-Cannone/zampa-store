@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
        <h1 class="m-0 text-dark">@lang('common.add') @lang('common.animal-typology')</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('animal-typologies.store') }}" method="post">
                @method('post')
                @csrf
                @include('animal-typologies.partials.form')
                <div class="form-group">
                    <button class="btn btn-success" type="submit"><i
                            class="fas fa-save"></i> @lang('common.save')</button>
                </div>
            </form>
        </div>
    </div>
@stop

