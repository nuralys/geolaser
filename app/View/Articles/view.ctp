<div class="cr">
			<div class="container">
				<div class="content">
					<div class="title"><h1><?=$post['Article']['title'];?></h1></div>
					<div class="content_des">
						<?=$post['Article']['body'];?>
					</div>
				<div class="title"><h2>Остальные публикации</h2></div>
				<div class="publications">
					<ul>
						<?php foreach($articles as $article): ?>
						<li class="publications_item">
							<div class="publications_item_img">
								<a href="/<?=$lang?>articles/view/<?=$article['Article']['id'];?>">
									<img src="/img/article/thumbs/<?=$article['Article']['img'];?>" alt="<?=$article['Article']['title'];?>">
								</a>
							</div>
							<a href="/<?=$lang?>articles/view/<?=$article['Article']['id'];?>" class="publications_title">
								<?=$article['Article']['title'];?>
							</a>
							<div class="date">
								<?php echo $this->Time->format($article['Article']['date'], '%d.%m.%Y', 'invalid'); ?>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
					<a href="/<?=$lang?>articles" class="button publication">Посмотреть все</a>
				</div>
			
</div>
	<?php echo $this->element('footer'); ?>
		</div>	
	</div>