<!-- CONTENT -->
<section class="content">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-modern post-content-single col-md-9">
                <!-- Post item-->
                <div class="post-description">
                    <div class="comment-form">
                        <div class="heading" style="margin-bottom: 30px">
                            <h4>Pengaduan Masyarakat</h4>
                        </div>
                        <form class="form-gray-fields" action="<?= base_url() . "Home/doaddpengaduan" ?>" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="upper">Nama</label>
                                        <input type="text" aria-required="true" id="name" placeholder="Masukkan Nama" name="sender_name" class="form-control required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="upper">NIK</label>
                                        <input type="number" aria-required="true" id="nik" placeholder="Masukkan email" name="nik" class="form-control required">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="phone" class="upper">Alamat</label>
                                        <textarea type="text" aria-required="true" id="address" placeholder="Masukkan Alamat" rows="3" name="address" class="form-control required"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comment" class="upper">Tulisakan Pengaduan</label>
                                        <textarea aria-required="true" id="comment" placeholder="Pengaduan Anda" rows="9" name="comment" class="form-control required"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Kirimkan Pengaduan</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Comments-->
                <div id="comments" class="comments">
                    <div class="heading">
                        <h4 class="comments-title">Pengaduan <small class="number">(4)</small></h4>
                    </div>

                    <?php foreach ($pengaduan as $p) { ?>
                        <div class="comment">
                            <div class="media-body">
                                <h4 class="media-heading"><?= $p->sender_name ?></h4>
                                <p class="time"><?= date("d F Y", strtotime($p->date_created)) ?></p>
                                <p><?= $p->comment ?></p>
                                <?php
                                if (count($p->getBalasan())  != 0) { ?>
                                    <a href="#" class="comment-reply pull-right see-comment" data-target=".balasan-<?= $p->id_pengaduan ?>"><i class='fa fa-eye'></i> Lihat Tanggapan</a>
                                <?php } ?>
                            </div>
                            <div class="balasan-<?= $p->id_pengaduan ?> hide">
                                <?php foreach ($p->getBalasan() as $balas) { ?>
                                    <div class="comment comment-replied bg-light" style="margin-top: 10px">
                                        <div class="media-body">
                                            <h4 class="media-heading">Admin</h4>
                                            <p class="time"><?= date("d F Y", strtotime($balas->date_created)) ?></p>
                                            <p><?= $balas->comment ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <!-- END: Comments-->
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

<script>
    $(".see-comment").click(function(e) {
        e.preventDefault()
        var target = $(this).attr("data-target")
        if ($(target).hasClass("hide")) {
            $(target).removeClass("hide")
            $(this).html("<i class='fa fa-times'></i> Tutup Tanggapan")
        } else {
            $(target).addClass("hide")
            $(this).html("<i class='fa fa-eye'></i> Lihat Tanggapan")
        }
    })
</script>