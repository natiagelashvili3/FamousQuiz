<form class="form" action="<?= SITE_URL.'admin/storeQuestion' ?>" method="post">
	<div class="form-group">
		<input type="text" name="title" placeholder="title" required>
	</div>
	<div class="form-group">
		<input type="radio" name="type" value="1" checked="">Binary Type
		<input type="radio" name="type" value="2" >Multichoice Type
	</div>
	<button class="btn" type="submit">Add</button>
</form>