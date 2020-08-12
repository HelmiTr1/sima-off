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
                                        <label class="col-sm-2">Kode Lokasi Rak</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-sm m-b" name="kd_rak" id="kd_rak">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Data Part</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-sm" placeholder="Cari Data Part" id="cari">
                                            <span class="help-block m-b-none text-danger" id="info"></span>
                                        </div>
                                        <div class="col-sm-2" id="scan">
                                            <a id="doCari" class="btn btn-primary btn-sm text-white">Scan Data</a>
                                            <a class="mt-2 btn btn-warning btn-sm text-white">Check Audit</a>
                                            <a id="send" data-toggle="modal" data-target="#myModal1" class="mt-2 btn btn-danger btn-sm text-white">Send To API</a>
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
                                                    <th class="text-center">Part Number</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Lokasi Part</th>
                                                    <th class="text-center">Kode Lokasi Rak</th>
                                                    <th class="text-center">QTY</th>
                                                </tr>
                                            </thead>
                                            <tbody id="audit_part">
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Part Number</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Lokasi Part</th>
                                                    <th class="text-center">Kode Lokasi Rak</th>
                                                    <th class="text-center">QTY</th>
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
        $('#cari').focus();
        //endload

        //load data json
        retrieve();

        function retrieve() {
            $.getJSON('../../json/audited_part.json', function(cek) {
                if (cek.length > 0) {
                    var temp = '';
                    for (let i = 0; i < cek.length; i++) {
                        var edit = '';
                        var x = i + 1;
                        temp += "<tr>";
                        temp += "<td>" + x + "</td>";
                        temp += "<td>" + cek[i].part_number + "</td>";
                        temp += "<td>" + cek[i].deskripsi + "</td>";
                        temp += "<td>" + cek[i].id_lokasi + "</td>";
                        temp += "<td>" + cek[i].kd_lokasi_rak + "</td>";
                        temp += "<td>" + cek[i].qty + "</td>";
                        temp += "</tr>";
                    }
                    $('#audit_part').html(temp);
                } else {
                    $('#audit_part').html("<tr>" +
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
            var kdrak =  $('#kd_rak').val();
            console.log(cari,lokasi,kdrak);
            if (cari && lokasi) {
                $('#info').html("");
                scanjson(cari, lokasi, kdrak);
            } else {
                $('#info').html("Data Kosong");
            }
        })

        $("#cari").on("keyup", function() {
        if ($(this).val().length == 11) {
            $('#doCari').trigger('click');
        }
        });
        //endregion
        //scanjson
        function scanjson(cari, lokasi, kdrak) {
            var json = (function() {
                var json = null;
                $.ajax({
                    async: false,
                    url: "../../json/part_temp.json",
                    dataType: "json",
                    success: function(data) {
                        json = data;
                    }
                });
                return json;
            })();
            if (json.length > 0) {
                scan: for (var i = 0; i < json.length; i++) {
                    if (json[i].part_number == cari) {
                        $.ajax({
                            type: "post",
                            dataType: 'JSON',
                            url: "audit_proses.php",
                            data: {
                                part_number : json[i].part_number,
                                deskripsi : json[i].deskripsi,
                                lokasi : lokasi,
                                cabang : json[i].id_cabang,
                                kdrak : kdrak,
                                qty : "1",
                            },
                            success: function(data) {
                                    retrieve();
                                    $('#cari').val('');
                                    $('#cari').focus();
                                    $('#info').html("Part Diaudit");
                            }
                        });
                        break scan;
                    }
                }
            }
            else {
                window.location.href = "../../index.php";
            }
        }
        //scanjson

    })
</script>
</body>

</html>