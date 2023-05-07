<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DETAIL LOWONGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <div class="form-group">
                    <label for="name" class="control-label">ID lowongan</label>
                    <input type="text" class="form-control" id="id_lowongan-detail" readonly>
                </div> --}}
                <div class="form-group">
                    <label for="name" class="control-label">Posisi</label>
                    <input type="text" class="form-control" id="posisi-detail" readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Deskripsi</label>
                    <textarea type="text" class="form-control" id="deskripsi-detail" rows="5" readonly></textarea>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Divisi</label>
                    <input type="text" class="form-control" id="id_divisi-detail" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
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
            url: `/lowongan/${lowongan_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                // console.log(response);
                var id_divisi = response.data.id_divisi;

                // $.get('/data/divisi', function(divisi) {
                $.get({
                url: '/data/divisifirst/' + id_divisi,
                success: function(foreignData) {
                    // melakukan parsing data dari tabel kunci asing dan memasukkannya ke dalam respons Ajax pertama
                    response.foreignData = foreignData;
                    // menampilkan respons Ajax lengkap di konsol
                    // console.log(response.foreignData.divisi.nama_divisi);
                

                //fill data to form
                // $('#id_lowongan-detail').val(response.data.id_lowongan);
                $('#posisi-detail').val(response.data.posisi);
                $('#deskripsi-detail').val(response.data.deskripsi);
                $('#id_divisi-detail').val(response.foreignData.divisi.nama_divisi);

                //open modal
                $('#modal-detail').modal('show');
                    }
                });
            }
        });
    });

</script>