<a href="/admin/projects/add">Добавить</a><br>
<?php 
// debug($data);
foreach ($data as $item) : ?>
	<?php foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	<?=$item['Project']['title']?> Редактировать: <a href="/admin/projects/edit/<?=$item['Project']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/projects/edit/<?=$item['Project']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/projects/edit/<?=$item['Project']['id']?>?lang=en"> eng</a><br>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Project']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	 <hr>
<?php endforeach; ?>