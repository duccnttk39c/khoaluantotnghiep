<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý tin tức</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>vendor/isotope.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>vendor/imagesloaded.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
 	<script src="<?php echo base_url() ?>/ckeditor/ckeditor.js"></script>
 	<script src="<?php echo base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>
</head>
<body>
	<?php include 'header_admin.php'; ?>
	<div class="container-fluid mt-3 pt-2">
		<div class="row">
			<div class="col-sm-6 themmoi">
				<div class="jumbotron text-xs-center">
					<h1>Thêm mới tin tức</h1>
					<p class="lead">Form này cho phép thêm tin tức vào cơ sở dữ liệu</p>
					<hr class="m-y-md">
				</div>
				<div class="formthemmoi">
					<form action="<?= base_url() ?>news/addNews" method="POST" enctype="multipart/form-data">
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tiêu đề tin</label>
							<input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Tiêu đề" required="">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Ảnh tin</label>
							<input type="file" name="image_news" class="form-control" placeholder="Ảnh tin">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Trích dẫn</label>
							<input type="text" name="quote" class="form-control" placeholder="Trích dẫn" required="">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Danh mục tin</label>
							<select name="id_catenews" id="" class="form-control">
								<?php foreach ($dulieudanhmuc as $row): ?>

								<option value="<?= $row['id'] ?>" required=""> <?= $row['name_catenews'] ?></option>

								<?php endforeach ?>
							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Nội dung tin</label>
							<textarea name="content_news" id="content_news" class="content_news" cols="30" rows="10" required="">
								
							</textarea>
						</fieldset>
						<fieldset class="form-group">
							<input type="submit" class="btn btn-success btn-block btn-lg" value="Thêm tin">
						</fieldset>
					</form>
				</div>
			</div>
			<div class="col-sm-6 danhsach">
				<div class="jumbotron text-xs-center">
					<h1>Danh sách tin</h1>
					<p class="lead">Các tin tức đã thêm</p>
					<hr class="m-y-md">
				</div>
				<!-- khoi danh sach tin -->
				<div class="row">
					<div class="card-group">
						<?php foreach ($dulieutin as $value): ?>
						<div class="col-sm-6">
							<div class="card">
								<?php 
								if (empty($value['image_news'])) {
								?>	
								<img class="card-img-top img-fluid" src="http://placehold.it/700x300" alt="Card image cap">
								<?php 
								} else {
								?>	
								<img class="card-img-top img-fluid" src="<?= $value['image_news'] ?>" alt="Card image cap">
								<?php } ?>
								<div class="card-block">
									<h4 class="card-title"><?= $value['title'] ?></h4>
									<p class="card-text"><?= $value['quote'] ?></p>
									<p class="card-text"><small class="text-muted">Đăng vào ngày <?= date('d/m/Y - G:i - A',$value['date_created']) ?></small></p>
									<a href="<?= base_url() ?>news/editNews/<?= $value['id'] ?>" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></a>
									<a href="<?= base_url() ?>news/deleteNews/<?= $value['id'] ?>" class="btn btn-outline-danger"><i class="fa fa-remove"></i></a>
								</div>
							</div>
						</div>

						<?php endforeach ?>
					</div>	
				</div> <!-- het khoi danh sach tin -->
			</div>
		</div>
	</div>
	<script>

		CKEDITOR.replace( 'content_news', {
		    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
		});
	</script>
</body>
</html>