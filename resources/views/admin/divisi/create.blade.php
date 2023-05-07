<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DIVISI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Divisi</label>
                    <input type="text" class="form-control" id="nama_divisi-create">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_divisi"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearForm()">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create divisi event
    $('body').on('click', '#btn-create-divisi', function () {

        //open modal
        $('#modal-create').modal('show');
        $("#nama_divisi-create").focus();
    });

    //dissmiss clear
    function clearForm() {
    $('#nama_divisi-create').val('');
    };

    //action create divisi
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let nama_divisi   = $('#nama_divisi-create').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/divisi`,
            type: "POST",
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

                //data divisi
                let divisi = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.nama_divisi}</td>
                        <td>
                            <a href="javascript:void(0)" id="btn-detail-divisi" data-id="${response.data.id}" class="btn btn-warning btn-sm">Detail</a>
                            <a href="javascript:void(0)" id="btn-update-divisi" data-id="${response.data.id}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" id="btn-delete-divisi" data-id="${response.data.id}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-divisi').prepend(divisi);
                
                //clear form
                $('#nama_divisi-create').val('');

                //close modal
                $('#modal-create').modal('hide');
                

            },
            error:function(error){
                
                if(error.responseJSON.nama_divisi[0]) {

                    //show alert
                    $('#alert-nama_divisi').removeClass('d-none');
                    $('#alert-nama_divisi').addClass('d-block');

                    //add message to alert
                    $('#alert-nama_divisi').html(error.responseJSON.nama_divisi[0]);
                } 

            }

        });

    });

</script>