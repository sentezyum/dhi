<div class="grid_12 content">
    <?php echo $this->element('kurumsal'); ?>

    <div class="grid_9 omega product" style="margin-top:40px;">
        <h3><?php echo __("DUYURU & HABERLER"); ?></h3>
        <?php foreach ($posts as $post) { ?>
            <a name='post_<?php echo $post['Post']['id']; ?>'>
	            <h5 style="margin-bottom:5px"><?php echo $post["Post"]["name" . $langPrefix]; ?></h5>
				<?php if(isset($post["Image"])) { $cursor = 1;?>
							<?php foreach ($post["Image"]["All"] as $images) { ?>
								<?php echo $this->Html->image($images["small"]); ?>
							<?php if ($cursor == 4) {break;} $cursor++;} ?>
						<?php } ?>
	            <p><?php echo $post["Post"]["label" . $langPrefix]; ?></p>
        	</a>
        <?php } ?>
    </div>
</div>