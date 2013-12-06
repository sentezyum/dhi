<div class="grid_12 content">
    <?php echo $this->element('kurumsal'); ?>

    <div class="grid_9 omega product" style="margin-top:40px;">
        <h3><?php echo __("DUYURU & HABERLER"); ?></h3>
        <?php foreach ($posts as $post) { ?>
            <h5 style="margin-bottom:5px"><?php echo $post["Post"]["name" . $langPrefix]; ?></h5>
            <p><?php echo $post["Post"]["label" . $langPrefix]; ?></p>
        <?php } ?>
    </div>
</div>