$('body').on('click','form.confirm-delete button[type=submit]',function(e){
    e.preventDefault();
    let href = $(this).closest('form').attr('action');
    let token = $('meta[name="csrf-token"]').attr('content');
    let that = this;
    Swal.fire({
        title: "Sicuro di voler eliminare questo elemento?",
        confirmButtonText: "Si",
        showCancelButton: true,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.value) {
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
