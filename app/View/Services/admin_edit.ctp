<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование услуги</h2>
	</div>
<?php 
echo $this->Form->create('Service', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
// echo $this->Form->input('News.title.kz', array('label' => 'Название kz:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
?>
	<div class="bot_r">
	<?
	echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
	echo $this->Form->input('description', array('label' => 'Описание:'));
	echo $this->Form->end('Редактировать');
	?>
	</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>