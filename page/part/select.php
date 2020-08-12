<?php
$file = '../../json/audit_part.json';

$isi = file_get_contents($file);

$data = json_decode($isi, true);
// var_dump($data);die;
if (!empty($data)) {
    header('location:audit_part.php');
}
?>
<?php require 'header.php' ?>
<div class="container">
<h1 class="text-center">SIMTA</h1>
    <h3 class="text-center">Sistem Informasi Manajemen Audit Inventory PT TRIO MOTOR (<i>offline</i>)</h3>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger mt-4">
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
    <div class="row mt-4 ml-4">
        <div class="row m-auto">
            <div class="card card-primary">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i> Input Data Audit Part
                </div>
                <div class="card-body">
                    <form method="post" class="form-horizontal" id="FormInput" action="down_data.php">
                        <div>
                            <div class="form-group"><label>Kode Cabang</label>
                                <div><input type="text" class="form-control" name="id_cabang" id="id_cabang"></div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <input type="reset" value="Cancel" class="btn btn-m btn-danger" id="batal">
                                    <input type="submit" class="btn btn-m btn-success" id="submit" name="submit" value="Submit">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>