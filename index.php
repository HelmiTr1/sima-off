<?php require 'header.php'; ?>

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
                    <a class="nav-link text-white" href="index.php">Home</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav float-right">
            <li class="nav-item">
                <a class="nav-link text-white" href="page/clear_data.php" onclick=" return confirm('Apakah anda yakin akan menghapus data?')">Clear Data</a>
            </li>
        </ul>
    </nav>
    <div class="row mt-4 ml-4">
        <span class="display-4">Hello, Auditor!</span>
    </div>
    <div class="row mt-4 ml-4">
        <div class="col-2">
            <a href="page/unit/select.php" class="btn btn-primary">Audit Unit</a>
        </div>
        <div class="col-2">
            <a href="page/part/select.php" class="btn btn-primary">Audit Part</a>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>