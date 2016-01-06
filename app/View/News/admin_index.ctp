<a href="/admin/news/add">Добавить</a><br>
<?php 
// debug($data);
foreach ($data as $item) : ?>
	<?php foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	<?=$item['News']['title']?> Редактировать: <a href="/admin/news/edit/<?=$item['News']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/news/edit/<?=$item['News']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/news/edit/<?=$item['News']['id']?>?lang=en"> eng</a><br>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['News']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	 <hr>
<?php endforeach; ?>