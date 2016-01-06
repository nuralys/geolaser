<div class="cr">
	<section class="slider" >
		<?php foreach($slides as $slide): ?>
		<div class="slider__item">
			<a href="<?=$slide['Slide']['link'] ?>">
				<img src="/img/slider/<?=$slide['Slide']['img'] ?>" alt="<?=$slide['Slide']['title'] ?>"></a>
			<div class="des_slider">
				<?=$slide['Slide']['title'] ?>
			</div>
		</div>
		<?php endforeach ?>
		
	</section>
</div>

<div class="cr">
			<div class="container">
			<div class="content">
				<div class="content_block left">
					<div class="title"><h1><?php echo $page['Page']['title'] ?></h1></div>
					<?php echo $page['Page']['body'] ?>
					<a href="compani.html" class="button">Читать полностью</a>
				</div>
				<div class="content_block right">
					<div class="title"><h2>Последние новости</h2></div>
					<?php foreach($news as $item): ?>
						<div class="news_item">
							<div class="news_img">
								<img src="/img/news/thumbs/<?=$item['News']['img'] ?>" alt="<?=$item['News']['title'] ?>"></div>

							<a href="/<?=$lang?>news/view/<?=$item['News']['id'] ?>" class="news_title">
								<?=$item['News']['title'] ?>
							</a>
							<div class="date"><?php echo $this->Time->format($item['News']['date'], '%d.%m.%Y', 'invalid'); ?></div>
						</div>
					<?php endforeach ?>
					<a href="/<?=$lang?>news" class="button ">Посмотреть все</a>
				</div>

				<div class="partners_container">
					<div class="title"><h2>Наши клиенты и партнеры</h2></div>
					<div class="partners">
					<?php foreach($partners as $partner): ?>
						<div class="item-block">
							<a href="<?=$partner['Partner']['link']?>" title="<?=$partner['Partner']['title']?>" >
								<img src="/img/partner/<?=$partner['Partner']['img']?>" alt="<?=$partner['Partner']['title']?>" class="item-block__img"></a>
						</div>
						<?php endforeach ?>

					</div>
				</div>
				<div class="title"><h2>Публикации</h2></div>
				<div class="publications">
					<ul>
					<?php foreach($articles as $article): ?>
						<li class="publications_item">
							<div class="publications_item_img">
								<img src="/img/article/<?=$article['Article']['img']?>" alt="<?=$article['Article']['title']?>"></div>
							<a href="/<?=$lang?>articles/view/<?=$article['Article']['id']?>" class="publications_title">
								<?=$article['Article']['title']?>
							</a>
							<div class="date"><?php echo $this->Time->format($article['Article']['date'], '%d.%m.%Y', 'invalid'); ?></div>
						</li>
					<?php endforeach ?>
						
					</ul>
					<a href="/<?=$lang?>articles" class="button publication">Посмотреть все</a>
				</div>
			</div>
<?php echo $this->element('footer'); ?>
		</div>
		</div>
