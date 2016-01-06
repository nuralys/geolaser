<a href="/admin/technologies/add">Добавить</a><br>
<?php 
// debug($data);
foreach ($data as $item) : ?>
	<?php foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	<?=$item['Technology']['title']?> Редактировать: <a href="/admin/technologies/edit/<?=$item['Technology']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/technologies/edit/<?=$item['Technology']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/technologies/edit/<?=$item['Technology']['id']?>?lang=en"> eng</a><br>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Technology']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	 <hr>
<?php endforeach; ?>