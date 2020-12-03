<div class="page-wrapper">

	<div class="page-breadcrumb">
		<div class="row align-items-center">
			<div class="col-5">
				<h4 class="page-title">Edit Data Berita</h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url()?>Admin/">Admin</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>Admin/berita">Berita</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Data Berita</li>
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
								<h4 class="card-title">Edit Data Berita</h4>
								<h5 class="card-subtitle">Isikan form dibawah untuk mengedit berita</h5>
							</div>
						</div>
						<!-- title -->

						<div class="col-md-12 p-3">
                            <?= $this->session->flashdata('msg') ?>
							<?php echo form_open_multipart('Admin/doeditberita?id='.$id);?>
								<div class="row">

									<div class="col-md-3">
										<div class="col-md-12 p-1">
											<img class="img-fluid w-100"
												src="<?= $berita->getImage() ?>"
												id="img-preview">
										</div>
										<div class="col-md-12">
											<input name="image" type="file" id="img-input" class="form-control" accept="image/*">
										</div>
									</div>

									<div class="col-md-9">
										<div class="form-group">
											<label>Judul</label>
											<input type="text" name="judul_berita" value="<?= $berita->judul_berita ?>" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Kategori Berita</label>
											<select name="kat_berita_id" class="form-control" required>
                                                <?php foreach($kat_berita as $kb){ ?>
                                                    <option <?=($berita->kat_berita_id == $kb->id_kat_berita) ? "selected" : "";?> 
                                                    value="<?= $kb->id_kat_berita ?>"><?= $kb->kat_berita ?></option>
                                                <?php } ?>
											</select>
                                        </div>
                                        <div class="form-group">
											<label>Konten Berita</label>
											<textarea name="content_berita" required><?= $berita->content_berita ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                                        </div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer text-center">
		<a>Copyright &copy Desa Mojoroto <?= date("Y")?> Created by Evinda Widia Cahyaningrum</a>
	</footer>
</div>


<script>
    CKEDITOR.replace('content_berita');
</script>

<script>
    var defaultimg = "https://getuikit.com/v2/docs/images/placeholder_600x400.svg";
    function previewimage(input, target){
        var reader = new FileReader();
        reader.onload = function(e){
            var output = $(target);
            output.attr("src", e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
    }
    $("#img-input").change(function(){
        if ($(this).val() != ""){
            previewimage(this, "#img-preview")
        }else{
            $("#img-preview").attr("src", defaultimg)
        }
    })
</script>