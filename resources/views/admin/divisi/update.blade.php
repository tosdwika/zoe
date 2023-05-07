<!-- Modal -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT DIVISI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="id_divisi-update">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Divisi</label>
                    <input type="text" class="form-control" id="nama_divisi-update">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_divisi-update"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearForm()">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-update-divisi', function () {

        let divisi_id = $(this).data('id');

        // fetch detail divisi with ajax
        $.ajax({
            url: `/divisi/${divisi_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#id_divisi-update').val(response.data.id_divisi);
                $('#nama_divisi-update').val(response.data.nama_divisi);
                //open modal
                $('#modal-update').modal('show');
            }
        });
    });

    //dissmiss clear
    function clearForm() {
    $('#nama_divisi-create').val('');
    };

    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let divisi_id = $('#id_divisi-update').val();
        let nama_divisi   = $('#nama_divisi-update').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/divisi/${divisi_id}`,
            type: "PUT",
            cache: false,
            data: {
                "nama_divisi": nama_divisi,
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

                //data post
                let divisi = `
                    <tr id="index_${response.data.id_divisi}">
                        <td>${response.data.nama_divisi}</td>
                        <td>
                            <a href="javascript:void(0)" id="btn-detail-divisi" data-id="${response.data.id_divisi}" class="btn btn-warning btn-sm">Detail</a>
                            <a href="javascript:void(0)" id="btn-update-divisi" data-id="${response.data.id_divisi}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" id="btn-delete-divisi" data-id="${response.data.id_divisi}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                `;
                
                //append to post data
                $(`#index_${response.data.id_divisi}`).replaceWith(divisi);

                //close modal
                $('#modal-update').modal('hide');
                

            },
            error:function(error){
                
                if(error.responseJSON.nama_divisi[0]) {

                    //show alert
                    $('#alert-nama_divisi-update').removeClass('d-none');
                    $('#alert-nama_divisi-update').addClass('d-block');

                    //add message to alert
                    $('#alert-nama_divisi-update').html(error.responseJSON.nama_divisi[0]);
                }

            }

        });

    });

</script>