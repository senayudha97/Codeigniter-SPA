<script>
    let throwData = '';

    function ambilData(destroy = 0) {
        $.ajax({
            url: "<?= base_url('index.php/page/ambildata'); ?>",
            method: "POST",
            datatype: "json",
            success: function(param) {
                data = JSON.parse(param);

                let no = 1;
                let row = '';
                $.each(data, function(index, value) {
                    row += `
                    <tr>
                        <td>` + no + `</td>
                        <td>` + value.kode_barang + `</td>
                        <td>` + value.nama_barang + `</td>
                        <td>` + value.harga + `</td>
                        <td>` + value.stok + `</td>
                        <td>
                            <a href="#form" onclick='submit("ubah", ` + JSON.stringify(value) + `)'  data-toggle="modal" class="btn rounded-0 btn-sm btn-warning"><span class="fas fa-edit"></span></a>
                            <button onclick="deleteData(` + value.id + `)" class="btn rounded-0 btn-sm btn-danger"><span class="fas fa-trash"></span></button>
                        </td>
                    </tr>
                    `;
                    no++;
                });
                $('#target').html(row);

                if (param == 0) {
                    $('#table_id').DataTable({
                        "destroy": true, //use for reinitialize datatable
                    });
                } else {
                    $('#table_id').DataTable();

                }
            }
        });
    }
    ambilData();

    function submit(x, data = '') {
        if (x == 'tambah') {
            $('#btn-tambah').show();
            $('#btn-ubah').hide();
        } else if (x == 'ubah') {
            $('#kode').val(data.kode_barang);
            $('#nabar').val(data.nama_barang);
            $('#harbar').val(data.harga);
            $('#stok').val(data.stok);

            throwData = data.id;


            $('#btn-tambah').hide();
            $('#btn-ubah').show();
        } else {
            $('#btn-tambah').hide();
            $('#btn-ubah').hide();

        }
    }

    function tambahData() {
        const formdata = $("form.a-form").serializeArray();
        const data = {};
        $(formdata).each(function(index, obj) {
            if (obj.value == '') {
                const field = obj.name.replace("_", " ");
                swal({
                    title: field.toUpperCase() + ' HARUS DI ISI!!',
                    dangerMode: true,
                    buttons: false,
                    icon: "warning",
                });
            }
            data[obj.name] = obj.value;
        });

        $.ajax({
            url: "<?= base_url('index.php/page/tambahdata'); ?>",
            method: "POST",
            datatype: "json",
            data: data,
            success: function(param) {
                if (param == 1) {
                    $("#form").modal("hide");
                    swal("Berhasil!", "Data Telah Terinput!", "success");
                    ambilData(1);
                    $('.resetable').val('');
                } else {
                    $("#form").modal("hide");
                    swal("Gagal!", "Data Gagal Terinput!", "error");
                    $('.resetable').val('');
                }
            }
        });
    }

    function ubahData() {
        const formdata = $("form.a-form").serializeArray();
        const data = {};
        $(formdata).each(function(index, obj) {
            if (obj.value == '') {
                const field = obj.name.replace("_", " ");
                swal({
                    title: field.toUpperCase() + ' HARUS DI ISI!!',
                    dangerMode: true,
                    buttons: false,
                    icon: "warning",
                });
            }
            data[obj.name] = obj.value;
        });

        console.log(data);

        $.ajax({
            url: "<?= base_url('index.php/page/ubahdata'); ?>",
            method: "POST",
            datatype: "json",
            data: {
                'id': throwData,
                'data': data
            },
            success: function(param) {
                if (param == 1) {
                    $("#form").modal("hide");
                    swal("Berhasil!", "Data Telah Teredit!", "success");
                    ambilData(1);
                    $('.resetable').val('');
                } else {
                    $("#form").modal("hide");
                    swal("Gagal!", "Data Gagal Teredit!", "error");
                    $('.resetable').val('');
                }
            }
        });
    }

    function deleteData(id) {
        swal({
                title: "Apakah Anda Yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?= base_url('index.php/page/deletedata'); ?>",
                        method: "POST",
                        datatype: "json",
                        data: {
                            'id': id,
                        },
                        success: function(param) {
                            if (param == 1) {
                                $("#form").modal("hide");
                                swal("Berhasil!", "Data Telah Terhapus!", "success");
                                ambilData(1);
                                $('.resetable').val('');
                            } else {
                                $("#form").modal("hide");
                                swal("Gagal!", "Data Gagal Terhapus!", "error");
                                $('.resetable').val('');
                            }
                        }
                    });

                }
            });
    }
</script>