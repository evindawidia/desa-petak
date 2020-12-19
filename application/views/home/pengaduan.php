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
                                        <input type="email" aria-required="true" id="nik" placeholder="Masukkan email" name="nik" class="form-control required">
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
                    <div class="comment">
                        <a href="#" class="pull-left">
                            <img alt="" src="images/team/2.jpg" class="avatar">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Juna Smith</h4>
                            <p class="time">Jan 18, 2015 at 10:30 PM</p>
                            <p>Nullam nisl dui, congue in mi non, dapibus adipiscing metus. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue.</p>
                            <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>



                        <div class="comment comment-replied">
                            <a href="#" class="pull-left">
                                <img alt="" src="images/team/3.jpg" class="avatar">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Ariol Smith</h4>
                                <p class="time">Jun 24, 2015 at 14:28 PM</p>
                                <p>Ut ultrices consectetur eleifend. Nullam nisl dui, congue in mi non, dapibus adipiscing metus. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END: Comments-->
            </div>
            <!-- END: Blog post-->

            <!-- Sidebar-->
            <div class="sidebar sidebar-modern col-md-3">
                <!--widget blog articles-->
                <div class="widget clearfix widget-blog-articles">
                    <h4 class="widget-title">From our Blog</h4>
                    <ul class="list-posts list-medium">
                        <li><a href="#">Printing and typesetting</a>
                            <small>Jun 18 2015</small>
                        </li>
                        <li><a href="#">Lorem Ipsum has been the industry's</a><small>Jun 18 2015</small>
                        </li>
                        <li><a href="#">Ipsum and typesetting</a><small>Jun 18 2015</small>
                        </li>
                        <li><a href="#">Specimen book</a><small>Jun 18 2015</small>
                        </li>

                    </ul>
                </div>
                <!--end: widget blog articles-->

            </div>
            <!-- END: Sidebar-->
        </div>
    </div>
</section>
<!-- END: SECTION -->