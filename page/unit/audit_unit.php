<?php require 'header.php' ?>

<div class="container text-sm">
    <h1 class="text-center">SIMTA</h1>
    <h3 class="text-center">Sistem Informasi Manajemen Audit Inventory PT TRIO MOTOR (<i>offline</i>)</h3>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger mt-4 sticky-top">
        <a class="navbar-brand text-white font-weight-bold" href="#">SIMTA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="../../index.php">Home</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav float-right">
            <li class="nav-item">
                <a class="nav-link text-white" href="clear_data.php" onclick=" return confirm('Apakah anda yakin akan menghapus data?')">Clear Data</a>
            </li>
        </ul>
    </nav>
    <div class="row mt-4">
        <div class="col-12  m-auto">
            <div class="card card-primary">
                <div class="card-header">
                    <h3><i class="fa fa-info-circle"></i> Audit</h3>
                </div>
                <div class="card-body ">
                    <div class="row" style="font-size:12px">
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2">Lokasi</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-sm m-b" name="id_lokasi" id="id_lokasi">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Data Unit</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-sm" placeholder="Cari Data Unit" id="cari">
                                            <span class="help-block m-b-none text-danger" id="info"></span>
                                        </div>
                                        <div class="col-sm-2" id="scan">
                                            <a id="doCari" class="btn btn-primary btn-sm text-white">Scan Data</a>
                                            <a class="mt-2 btn btn-warning btn-sm text-white">Check Audit</a>
                                            <a id="send" data-toggle="modal" data-target="#myModal1" class="mt-2 btn btn-danger btn-sm text-white">Send To API</a>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 control-label">RFS </label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" name="rfs" id="rfs" value="1">
                                        </div>
                                    </div>
                                    <div id="manual" class="row">
                                        <div class="form-group col-sm-4">
                                            <label>No. Mesin</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="No Mesin" id="no_mesin" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>No. Rangka</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="No Rangka" id="no_rangka" required>
                                        </div>
                                        <div class="form-group col-sm-4 mt-4">
                                            <a id="audit" class="btn btn-sm btn-primary text-white">Audit</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7" style="font-size:12px">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive" style="height:500px; overflow-y: scroll;">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Aksi</th>
                                                    <th class="text-center">No Mesin</th>
                                                    <th class="text-center">No Rangka</th>
                                                    <th class="text-center">Lokasi</th>
                                                    <th class="text-center">Umur Unit</th>
                                                    <th class="text-center">Status Unit</th>
                                                    <th class="text-center">Tahun</th>
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Kode Item</th>
                                                    <th class="text-center">Keterangan</th>
                                                    <th class="text-center">RFS</th>
                                                </tr>
                                            </thead>
                                            <tbody id="audit_unit">
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Aksi</th>
                                                    <th class="text-center">No Mesin</th>
                                                    <th class="text-center">No Rangka</th>
                                                    <th class="text-center">Lokasi</th>
                                                    <th class="text-center">Umur Unit</th>
                                                    <th class="text-center">Status Unit</th>
                                                    <th class="text-center">Tahun</th>
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Kode Item</th>
                                                    <th class="text-center">Keterangan</th>
                                                    <th class="text-center">RFS</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="text-right"> <span id="pagination"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <input type="hidden" name="no_mesin1" id="no_mesin1" value="">
                    <input type="hidden" name="status" id="status" value="">
                    <label for="keterangan" class="col-3">Keterangan</label>
                    <select name="ket" id="ket" class="col-8 form-control">
                        <option value="">-- Keterangan --</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Terlewat">Terlewat</option>
                        <option value="Hilang">Hilang</option>
                        <option value="Mutasi">Mutasi</option>
                        <option value="Sesuai">Sesuai</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit">Edit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Send To API Server</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="keterangan" class="col-3">Auditor</label>
                   <input type="text" name="auditor" id="auditor" class=" col-8 form-control" placeholder="Masukkan Nama Auditor">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="send1">Send</button>
            </div>
        </div>
    </div>
