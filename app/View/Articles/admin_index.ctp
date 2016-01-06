<a href="/admin/articles/add">Добавить</a><br>
<?php 
// debug($data);
foreach ($data as $item) : ?>
	<?php foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	<?=$item['Article']['title']?> Редактировать: <a href="/admin/articles/edit/<?=$item['Article']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/articles/edit/<?=$item['Article']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/articles/edit/<?=$item['Article']['id']?>?lang=en"> eng</a><br>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Article']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	 <hr>
<?php endforeach; ?>