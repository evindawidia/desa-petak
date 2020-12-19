<?= $this->session->flashdata('msg') ?>
<!-- CONTENT -->
<section class="content">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-modern post-content-single col-md-9">
                <!-- Post item-->
                <div class="post-item">
                    <div class="post-image">
                        <a href="#">
                            <img alt="" src="<?= $berita->getImage() ?>" style="width:300px">
                        </a>
                    </div>
                    <div class="post-content-details">
                        <div class="post-title">
                            <h2><?= $berita->judul_berita ?></h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                            <span class="post-category">in <?= $berita->getKatBerita() ?></span>
                        </div>
                        <div class="post-description">
                            <p><?= $berita->content_berita ?></p>
                        </div>
                    </div>
                    <div class="post-meta">
                        <div class="post-date">
                            <span class="post-date-day"><?php echo date("d", strtotime($berita->date_created)) ?></span>
                            <span class="post-date-month"><?php echo date("F", strtotime($berita->date_created)) ?></span>
                            <span class="post-date-year"><?php echo date("Y", strtotime($berita->date_created)) ?></span>
                        </div>

                        <div class="post-comments">
                            <a>
                                <i class="fa fa-comments-o"></i>
                                <span class="post-comments-number"><?php echo count($berita->getComment()); ?></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Comments-->
                <div id="comments" class="comments">
                    <div class="heading">
                        <h4 class="comments-title">Comments <small class="number"><?php echo count($berita->getComment()); ?></small></h4>
                    </div>
                    <?php foreach ($berita->getComment() as $b) { ?>
                        <div class="comment">
                            <a class="pull-left">
                                <img alt="" src="images/team/1.jpg" class="avatar">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $b->sender_name ?></h4>
                                <p class="time"><?= date("d F Y", strtotime($b->date_created)) ?></p>
                                <p><?= $b->comment ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="comment-form">
                    <div class="heading">
                        <h4>Leave a comment</h4>
                    </div>
                    <form class="form-gray-fields" action="<?= base_url() . "Home/doaddcomment?id=" . $berita->id_berita ?>" method="POST">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name" class="upper">Nama</label>
                                    <input type="text" aria-required="true" id="name" placeholder="Masukkan nama" name="sender_name" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="address" class="upper">Alamat</label>
                                    <textarea aria-required="true" id="address" placeholder="Masukkan alamat" rows="5" name="address" class="form-control required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment" class="upper">Tulis Komentar</label>
                                    <textarea aria-required="true" id="comment" placeholder="Masukkan komentar" rows="9" name="comment" class="form-control required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Kirim Komentar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- END: Comments-->
            </div>
            <!-- END: Blog post-->

            <!-- Sidebar-->
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