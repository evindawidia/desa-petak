<!-- BLOG -->
<section class="background-grey">
    <div class="container">
        <div data-animation-delay="100" data-animation="fadeInUp">
            <div class="heading heading heading-center">
                <h1 class="text-medium">Berita Desa</h1>
                <span class="lead">Berikut adalah berita dan event desa</span>
            </div>
        </div>
        <div id="blog">
            <div class="container">
                <!-- Blog post-->
                <div class="post-content post-block post-light-background post-3-columns">
                    <!-- Blog image post-->
                    <?php
                    foreach ($Berita as $b) { ?>
                        <div class="post-item" data-animation="fadeInUp" data-animation-delay="0">
                            <div class="post-image gallery">
                                <a href="<?= $b->getImage() ?>" data-src="<?= $b->getImage() ?>">
                                    <img alt="" src="<?= $b->getImage() ?>">
                                </a>
                            </div>
                            <div class="post-content-details">
                                <div class="post-title">
                                    <h3><a href="<?= base_url() ?>Home/beritadetail?id=<?= $b->id_berita ?>"><?= $b->judul_berita ?></a></h3>
                                </div>
                                <div class="post-info">
                                    <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                                    <span class="post-category">in <?= $b->getKatBerita() ?></span>
                                </div>
                                <div class="post-description">
                                    <p><?= $b->getShortContent() ?></p>

                                    <div class="post-info">
                                        <a class="read-more" href="<?= base_url() ?>Home/beritadetail?id=<?= $b->id_berita ?>">read more <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="post-meta">
                                <div class="post-date">
                                    <span class="post-date-day"><?php echo date("d F Y", strtotime($b->date_created)) ?></span>
                                </div>

                                <div class="post-comments">
                                    <a href="<?= base_url() ?>Home/beritadetail?id=<?= $b->id_berita ?>">
                                        <i class="fa fa-comments-o"></i>
                                        <span class="post-comments-number"><?php echo count($b->getComment()); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- END: Blog post-->
            </div>
        </div>

    </div>
</section>
<!-- BLOG -->