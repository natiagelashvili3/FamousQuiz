<?php if ($type == 1): ?>
	<div class="question-item" data-id="<?= $question['id'] ?>">
		<h2 class="question-heading"><?= $question['title'] ?></h2>
		<button class="answer" data-value="1">Yes</button>
		<button class="answer" data-value="0">No</button>
	</div>
<?php else: ?>
	<div class="question-item" data-id="<?= $question['id'] ?>">
		<h2 class="question-heading"><?= $question['title'] ?></h2>
		<?php foreach ($answers as $key => $value): ?>
			<button class="answer multi" data-id="<?= $value['id'] ?>"><?= $value['title'] ?></button>
		<?php endforeach ?>
	</div>
<?php endif ?>