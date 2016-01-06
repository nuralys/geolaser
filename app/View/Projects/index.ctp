<div class="cr">
	<div class="container">
		<div class="content">
		<div class="title"><h1>Проекты</h1></div>
<div class="content_des">
				<?php foreach($data as $item): ?>
					<div class="project_item">
						<div class="poject_item_img">
							<a href="/<?=$lang?>projects/view/<?=$item['Project']['id'];?>"><img src="/img/project/thumbs/<?=$item['Project']['img'];?>" alt="<?=$item['Project']['title'];?>"></a>
						</div>
						<a href="/<?=$lang?>projects/view/<?=$item['Project']['id'];?>" class="project_title">
							<?=$item['Project']['title'];?>
						</a>
						<div class="project_des">
							<p><?= $this->Text->truncate(strip_tags($item['Project']['body']), 428, array('ellipsis' => '...', 'exact' => true)) ?></p>
						</div>
						<a href="/<?=$lang?>projects/view/<?=$item['Project']['id'];?>" class="button">Читать полностью</a>
					</div>
					<?php endforeach ?>
				</div>
	</div>
	<?php echo $this->element('footer'); ?>
	</div>
</div>