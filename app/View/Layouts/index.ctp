<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		<?php echo $title_for_layout ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php if(isset($meta['keywords'])): ?>
		<meta name="keywords" content="<?=$meta['keywords']?>">
	<?php endif; ?>
	<?php if(isset($meta['description'])): ?>
		<meta name="description" content="<?=$meta['description']?>">
	<?php endif; ?>
	<?php
		

		echo $this->Html->css(array('reset', 'style', 'slide', 'jquery.fancybox.css?v=2.1.5', ));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script(array('jquery-2.1.4', 'jquery.fancybox.pack.js?v=2.1.5', 'app','ckeditor/ckeditor.js','responsive-nav'));
	?>
</head>
<body>
	<div class="page">
		<?php echo $this->element('header'); ?>		
		<?php echo $this->fetch('content') ?>		
		<?php //echo $this->element('sidebar') ?>
	
	
	</div>
</body>
</html>