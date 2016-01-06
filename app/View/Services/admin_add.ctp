<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление услуги</h2>
	</div>
<?php 
debug($s_list);
echo $this->Form->create('Service');
echo $this->Form->input('title', array('label' => 'Название:'));
?>

<div class="input select">
	<label for="ServiceParentId">Услуга:</label>
	<select name="data[Service][parent_id]" id="ServiceParentId">
		<option value="0">-</option>
		<?php foreach($s_list as $k => $v):?>
			<option value="<?=$k?>"><?=$v?></option>
		<?php endforeach ?>
	</select>
</div>

<?
// echo $this->Form->input('parent_id', array('label' => 'Услуга'));
echo $this->Form->input('body', array('id' => 'editor', 'label' => 'Текст'));
?>
<div class="price_part">
<?
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
?>
</div>
<? echo $this->Form->end('Сохранить');?>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>