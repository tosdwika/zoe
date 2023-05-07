<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DETAIL DIVISI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">ID Divisi</label>
                    <input type="text" class="form-control" id="id_divisi-detail" readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Nama Divisi</label>
                    <input type="text" class="form-control" id="nama_divisi-detail" readonly>
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
    $('body').on('click', '#btn-detail-divisi', function () {

        let divisi_id = $(this).data('id');

        // fetch detail divisi with ajax
        $.ajax({
            url: `/divisi/${divisi_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#id_divisi-detail').val(response.data.id_divisi);
                $('#nama_divisi-detail').val(response.data.nama_divisi);

                //open modal
                $('#modal-detail').modal('show');
            }
        });
    });

</script>