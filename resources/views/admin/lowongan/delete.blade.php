<script>
    //button create post event
    $('body').on('click', '#btn-delete-lowongan', function () {

        let lowongan_id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {
                
                //fetch to delete data
                $.ajax({

                    url: `/lowongan/${lowongan_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove lowongan on table
                        $(`#index_${lowongan_id}`).remove();
                    }
                });

                
            }
        })
        
    });
</script>