<div class="grid_12 content">
    <?php echo $this->element('kurumsal'); ?>

    <div class="grid_9 omega product" style="margin-top:40px;">
        <h3><?php echo $page["Staticpage"]["name" . $langPrefix]; ?></h3>
        
        <?php if (isset($page["Image"]["Main"]["normal"])) { ?>
            <div class="image"><?php echo $this->Html->image($page["Image"]["Main"]["normal"], array("title" => $page["Staticpage"]["name" . $langPrefix])); ?></div>
        <?php } ?>
        <p>
            <?php echo $page["Staticpage"]["value" . $langPrefix]; ?>
        </p>
    </div>
</div>