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
                            <img alt="" src="https://cdn-radar.jawapos.com/uploads/radarmojokerto/news/2017/07/13/balai-desa-termahal-dan-termegah-ini-fotonya_m_970.jpeg">
                        </a>
                    </div>
                    <div class="post-content-details">
                        <div class="post-title">
                            <h2>VISI & MISI Desa Petak</h2>
                        </div>
                        <div class="post-info">
                            <span class="post-autor">Post by: Pemerintahan Desa Petak</span>
                        </div>
                        <div class="post-description">
                            <h3>VISI</h3>
                            <p>Aparatur Desa Petak dan Masyarakat setempat sepakat bahwa Visi adalah gambaran umum dari kondisi yang ideal yang dibutuhkan oleh Desa Petak di masa yang akan datang yang dicapai bersama dengan partisipasi masyarakat untuk jangka waktu tertentu.
                                Jangka waktu sebagaimana dimaksud sesuai dengan Peraturan Menteri dalam Negeri Nomor 114 tahun 2014 tentang Pembangunan Desa, yaitu 6 (enam) tahun. Jangka waktu dimaksud bagi Desa Petak adalah dari Tahun 2020 sampai dengan 2026.-
                                Adapun sesuai kesepakatan antara Pemerintah Desa Petak dengan BPD Desa. Petak bahwa visi Desa Petak adalah :
                            </p>
                            <blockquote>
                                <p>Terwujudnya Pemerintah DEsa Petak yang Sehat, Cerdas, Berdaya saing, Jujur, Adil, Aman, Sejahtera, Bermartabat, Berbudaya dan Berakhlak Mulia.</p>
                            </blockquote>
                        </div>
                        <div class="post-description">
                            <h3>MISI</h3>
                            <ol>
                                <li>Misi Membangun Perencanaan yang Akuntabel.</li><br>
                                Misi ini menjelaskan Penciptaan Fondasi Manajemen Pemerintahan yang Mantab melalui Pengembangan Data / Informasi Desa yang benar dan rinci Menuju Perencanaan Desa yang Detil dan Lengkap serta Berkualitas.<br>
                                Misi ini disepakati karena terbukti kualitas manajemen pemerintahan tergantung dengan kualitas manajemen pembangunan. Aspek Pemerintahan adalah bagian yang tidak terpisahkan dari proses pembangunan dan sebaliknya aspek pembangunan adalah kewajiban yang harus dipenuhi dalam pemerintahan. Pembangunan adalah upaya pemerintah dan segenap masyarakat dalam melakukan perubahan keadaan dari keadaan sekarang menuju keadaan yang ideal dan lebih memenuhi hajat kehidupan orang banyak, dan lebih baik sesuai dengan perkembangan tingkat peradaban manusia.<br>
                                Pemerintah yang tidak melakukan amanat pembangunan merupakan organisasi yang lalim.Sedangkan manajemen pembangunan menempatkan perencanaan sebagai tahapan profesional pemerintah yang harus dipenuhi.Tanpa perencanaan yang baik suatu pemerintahan menunjukkan dirinya tidak profesional.<br>
                                Perencanaan yang baik disusun berbasis data/informasi tolok ukur yang jelas dan riil.Data / informasi yang riil dimaksud adalah data profil desa. Informasi profil yang salah akan menyesatkan pikiran pengambil keputusan dalam perencanaan kebijakan. Artinya data yang salah akan menghasilkan perencaanaan yang salah. Perencanaan yang salah sama artinya merencanakan kesalahan.<br>
                                Kesalahan dalam merencanakan dan melaksanakan kebijakan pembangunan merupakan indikator tata pemerintahan yang kurang baik.Oleh sebab itu diyakini “good village governance” tidak mungin terwujud jika fondasi pembangunan yaitu pengelolaan data/informasi dan perencanaan dan pelaksanaan rencana pembangunan tidak akuntabel. (tidak bisa dipertanggungjawabkan).<br>
                                Akuntabilitas adalah kemampuan penerima amanat pembangunan dalam mempertanggungjawabkan pelaksanaan rencana pembangunan yang sudah disepakati.
                                <li>Misi Mewujudkan penyelenggaraan pertanian yang bermutu sesuai dengan Topografi desa dan memaksimalkan potensi yang ada.</li>
                                <li>Misi Memberikan Fasilitasi Pembinaan dan Pengembangan Keterampilan dan Kreativitas Masyarakat untuk menciptakan lapangan kerja dan Wira Usaha Baru.</li>
                            </ol>
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