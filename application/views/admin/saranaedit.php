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

    <?= $this->session->flashdata('msg') ?>
    <div class="container-fluid">

        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Tambah Data Sarana Prasarana</h4>
                                <h5 class="card-subtitle">Tambah Data Sarana Prasarana Terbaru Desa Petak</h5>
                            </div>
                        </div>
                        <!-- title -->
                        <form action="<?= base_url() . "Admin/doeditsarana?id_sarana=" . $sarana->id_sarana ?>" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Uraian Sarana</label>
                                    <input placeholder="Uraian" value="<?= $sarana->uraian_sarana ?>" type="text" name="uraian_sarana" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Volume</label>
                                    <input placeholder="Volume" value="<?= $sarana->volume ?>" type="text" min="0" name="volume" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select name="satuan_id" class="form-control" required>
                                        <?php foreach ($Satuan as $s) { ?>
                                            <option value="<?= $s->id_satuan ?>" <?= $s->id_satuan == $sarana->satuan_id ? "selected" : "" ?>>
                                                <?= $s->jenis_satuan ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Sarana</label>
                                    <select name="kat_sarana_id" class="form-control" required>
                                        <?php foreach ($KatSarana as $k) { ?>
                                            <option value="<?= $k->id_kat_sarana ?>" <?= $k->id_kat_sarana == $sarana->kat_sarana_id ? "selected" : "" ?>>
                                                <?= $k->kat_sarana ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        <a>Copyright &copy Desa Mojoroto <?= date("Y") ?> Created by Evinda Widia Cahyaningrum</a>
    </footer>
</div>