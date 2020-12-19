<!-- CONTENT -->
<section class="content">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-modern post-content-single col-md-9">
                <!-- Post item-->
                <div class="post-item">
                    <div class="post-content-details">
                        <div class="post-title">
                            <h2>Sumber Daya Manusia Desa Petak</h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                        </div>
                        <div class="post-description">
                            <canvas id="myChart" style="width: 100%; height: 450px"></canvas>
                        </div>
                        <div class="post-description">
                            <br>
                            <h3>DATA SDM</h3>
                            <div class="table-responsive p-3">
                                <table class="table table-striped table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th>Uraian</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($sdm as $s) { ?>
                                            <tr>
                                                <td><?= $s->uraian_sdm ?></td>
                                                <td><?= $s->getSatuanVolume() ?></td>
                                            </tr>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: [
                <?php foreach ($sdm as $s) { ?> "<?= $s->uraian_sdm . " / " . $s->getSatuan()->jenis_satuan ?>", <?php } ?>
            ],
            datasets: [{
                label: 'Statistik sdm',
                data: [<?php foreach ($sdm as $s) { ?> "<?= $s->volume ?>", <?php } ?>],
                backgroundColor: [
                    <?php foreach ($sdm as $s) { ?> "<?= $s->getRandomColor() ?>", <?php } ?>
                ],
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>