@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">@lang('common.edit') @lang('common.cluster')</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('clusters.update', $cluster) }}" method="post">
                @method('PUT')
                @csrf
                @include('clusters.partials.form')
                <div class="form-group">
                    <button class="btn btn-warning" type="submit"><i
                            class="fas fa-save"></i> @lang('common.edit')</button>
                </div>
            </form>
        </div>
    </div>
@stop

