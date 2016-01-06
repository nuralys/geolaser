<div class="cr">
	<div class="container">
		<div class="content">
		<div class="title"><h1>Публикации</h1></div>

		<div class="publications">
			<ul>
				<?php foreach($data as $item): ?>
					<li class="publications_item">
						<div class="publications_item_img">
							<a href="/<?=$lang?>articles/view/<?=$item['Article']['id'];?>">
							<img src="/img/article/thumbs/<?=$item['Article']['img'];?>" alt="<?=$item['Article']['title'];?>"></a></div>
						<a href="/<?=$lang?>articles/view/<?=$item['Article']['id'];?>" class="publications_title">
							<?=$item['Article']['title'];?>
						</a>
						<div class="date"><?php echo $this->Time->format($item['Article']['date'], '%d.%m.%Y', 'invalid'); ?></div>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
	<?php echo $this->element('footer'); ?>
	</div>
</div>