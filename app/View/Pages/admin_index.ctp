<?php 

//debug($pages);

foreach ($pages as $page) : ?>
<br>
	<b><?=$page['Page']['title']?></b> Редактировать: <a href="/admin/pages/edit/<?=$page['Page']['id']?>?lang=ru"> рус</a> | 
	<a href="/admin/pages/edit/<?=$page['Page']['id']?>?lang=kz"> каз</a> |
	<a href="/admin/pages/edit/<?=$page['Page']['id']?>?lang=en"> eng</a>
	<br>
<?php endforeach; ?>