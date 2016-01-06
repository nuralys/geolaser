<div class="title">
	<h1>
		Результаты поиска
	</h1>
</div>
<div class="min_title">
	Введите ключевые слова для поиска
</div>				
<div class="search pages">
	<form action="/news/search/">
		<input placeholder="Поиск..." type="text" name="q">
		<div class="sub_b pages">
			<button type="submit"></button>
		</div>
	</form>
</div>
<div class="news_container">
	<ul class="search_list">
	<?php if(is_array($search_res)): ?>
		<?php if(empty($search_res)): ?>
	<li>По данному запросу 0 результатов...</li>
		<?php endif ?>
		<?php foreach($search_res as $item): ?>
			<li>
			<a href="/news/view/<?=$item['news']['id'] ?>"class="search_title">
				<?=$item['news']['title'] ?>
			</a>
			<p>
				<?= $this->Text->truncate(strip_tags($item['news']['body']), 55, array('ellipsis' => '...', 'exact' => true)) ?>
			</p>
			<div class="date_min"><?php echo $this->Time->format($item['news']['date'], '%d.%m.%Y', 'invalid'); ?></div>
			</li>
		<?php endforeach ?>
<?php else: ?>
	<li><?php echo $search_res ?></li>
<?php endif ?>
	</ul>
</div>