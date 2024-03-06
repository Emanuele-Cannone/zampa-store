@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">{{ __('common.animal-typologies') }}</h1>
        {{--            @can('create-category')--}}
        <a href="{{ route('animal-typologies.create') }}" class="btn btn-success" style="margin-bottom: 15px"><i
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
@section('scripts')
    <script type="module">
        $('body').on('click','form.confirm-delete button[type=submit]',function(e){
            e.preventDefault();
            let href = $(this).attr('href');
            let token = $('meta[name="csrf-token"]').attr('content');
            let that = this;
            Swal.fire({
                title: "Sicuro di voler eliminare questo elemento?",
                confirmButtonText: "Si",
                showCancelButton: true,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'DELETE',
                        data:{
                            _token: token,
                        },
                        success: function(result) {
                            Swal.fire({
                                title: "Operazione eseguita con successo!",
                                icon: "success"
                            });
                            $(that).closest('tr').remove();
                        },
                        error: function(request,msg,error) {
                            Swal.fire({
                                title: "Qualcosa è andato storto riprovare più tardi!",
                                icon: "danger"
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection

@section('adminlte_js')
    {!! $dataTable->scripts() !!}
    @vite(['resources/js/delete.js'])
@stop
