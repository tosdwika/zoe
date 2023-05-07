<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LOWONGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <div class="form-group">
                    <label for="name" class="control-label">ID lowongan</label>
                    <input type="text" class="form-control" id="id_lowongan-detail" readonly>
                </div> --}}
                <input type="hidden" id="id_lowongan">
                <input type="hidden" id="id_biodata">
                <input type="hidden" id="id_divisi">

                <div class="form-group">
                    <label for="name" class="control-label">Posisi</label>
                    {{-- <input type="text" class="form-control" id="posisi-detail" readonly> --}}
                    <h5 id="posisi-detail"></h5>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Divisi</label>
                    {{-- <input type="text" class="form-control" id="id_divisi-detail" readonly> --}}
                    <h5 id="id_divisi-detail" rows="5"></h5>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Persyaratan</label>
                    <textarea type="text" class="form-control" id="deskripsi-detail" rows="5" readonly></textarea>
                    {{-- <h5 id="deskripsi-detail" rows="5"></h5> --}}
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">DAFTAR</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-detail-lowongan', function () {

        let lowongan_id = $(this).data('id');

        // fetch detail lowongan with ajax
        $.ajax({
            url: `/loker/${lowongan_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                var id_divisi = response.data.id_divisi;

                $.get({
                url: '/data/lokerdivisifirst/' + id_divisi,
                success: function(foreignData) {
                    response.foreignData = foreignData;

                $.get({
                url: '/data/lokerbiodata',
                success: function(bio) {
                    response.bio = bio;
                
                //fill data to form
                $('#posisi-detail').text(response.data.posisi);
                $('#deskripsi-detail').text(response.data.deskripsi);
                $('#id_divisi-detail').text(response.foreignData.divisi.nama_divisi);
                $('#id_lowongan').val(response.data.id_lowongan);
                $('#id_divisi').val(response.foreignData.divisi.id_divisi);
                $('#id_biodata').val(response.bio.biodata.id_biodata);

                //open modal
                $('#modal-detail').modal('show');
                    }
                });
                    }
                });
            }
        });
    });

    //action create lowongan
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let id_lowongan   = $('#id_lowongan').val();
        let id_biodata   = $('#id_biodata').val();
        let id_divisi   = $('#id_divisi').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/loker`,
            type: "POST",
            cache: false,
            data: {
                "id_lowongan": id_lowongan,
                "id_biodata": id_biodata,
                "id_divisi": id_divisi,
                "_token": token
            },
            success:function(response){

                $('#index_'+id_lowongan).remove();
                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
                $('#modal-detail').modal('hide');
                function myFunction() {
                document.getElementById("btn-detail-lowongan").disabled = true;
                }; 
            },
            error:function(error){
                
                if(error.responseJSON.id_lowongan[0]) {

                    //show alert
                    $('#alert-id_lowongan').removeClass('d-none');
                    $('#alert-id_lowongan').addClass('d-block');

                    //add message to alert
                    $('#alert-id_lowongan').html(error.responseJSON.id_lowongan[0]);
                } 

                if(error.responseJSON.id_biodata[0]) {

                    //show alert
                    $('#alert-id_biodata').removeClass('d-none');
                    $('#alert-id_biodata').addClass('d-block');

                    //add message to alert
                    $('#alert-id_biodata').html(error.responseJSON.id_biodata[0]);
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