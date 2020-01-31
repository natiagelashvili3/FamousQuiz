
<?php if ($data['question']['type'] == 1): ?>
	<form class="form" method="post" action="<?= SITE_URL.'admin/storeAnswer' ?>">
		<div class="form-group">
			<p>- <?= $data['question']['title'] ?></p>
		</div>
		<div class="form-group">
			Mark this question as
			<input type="radio" value="1" name="answer" <?= isset($data['answers']['correct']) && $data['answers']['correct'] == 1 ? 'checked="true"' : ''  ?>> True
			<input type="radio" value="0" name="answer" <?= isset($data['answers']['correct']) && $data['answers']['correct'] == 0 ? 'checked="true"' : ''  ?>> False
		</div>
		<input type="hidden" name="question_id" value="<?= $data['question']['id'] ?>">
		<input type="hidden" name="type" value="<?= $data['question']['type'] ?>">
		<button class="btn">Update</button>
	</form>
<?php else: ?>

	<div class="form">
		<div class="form-group">
			<p>- <?= $data['question']['title'] ?></p>
		</div>
		<div class="form-group">
			<?php foreach ($data['answers'] as $key => $value): ?>
				<div class="answers-single">
					<div>
						<?= $value['title'] ?> <?= $value['correct'] ? ' - <span class="green-s">Marked as correct answer</span>' : '' ?>
					</div>
					<div>
						<!-- <a href="<?= SITE_URL.'admin/editMultipleAnswer/'.$value['id'] ?>">Edit</a> -->
						<button data-id="<?= $value['id'] ?>" class="deleted-items">Delete</button>
					</div>		
				</div>
			<?php endforeach ?>
		</div>
		<input type="hidden" name="question_id" value="<?= $data['question']['id'] ?>">
		<input type="hidden" name="type" value="<?= $data['question']['type'] ?>">
		<a href="<?= SITE_URL.'admin/addAnswer/'.$data['question']['id'] ?>" class="btn">Add Answer</a>
	</div>

<?php endif ?>
