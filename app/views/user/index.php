<div class="container mt-3">
	<div class="row">
		<div class="col-sm-12">
			<?php
				Flasher::Message();
			?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
            <div class="row">
                <div class="col-sm">
                    <h1>User List</h1>
                </div>
                <div class="col-sm">
                    <div class="text-right">
                        <button type="button" class="btn btn-primary btnAddUser" data-toggle="modal" data-target="#exampleModal" data-zurl="<?= BASEURL; ?>">
                            Add User
                        </button>
                    </div>
                </div>
            </div>
			
            <div class="row">
                <form action="<?= BASEURL; ?>/user/search" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="search" class="search" class="form-control" placeholder="Search">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>

			<table class="table table-stripped">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col" width="200px">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data['users'] as $row) :?>
						<tr>
							<td><?= $row['full_name'];?></td>
							<td><?= $row['email'];?></td>
							<td>
								<a href="<?= BASEURL; ?>/user/detail/<?= $row['id'] ?>" class="badge badge-success badge-pill">Detail</a>
								<a href="<?= BASEURL; ?>/user/edit/<?= $row['id'] ?>" class="badge badge-warning badge-pill editUser" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['id'] ?>" data-zurl="<?= BASEURL; ?>">Edit</a>
								<a href="<?= BASEURL; ?>/user/delete/<?= $row['id'] ?>" class="badge badge-danger badge-pill" onclick="return confirm('Do you want to delete this user ?');">Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>		
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/user/adduser" method="POST" enctype="multipart/form-data">
      		<input type="hidden" name="id" id="id">
	        <div class="form-group">
	        	<label for="nama">User Name</label>
	        	<input type="text" name="full_name" id="full_name" class="form-control" placeholder="Add Name" required="true">
	        </div>
	        <div class="form-group">
	        	<label for="nama">Email</label>
	        	<input type="email" name="email" id="email" class="form-control" placeholder="Add Email Address" required="true">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
      	</form>
    </div>
  </div>
</div>