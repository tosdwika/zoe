<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH LOWONGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Posisi</label>
                    <input type="text" class="form-control" id="posisi-create" autofocus>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-posisi"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi-create" rows="5"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-deskripsi"></div>
                </div>
                <div class="form-group" id="data-container">
                    <label for="id_divisi-create">Divisi</label>
                    <select class="custom-select form-control-border" id="id_divisi-create">
                        <option value="">-- Pilih Salah Satu --</option>
                        @foreach($divisi as $data)
                        <option value="{{ $data['id_divisi'] }}">{{ $data['nama_divisi'] }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-id_divisi"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="dismiss-btn">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>

    //button create post event
    $('body').on('click', '#btn-create-lowongan', function () {

        $.get('/data/divisi', function(divisi) {
        $.each(divisi, function(index, divisi) {
            var html = '<option value="' + divisi.id_divisi + '">' + divisi.nama_divisi + '</option>';
                $('#modal-create').modal('show');
            });
        });
        
    });

    //dissmiss clear
    $('#dismiss-btn').click(function() {
        $('#posisi-create').val('');
        $('#deskripsi-create').val('');
        $('#id_divisi-create').val('');
    });

    //action create lowongan
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let posisi   = $('#posisi-create').val();
        let deskripsi   = $('#deskripsi-create').val();
        let id_divisi   = $('#id_divisi-create').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/lowongan`,
            type: "POST",
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
                

                //data lowongan
                let lowongan = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.posisi}</td>
                        <td>${response.data.deskripsi}</td>
                        <td>${response.foreignData.divisi.nama_divisi}</td>
                        <td>${response.data.created_at.replace("T"," ").substring(0, 19)}</td>
                        <td>${response.data.updated_at.replace("T"," ").substring(0, 19)}</td>
                        <td>
                            <a href="javascript:void(0)" id="btn-detail-lowongan" data-id="${response.data.id}" class="btn btn-warning btn-sm">Detail</a><br>
                            <a href="javascript:void(0)" id="btn-update-lowongan" data-id="${response.data.id}" class="btn btn-primary btn-sm">Edit</a><br>
                            <a href="javascript:void(0)" id="btn-delete-lowongan" data-id="${response.data.id}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-lowongan').prepend(lowongan);
                
                //clear form
                $('#posisi-create').val('');
                $('#deskripsi-create').val('');
                $('#id_divisi-create').val('');

                //close modal
                $('#modal-create').modal('hide');
                }
                });
            },
            error:function(error){
                
                if(error.responseJSON.posisi[0]) {

                    //show alert
                    $('#alert-posisi').removeClass('d-none');
                    $('#alert-posisi').addClass('d-block');

                    //add message to alert
                    $('#alert-posisi').html(error.responseJSON.posisi[0]);
                } 

                if(error.responseJSON.deskripsi[0]) {

                    //show alert
                    $('#alert-deskripsi').removeClass('d-none');
                    $('#alert-deskripsi').addClass('d-block');

                    //add message to alert
                    $('#alert-deskripsi').html(error.responseJSON.deskripsi[0]);
                } 

                if(error.responseJSON.id_divisi[0]) {

                    //show alert
                    $('#alert-id_divisi').removeClass('d-none');
                    $('#alert-id_divisi').addClass('d-block');

                    //add message to alert
                    $('#alert-id_divisi').html(error.responseJSON.id_divisi[0]);
                } 
            }

        });

    });

</script>