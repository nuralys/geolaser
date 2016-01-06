<header>
			<div class="cr">
				<div class="top_line">
					<div class="lang">
						<a href="/kz" <?php echo (isset($this->request->params['language']) && $this->request->params['language'] == 'kz') ? "class='active'" : "" ?>>KZ</a>
						|
						<a href="/" <?php if(!isset($this->request->params['language'])){echo "class='active'";} ?>>RU</a>
						|
						<a href="/en" <?php echo (isset($this->request->params['language']) && $this->request->params['language'] == 'en') ? "class='active'" : "" ?>>ENG</a>
					</div>
				</div>
				<div class="head">
					<div class="logo">
						<a href="/">
							<img src="/img/logo.png" alt="Geo Laser - 3D инженерные изыскания"></a>
					</div>
					<div class="head_center">
						<div class="head_tagline">
							<span>3D</span>
							инженерные
							<br>изыскания</div>
					</div>
					<div class="head_phone">
						<span>+7</span>
						<a class="tel"href="tel:+77172 78 38 02">(7172) 78 38 02</a>
						<a class="tel two"href="tel:+7702 411 13 34">702 411 13 34</a>
						<a href="" class="price_button">Прайс заявка</a>
					</div>
					<div class="menu" id="nav">
						<ul class="menu_list">
							<li >
								<a 
								<?php
									if(!empty($this->request->params['pass']) && $this->request->params['pass'][0] == 'about' || !empty($this->request->params['pass']) && $this->request->params['pass'][0] == 'oborudovanie' || $this->request->params['controller'] == 'news')
								 echo "class='active'"; ?>
								>Компания</a>
								<div class="sub_menu min">
									<ul >
											<li>
												<a href="/<?=$lang?>pages/about">О компании</a>
											</li>
											<li>
												<a href="/<?=$lang?>news">Лента новостей</a>
											</li>

											<li>
												<a href="/<?=$lang?>pages/oborudovanie">Используемое оборудование</a>
											</li>
										</ul>
								</div>
							</li>
							<li>
								<a <?php echo ($this->request->params['controller'] == 'services')?"class='active'":"" ?> href="">Услуги</a>
								<div class="sub_menu">
									<div class="sub_menu_left">
										<div class="mine_title">Обмерные работы в промышленности, 
энергетике, на транспорте и в топографии</div>
										<ul >
										<?php foreach($menu_left as $item): ?>
											<li>
												<a href="/<?=$lang?>services/view/<?=$item['Service']['id']?>"><?=$item['Service']['title'] ?></a>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="sub_menu_right">
										<div class="mine_title">Обмерные работы в строительстве, 
реставрации, архитектуре</div>
										<ul >
											<?php foreach($menu_right as $item): ?>
											<li>
												<a href="/<?=$lang?>services/view/<?=$item['Service']['id']?>"><?=$item['Service']['title'] ?></a>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<a <?php echo ($this->request->params['controller'] == 'technologies')?"class='active'":"" ?>href="">Технологии</a>
								<div class="sub_menu tex">
									<ul>
									<?php foreach($technologies as $item): ?>
										<li>
											<a href="/<?=$lang?>technologies/<?=$item['Technology']['alias']?>"><?=$item['Technology']['title']?></a>
										</li>
									<?php endforeach ?>
									</ul>
								</div>
							</li>
							<li>
								<a href="/<?=$lang?>projects" <?php echo ($this->request->params['controller'] == 'projects')?"class='active'":"" ?>>Проекты</a>
							</li>
							<li>
								<a href="/<?=$lang?>articles" <?php echo ($this->request->params['controller'] == 'articles')?"class='active'":"" ?>>Публикации</a>
							</li>
							<li>
								<a href="/<?=$lang?>pages/kontakty" <?php
									if(!empty($this->request->params['pass']) && $this->request->params['pass'][0] == 'kontakty')
								 echo "class='active'"; ?>>Контакты</a>
							</li>
						</ul>
						<script>
						      var navigation = responsiveNav("#nav", {
						        insert: "before"
						      });
						    </script>
					</div>
				</div>

			</div>
		</header>