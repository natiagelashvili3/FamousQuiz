<a href="<?= SITE_URL.'admin/addquestion' ?>" class="btn btn-add">Add</a>

<ul class="questions-list">
	<?php $i=0; foreach ($data['questions'] as $key => $value): ?>
		<li class="question-item">
			(<?= $value['type'] == 1 ? "binary" : "multiple" ?>) <?= $value['title'] ?>
			<div>
				<a href="<?= SITE_URL.'admin/answers/'.$value['id'] ?>" class="modify">Modify answers</a>
				<button data-id="<?= $value['id'] ?>" class="delete-item">Delete</button>
			</div>
		</li>
	<?php $i++; endforeach ?>

</ul>