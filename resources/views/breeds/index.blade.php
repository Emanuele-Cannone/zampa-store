@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">{{ __('common.breeds') }}</h1>
        {{--            @can('create-category')--}}
        <a href="{{ route('breeds.create') }}" class="btn btn-success" style="margin-bottom: 15px"><i
                class="fas fa-plus"></i> @lang('common.add')</a>
        {{--            @endcan--}}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    {!! $dataTable->scripts() !!}
@stop
