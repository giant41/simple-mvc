<div class="container mt-3">
	<div class="card text-center" style="width: 18rem;">
		<img class="card-img-top rounded-circle" height="250px" src="<?= BASEURL ?>/img/profile.jpg" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title"><?= $data['user']['full_name']; ?></h5>
			<p class="card-text"><?= $data['user']['email']; ?></p>
			<a href="<?= BASEURL; ?>/user" class="btn btn-primary">Back</a>
		</div>
	</div>
</div>