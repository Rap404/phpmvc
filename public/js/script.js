$(function(){

    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

            $('#nama').val('');
            $('#nisn').val('');
            $('#email').val('');
            $('#jurusan').val('');
            $('#id').val('');
    
    })

    $('.tampilModalUbah').on('click', function() {

        $('#judulModal').html('Ubah Data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/siswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/siswa/getubah',
            data: {id:id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#nisn').val(data.nisn);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })
    });

});