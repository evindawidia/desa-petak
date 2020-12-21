<!-- CONTENT -->
<section class="content">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-modern post-content-single col-md-9">
                <!-- Post item-->
                <div class="post-description">
                    <div class="heading" style="margin-bottom: 30px">
                        <h1><b>WUJUDKAN DESA PETAK<br>
                                SEHAT, AMAN, PRODUKTIF</b></h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="<?= base_url() ?>public/assets/images/img-waspada.svg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h3><b>Waspada Penularan Covid-19</b></h3>
                                <p>SARS-CoV-2 penyebab Covid-19 menyebar melalui kontak dengan droplet saluran napas penderita yang dihasilkan pada saat bicara, batuk, atau bersin. Droplet dapat bertahan di udara dalam beberapa waktu tertentu dan sampai jarak tertentu.</p><br>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 50px; padding-top:50px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h3 style="text-align: center"><b>Protokol Kesehatan Yang Harus Anda Patuh</b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="<?= base_url() ?>public/assets/images/rumah.svg" alt="">
                                <p><b><br>Tinggal Di Rumah</b><br>
                                    Tidak keluar bila tidak ada keperluan mendesak.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="<?= base_url() ?>public/assets/images/masker.svg" alt="">
                                <p><b><br>Selalu Jalankan 3M</b><br></p>
                                <ul>
                                    <li>Memakai masker dengan benar saat ke mana pun pergi</li>
                                    <li>Mencuci tangan dengan sabun dan air mengalir secara rutin</li>
                                    <li>Menjaga jarak aman 1,5 - 2 meter dengan orang lain</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="<?= base_url() ?>public/assets/images/gedung.svg" alt="">
                                <p><b><br>Maksimal 50%</b><br>
                                    Seluruh kegiatan yang diizinkan beroperasi harus beroperasi dalam kapasitas maksimal 50% dan menjalankan protokol kesehatan dengan ketat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <img src="<?= base_url() ?>public/assets/images/warning.svg" alt="">
                            <p><b><br>Ingatkan Sesama</b><br>
                                Saling mengingatkan untuk menjalankan protokol kesehatan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Blog post-->

            <div class="sidebar sidebar-modern col-md-3">
                <!--widget blog articles-->
                <div class="widget clearfix widget-blog-articles">
                    <h4 class="widget-title">Berita Desa</h4>
                    <ul class="list-posts list-medium">
                        <?php foreach ($Berita as $b) { ?>
                            <li><a href="<?= base_url() ?>Home/beritadetail?id=<?= $b->id_berita ?>"><?= $b->judul_berita ?></a>
                                <small><?php echo date("d F Y", strtotime($b->date_created)) ?></small>
                                <img alt="" src="<?= $b->getImage() ?>" class="img-fluid" style="width:100px">
                                <p><?= $b->getShortContent() ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!--end: widget blog articles-->

            </div>
            <!-- END: Sidebar-->
        </div>
    </div>
</section>
<!-- END: SECTION -->