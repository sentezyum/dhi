<div class="grid_3 alpha">
	<ul class="left_menu" style="margin-top:40px;">
		<li class="menu_header"><?php echo __('KURUMSAL'); ?></li>
		<li <?php if ($this->params->controller == 'page') {echo "class='active'";} ?>><?php echo $this->Html->link(__('Hakkımızda'), array('controller' => 'page', 'id' => 1, 'slug' => 'hakkimizda'), array('class' => 'core_animation_fast')); ?></li>
        <li <?php if ($this->params->controller == 'posts') {echo "class='active'";} ?>><?php echo $this->Html->link(__('Duyuru & Haberler'), array('controller' => 'posts'), array('class' => 'core_animation_fast')); ?></li>
        <li <?php if ($this->params->controller == 'references') {echo "class='active'";} ?>><?php echo $this->Html->link(__('Referanslar'), array('controller' => 'references'), array('class' => 'core_animation_fast')); ?></li>
	</ul>
</div>