<li>
	<div class="l_up"><?php echo $services1['Service']['title']; ?>  (<a href="/admin/services/edit/<?php echo $services1['Service']['id']; ?>">Редактировать</a> | <a href="/admin/services/delete/<?php echo $services1['Service']['id']; ?>">Удалить</a>)</div>
	<?php if($services1['children']) : ?>
	<ul class="under">
		<?php echo $this->_catMenuHtml($services1['children']); ?>
	</ul>
	<?php endif; ?>
</li>