</div>
<script src="../../js/jquery-3.1.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../../vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<script src="../../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {

        //hide manual input
        $('#manual').addClass('d-none');
        $('#cari').focus();
        //endload

        //load data json
        retrieve();

        function retrieve() {
            $.getJSON('../../json/audited.json', function(cek) {
                if (cek.length > 0) {
                    var temp = '';
                    for (let i = 0; i < cek.length; i++) {
                        var edit ='';

                        if (cek[i].edit == '0') {
                            edit+='<a href="" class="btn btn-danger btn-sm editbtn" data-toggle="modal" data-target="#myModal" data-id="' + cek[i].no_mesin + '" data-ket="' + cek[i].keterangan + '" data-status="' + cek[i].status_unit + '">Edit</a>';
                        }else{
                            edit += '<span class="badge badge-success">already edit</span>';
                        }
                        var x = i + 1;
                        temp += "<tr>";
                        temp += "<td>" + x + "</td>";
                        temp += '<td>'+ edit +'</td>';
                        temp += "<td>" + cek[i].no_mesin + "</td>";
                        temp += "<td>" + cek[i].no_rangka + "</td>";
                        temp += "<td>" + cek[i].id_lokasi + "</td>";
                        temp += "<td></td>";
                        temp += "<td>" + cek[i].status_unit + "</td>";
                        temp += "<td>" + cek[i].tahun + "</td>";
                        temp += "<td>" + cek[i].type + "</td>";
                        temp += "<td>" + cek[i].kode_item + "</td>";
                        temp += "<td>" + cek[i].keterangan + "</td>";
                        temp += "<td>" + cek[i].is_ready + "</td>";
                        temp += "</tr>";
                    }
                    $('#audit_unit').html(temp);
                } else {
                    $('#audit_unit').html("<tr>" +
                        "<td colspan='12' class='text-center'> Data not found. </td>" +
                        "</tr>");
                }
            })
        }
        //endload

        //audit button
        $('#doCari').on("click",function() {
            var cari = $('#cari').val();
            var lokasi = $('#id_lokasi').val();
            if (cari && lokasi) {
                $('#info').html("");
                if ($('#rfs').prop("checked") == true) {
                    var rfs = '1';
                } else if ($('#rfs').prop("checked") == false) {
                    var rfs = '0';
                }

                scanjson(cari, lokasi, rfs);
            } else {
                $('#info').html("Data Kosong");
            }
        })
        // $('#cari').keyup(function(e) {
        //     if (e.keyCode == 13) {
        //         var cari = $('#cari').val();
        //         var lokasi = $('#id_lokasi').val();
        //         if (cari && lokasi) {
        //             $('#info').html("");
        //             if ($('#rfs').prop("checked") == true) {
        //                 var rfs = '1';
        //             } else if ($('#rfs').prop("checked") == false) {
        //                 var rfs = '0';
        //             }

        //             scanjson(cari, lokasi, rfs);
        //         } else {
        //             $('#info').html("Data Kosong");
        //         }
        //     }
        // });
        $("#cari").on("keyup", function() {
        if ($(this).val().length == 12) {
            $('#doCari').trigger('click');
        }
        });
        //endload
        //scanjson
        function scanjson(cari, lokasi, rfs) {
            var json = (function() {
                var json = null;
                $.ajax({
                    async: false,
                    url: "../../json/unit_temp.json",
                    dataType: "json",
                    success: function(data) {
                        json = data;
                    }
                });
                return json;
            })();

            if (json.length > 0) {
                scan: for (var i = 0; i < json.length; i++) {

                    if (json[i].no_mesin === cari || json[i].no_rangka === cari) {
                        var ket = '';
                        if (json[i].id_lokasi != lokasi) {
                            ket = 'Lokasi Tidak Sesuai'
                        }
                        $.ajax({
                            type: "post",
                            dataType: 'JSON',
                            url: "audit_proses.php",
                            data: {
                                no_mesin: json[i].no_mesin,
                                no_rangka: json[i].no_rangka,
                                id_cabang: json[i].id_cabang,
                                id_lokasi: lokasi,
                                kode_item: json[i].kode_item,
                                type: json[i].type,
                                tahun: json[i].tahun,
                                ket: ket,
                                status: 'Sesuai',
                                edit : '0',
                                rfs: rfs
                            },
                            success: function(data) {
                                if (data.status == true) {
                                    retrieve();
                                    $('#cari').val('');
                                    $('#cari').focus();
                                    $('#info').html("Data Diaudit");
                                    $('#manual').addClass('d-none');
                                    $('#scan').removeClass('d-none');
                                }
                            }
                        });
                        break scan;
                    }
                    if (json[i].no_mesin != cari) {
                        $('#no_mesin').val(cari);
                        $('#no_rangka').focus();
                        $('#info').html("Data Tidak Ditemukan");
                        $('#manual').removeClass('d-none');
                        $('#scan').addClass('d-none');
                    }
                }
            }
            else {
                window.location.href = "../../index.php";
            }
        }
        //scanjson

        //manual input
        $('#audit').click(function(e) {
            e.preventDefault();
            $('#info').html("Data Diaudit");
            var lokasi = $('#id_lokasi').val();
            var mesin = $('#no_mesin').val();
            var rangka = $('#no_rangka').val();
            var cabang = 'T13';

            if ($('#rfs').prop("checked") == true) {
                var rfs = '1';
            } else if ($('#rfs').prop("checked") == false) {
                var rfs = '0';
            }
            $.ajax({
                type: "post",
                dataType: 'JSON',
                url: "audit_proses.php",
                data: {
                    no_mesin: mesin,
                    no_rangka: rangka,
                    id_cabang: cabang,
                    id_lokasi: lokasi,
                    kode_item: '',
                    type: '',
                    tahun: '',
                    ket: '',
                    status: 'Unit Tidak Sesuai',
                    edit : '0',
                    rfs: rfs
                },
                success: function(data) {
                    retrieve();
                    $('#scan').removeClass('d-none');
                    $('#manual').addClass('d-none');
                    $('#info').html("Data Diaudit");
                    $('#cari').val('');
                }
            });
        });
        //endmanual

        //edit region
        $('table').on("click", ".editbtn", function(e) {
            e.preventDefault();
            var mesin = $(this).data('id');
            var ket = $(this).data('ket');
            var status = 'Sesuai';
            $('#myModal #no_mesin1').val(mesin);
            $('#myModal #status').val(status);
            $('#myModal select[name="ket"]').val(ket).change();
        });

        $(document).on("click", "#edit", function(e) {
            e.preventDefault();
            var mesin = $('#no_mesin1').val();
            var status = $('#status').val();
            var ket = $('#ket').val();
            $.ajax({
                url: 'audit_edit.php',
                method: 'post',
                data: {
                    id: mesin,
                    status: status,
                    ket: ket
                },
                success: function(data) {
                    console.log(data);
                    retrieve();
                    $('#myModal').modal('hide');
                }
            });
        });

        //send to API
        $(document).on("click","#send",function(e) {
            e.preventDefault();
        });

        $(document).on("click", "#send1", function(e) {
            e.preventDefault();
            var auditor = $('#auditor').val();
            $.ajax({
                url: 'up_data.php',
                method: 'post',
                data: {
                    auditor : auditor
                },
                success: function(data) {
                    $('#myModal').modal('hide');
                    window.location.href ="clear_data.php";
                }
            });
        });
    });
</script>
</body>

</html>