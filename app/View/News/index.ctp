<div class="cr">
	<div class="container">
		<div class="content">
		<div class="title"><h1>Новости</h1></div>

		<div class="publications">
			<ul>
				<?php foreach($data as $item): ?>
					<li class="publications_item">
						<div class="publications_item_img">
							<a href="/<?=$lang?>news/view/<?=$item['News']['id'];?>">
							<img src="/img/news/thumbs/<?=$item['News']['img'];?>" alt="<?=$item['News']['title'];?>"></a></div>
						<a href="/<?=$lang?>news/view/<?=$item['News']['id'];?>" class="publications_title">
							<?=$item['News']['title'];?>
						</a>
						<div class="date"><?php echo $this->Time->format($item['News']['date'], '%d.%m.%Y', 'invalid'); ?></div>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
	<?php echo $this->element('footer'); ?>
	</div>
</div>