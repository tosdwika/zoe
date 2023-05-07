<!-- Modal -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT LOWONGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="id_lowongan-update">

                <div class="form-group">
                    <label for="name" class="control-label">Posisi</label>
                    <input type="text" class="form-control" id="posisi-update">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-posisi-update"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi-update" rows="5"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-deskripsi-update"></div>
                </div>
                <div class="form-group" id="data-container">
                    <label for="id_divisi-update">Divisi</label>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-id_divisi-update"></div>
                    <select class="custom-select form-control-border" id="id_divisi-update">
                        <option value="">-- Pilih Salah Satu --</option>
                        @foreach($divisi as $data)
                        <option value="{{ $data['id_divisi'] }}">{{ $data['nama_divisi'] }}</option>
                        @endforeach
                    </select>
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
    $('body').on('click', '#btn-update-lowongan', function () {

        let lowongan_id = $(this).data('id');

        // fetch detail lowongan with ajax
        $.ajax({
            url: `/lowongan/${lowongan_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#id_lowongan-update').val(response.data.id_lowongan);
                $('#posisi-update').val(response.data.posisi);
                $('#deskripsi-update').val(response.data.deskripsi);
                //open modal
                // $('#modal-update').modal('show');
            }
        });

        $.get('/data/divisi', function(divisi) {
        $.each(divisi, function(index, divisi) {
            var html = '<option value="' + divisi.id_divisi + '">' + divisi.nama_divisi + '</option>';
                $('#modal-update').modal('show');
            });
        });
    });

    //dissmiss clear
    // $('#dismiss-btn').click(function() {
    //     $('#posisi-update').val('');
    //     $('#deskripsi-update').val('');
    //     $('#id_divisi-update').val('');
    // });
    function clearForm() {
    $('#posisi-update').val('');
    $('#deskripsi-create').val('');
    $('#id_divisi-create').val('');
    };

    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let lowongan_id = $('#id_lowongan-update').val();
        let posisi   = $('#posisi-update').val();
        let deskripsi   = $('#deskripsi-update').val();
        let id_divisi   = $('#id_divisi-update').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/lowongan/${lowongan_id}`,
            type: "PUT",
            cache: false,
            data: {
                "posisi": posisi,
                "deskripsi": deskripsi,
                "id_divisi": id_divisi,
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
                var id_divisi = response.data.id_divisi;

                // $.get('/data/divisi', function(divisi) {
                $.get({
                url: '/data/divisifirst/' + id_divisi,
                success: function(foreignData) {
                    // melakukan parsing data dari tabel kunci asing dan memasukkannya ke dalam respons Ajax pertama
                    response.foreignData = foreignData;
                    // menampilkan respons Ajax lengkap di konsol
                    // console.log(response.foreignData.divisi.nama_divisi);

                //data post
                let lowongan = `
                    <tr id="index_${response.data.id_lowongan}">
                        <td>${response.data.posisi}</td>
                        <td>${response.data.deskripsi}</td>
                        <td>${response.foreignData.divisi.nama_divisi}</td>
                        <td>${response.data.created_at}</td>
                        <td>${response.data.updated_at}</td>
                        <td>
                            <a href="javascript:void(0)" id="btn-detail-lowongan" data-id="${response.data.id_lowongan}" class="btn btn-warning btn-sm">Detail</a>
                            <a href="javascript:void(0)" id="btn-update-lowongan" data-id="${response.data.id_lowongan}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" id="btn-delete-lowongan" data-id="${response.data.id_lowongan}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                `;
                
                //append to post data
                $(`#index_${response.data.id_lowongan}`).replaceWith(lowongan);

                //close modal
                $('#modal-update').modal('hide');
                    }
                });
                
            },
            error:function(error){
                
                if(error.responseJSON.posisi[0]) {

                    //show alert
                    $('#alert-posisi-update').removeClass('d-none');
                    $('#alert-posisi-update').addClass('d-block');

                    //add message to alert
                    $('#alert-posisi-update').html(error.responseJSON.posisi[0]);
                }

                if(error.responseJSON.deskripsi[0]) {

                    //show alert
                    $('#alert-deskripsi-update').removeClass('d-none');
                    $('#alert-deskripsi-update').addClass('d-block');

                    //add message to alert
                    $('#alert-deskripsi-update').html(error.responseJSON.deskripsi[0]);
                }

                if(error.responseJSON.id_divisi[0]) {

                    //show alert
                    $('#alert-id_divisi-update').removeClass('d-none');
                    $('#alert-id_divisi-update').addClass('d-block');

                    //add message to alert
                    $('#alert-id_divisi-update').html(error.responseJSON.id_divisi[0]);
                }

            }

        });

    });

</script>