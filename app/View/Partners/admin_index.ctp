<a href="/admin/partners/add">Добавить</a><br>
<?php 
 //debug($data);
foreach ($data as $item) : ?>
	<?php foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	<?=$item['Partner']['title']?> Редактировать: <a href="/admin/partners/edit/<?=$item['Partner']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/partners/edit/<?=$item['Partner']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/partners/edit/<?=$item['Partner']['id']?>?lang=en"> eng</a><br>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Partner']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	 <hr>
<?php endforeach; ?>