		<!-- above is header -->
		<?php
            $model = new UsersModel();
            //$photoInfo = $model->getPhotobyId($photoId);
            $photo = $model->getListPhoto("", $photoId, 0)[0];
            
            if($photo == null) {
                echo "<h1>Photo not exist</h1>";
            } else {
                $owner = $model->getUserbyId($photo->snippet['userUpload']);
                if($owner == null)
                    echo "Could not get owner of this photo";
        ?>
		<div class="warper container-fluid">
			<div class="page-header text-center">
				<h1><?php echo basename($photo->snippet['photoName'], '.jpg'); ?></h1>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div id="photo" data-id="01">
						<img src="<?php echo $photo->snippet['path'].'/'.$photoId.'/M/'.$photo->snippet['photoName'];?>" alt="" class="img-responsive">
						<button class="fullscreen-toggle transit btn btn-default"><i class="fa fa-arrows-alt"></i>
						</button>
					</div>
					<div class="panel panel-default actions">
						<div class="panel-body row">
							<div class="col-sm-6">
								<a href="<?php echo $photo->snippet['path'].'/'.$photoId.'/F/'.$photo->snippet['photoName'];?>" class="btn btn-default"><i class="fa fa-download"></i> Tải ảnh</a>
							</div>
							<div class="col-sm-6 photo-statistics text-right">
								<b><?php echo $photo->statistics['view']; ?></b> lượt xem
								<div class="rating">
									<small>(<span class="rating-count"><?php echo $photo->statistics['rating']['total']; ?></span> đánh giá)</small>
									<span class="star-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default description">
						<div class="panel-body">
							<div class="description-content">
								<?php echo $photo->snippet['description']; ?>
							</div>
							<a class="edit" href="#"><i class="fa fa-pencil"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default photo-rating">
						<div class="panel-heading">Đánh giá ảnh</div>
						<div class="panel-body text-center">
							<input type="number" name="rating" id="rating-input" class="rating" data-icon-lib="fa" data-active-icon="fa-star" data-inactive-icon="fa-star-o" data-max="5" data-min="1" disabled />
						</div>
					</div>
					<div class="panel panel-primary photo-info">
						<div class="panel-heading">Thông tin ảnh</div>
						<div class="panel-body photo-details">
							<div class="author clearfix">
								<a href="user1.html"><img src="assets/images/avtar/user.jpg" alt="" class="avatar">
								</a>
								<div>
									<a href="user1.html" class="name"><?php echo $owner->fullName; ?></a>
									<p class="small n"><b><?php echo $owner->numPhoto; ?></b> ảnh</p>
								</div>
							</div>
							<dl class="data photo-data">
								<dt><i class="fa fa-map-marker"></i> Địa điểm</dt>
								<dd><?php echo $owner->provinceName; ?></dd>
								<dt><i class="fa fa-calendar"></i> Thời gian</dt>
								<dd><?php echo date("d/m/Y h:m:s", strtotime($photo->snippet['dateUploaded'])); ?></dd>
								<dt><i class="fa fa-photo"></i> Album</dt>
								<dd><?php echo $photo->snippet['albumName']; ?></dd>
								<dt>...</dt>
								<dd>...</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="container-fluid footer">
            Copyright &copy; 2015 <a href="#">Lawrence S.Ting Fund | IS Technology Co., Ltd.</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
	</section>
	<!-- /footer - begin scripts-->
	<!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<!-- NanoScroll -->
	<script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Rating -->
	<script src="assets/js/plugins/rating/rating.min.js"></script>
	
	
	<!-- Custom JQuery -->
	<script src="assets/js/app/custom.js" type="text/javascript"></script>
</body>
</html>
<?php
            }
?>