<a href="/admin/services/add">Добавить</a><br>
<?php 
// debug($data);
foreach ($data as $item) : ?>
	<?php foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	<?=$item['Service']['title']?> Редактировать: <a href="/admin/services/edit/<?=$item['Service']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/services/edit/<?=$item['Service']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/services/edit/<?=$item['Service']['id']?>?lang=en"> eng</a><br>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Service']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	 <hr>
<?php endforeach; ?>