<div class="grid_12 content">
    <?php echo $this->element('kurumsal'); ?>

    <div class="grid_9 omega product" style="margin-top:40px;">
        <h3><?php echo $post["Post"]["name" . $langPrefix]; ?></h3>
        <?php if (isset($post["Image"]["Main"]["normal"])) { ?>
            <div class="image"><?php echo $this->Html->image($post["Image"]["Main"]["normal"], array("title" => $post["Post"]["name" . $langPrefix])); ?></div>
        <?php } ?>
        <p><?php echo $post["Post"]["value" . $langPrefix]; ?></p>
    </div>
</div>