<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Sarana Prasarana</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>Admin/">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sarana Prasarana</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Sarana Prasarana Desa</h4>
                                <h5 class="card-subtitle">Sarana Prasarana Desa Terbaru Desa Petak</h5>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <?= $this->session->flashdata('msg') ?>

                    <div class="col-md-12 p-3">
                        <a class="btn btn-success" href="<?= base_url() ?>Admin/addsarana"> <i class="fa fa-plus"></i> Sarana Prasarana</a>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Tanggal Post</th>
                                    <th>Uraian</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($sarana as $s) { ?>
                                    <tr>
                                        <td><?= $s->date_created ?></td>
                                        <td><?= $s->uraian_sarana ?></td>
                                        <td><?= $s->getSatuanVolume() ?></td>
                                        <td class="d-flex">
                                            <a href="<?= base_url() ?>Admin/editsarana?id_sarana=<?= $s->id_sarana ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="<?= base_url() ?>Admin/deletesarana?id_sarana=<?= $s->id_sarana ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        <a>Copyright &copy Desa Mojoroto <?= date("Y") ?> Created by Evinda Widia Cahyaningrum</a>
    </footer>
</div>