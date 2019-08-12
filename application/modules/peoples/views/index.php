<div class="container">
	<h3 class="mt-3">List of People</h3>

	<div class="row">
		<div class="col-md-5">
			<form action="<?= base_url('peoples') ?>" method="post">
				<div class="input-group mb-3">
				  <input type="text" class="form-control" name="keyword" placeholder="Search Your Name or Email" autocomplete="off" autofocus>
				  <div class="input-group-append">
				    <input class="btn btn-primary" type="submit" name="submit" >
				  </div>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10">
			<h5>Result : <?= $total_row; ?></h5>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php if (empty($peoples)) : ?>
					<tr>
						<td colspan="4">
							<div class="alert alert-danger" role="alert">
							 Data Not Found!
							</div>
						</td>
					</tr>
				<?php endif; ?>
				<?php foreach ($peoples as $p ) : ?>
				<tbody>
					<td><?= ++$start;  ?></td>
					<td><?= $p['name'];  ?></td>
					<td><?= $p['email'];  ?></td>
					<td>
						<a href="#" class="badge badge-warning">detail</a>
						<a href="#" class="badge badge-success">edit</a>
						<a href="#" class="badge badge-danger">hapus</a>
					</td>
				</tbody>
				<?php endforeach; ?>
			</table>

			<?= $this->pagination->create_links(); ?>
		</div>
	</div>
</div>