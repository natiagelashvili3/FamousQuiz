<form class="form" action="<?= SITE_URL.'admin/storeMultiplesAnswer' ?>" method="post">
	<div class="form-group">
		<input type="text" name="title" placeholder="title" required>
	</div>
	<div class="form-group">
		<input type="checkbox" name="correct" value="0" >Correct
	</div>
	<input type="hidden" name="question_id" value="<?= $data['question_id'] ?>">
	<button class="btn" type="submit">Add</button>
</form>