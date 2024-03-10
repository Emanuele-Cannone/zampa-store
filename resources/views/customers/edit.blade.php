@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">@lang('common.edit') @lang('common.customer')</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.update', $customer) }}" method="post">
                @method('PUT')
                @csrf
                @include('customers.partials.form')
                <div class="form-group">
                    <button class="btn btn-warning" type="submit"><i
                            class="fas fa-save"></i> @lang('common.edit')</button>
                </div>
            </form>
            @if(!$customer->loyaltyCard)
            <form action="{{ route('loyalty-card.store') }}" method="post">
                @method('post')
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <div class="form-group">
                    <button class="btn btn-success" type="submit"><i
                            class="fas fa-save"></i> @lang('common.card')</button>
                </div>
            </form>
            @else
                <form action="{{ route('loyalty-card.edit', $customer->loyaltyCard) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <button class="btn btn-warning" type="submit"><i
                                class="fas fa-save"></i> @lang('common.card')</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@stop

