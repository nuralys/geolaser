<div class="cr">
			<div class="container">
				<div class="content">
					<div class="title"><h1><?=$post['News']['title'];?></h1></div>
					<div class="content_des">
						<?=$post['News']['body'];?>
					</div>
				<div class="title"><h2>Остальные публикации</h2></div>
				<div class="publications">
					<ul>
						<?php foreach($news as $article): ?>
						<li class="publications_item">
							<div class="publications_item_img">
								<a href="/<?=$lang?>news/view/<?=$article['News']['id'];?>">
									<img src="/img/news/thumbs/<?=$article['News']['img'];?>" alt="<?=$article['News']['title'];?>">
								</a>
							</div>
							<a href="/<?=$lang?>news/view/<?=$article['News']['id'];?>" class="publications_title">
								<?=$article['News']['title'];?>
							</a>
							<div class="date">
								<?php echo $this->Time->format($article['News']['date'], '%d.%m.%Y', 'invalid'); ?>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
					<a href="/<?=$lang?>news" class="button publication">Посмотреть все</a>
				</div>
			
</div>
	<?php echo $this->element('footer'); ?>
		</div>	
	</div>