<script>
    function message(icon, text, title) {
        swal({
            title: title,
            text: text,
            icon: icon,
        });
    }
    var tambah_uraian_level2 = $('#tambah_uraian_level2')
    var id = $('[name="id_kontrak"]').val();
    var level2 = $('#level2');
    $.ajax({
        method: "POST",
        url: "<?= base_url('admin/data_kontrak/simpan_level2') ?>",
        data: tambah_uraian_level2.serialize(),
        dataType: "JSON",
        beforeSend: function() {
            $('#btn_save_lv2').addClass('disabled');
        },

        success: function(response) {
            if (response == 'success') {
                $('#btn_save_lv2').removeClass('disabled');
                level2.modal('hide')
                message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                location.reload()
            }
        }
    })
</script>