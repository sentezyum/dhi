<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo __($title_for_layout); ?>
    </title>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
    <?php
        echo $this->Html->css(array('reset','text','960','style'));
        echo $this->Html->script(array('jquery'));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body class='<?php echo Configure::read("BodyClass"); ?>'>
    <h1 style="display:none;"><?php echo __($title_for_layout); ?></h1>
    <div class="container_12">
        <div class="grid_12 header-thin">
            <div class="grid_6 alpha contact">
                +90 212 220 00 00  | <a href="mailto:info@dhiexport.com">info@dhiexport.com</a>
            </div>
            <div class="grid_6 omega text-right language-select">
                <?php echo $this->Html->link("türkçe", '/tr' . str_replace("//", "/", str_replace(Configure::read("lang"), "", $this->here))); ?>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <?php echo $this->Html->link("english", '/eng' . str_replace("//", "/", str_replace(Configure::read("lang"), "", $this->here))); ?>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <?php echo $this->Html->link("русский", '/rus' . str_replace("//", "/", str_replace(Configure::read("lang"), "", $this->here))); ?>
            </div>
        </div>
        <div class="grid_12 header">
            <div class="grid_2 alpha logo">
                <?php echo $this->Html->link($this->Html->image('logo.png', array('title' => 'DHİ iç ve dış ticaret', 'alt' => 'DHİ iç ve dış ticaret')), '/', array('escape' => false)); ?>
            </div>
            <div class="grid_10 omega menu-social">
                <div class="grid_10 alpha omega social text-right">
                    <a href="#" class="facebook core_animation core_animation_fast">&nbsp;</a>
                    <a href="#" class="twitter core_animation core_animation_fast">&nbsp;</a>
                    <a href="#" class="youtube core_animation core_animation_fast">&nbsp;</a>
                </div>
                <div class="grid_10 alpha omega menu text-right">
                    <ul>
                        <li><?php echo $this->Html->link(__('ANA SAYFA'), '/', array('class' => 'core_animation_fast')); ?></li>
                        <li>
                            <a href="Javascript:void(0);" class="core_animation_fast"><?php echo __('ÜRÜN GRUPLARI'); ?></a>
                            <ul class="core_animation_fast">
                                <li><?php echo $this->Html->link(__('YER HİZMETLERİ EKİPMANLARI'), array('language' => $this->Session->read('Config.language'), 'controller' => 'product_groups', 'id' => 3, 'slug' => 'yer_ekipmanlari'), array('class' => 'core_animation_fast')); ?></li>
                                <li><?php echo $this->Html->link(__('ENDÜSTRİYEL LED AYDINLATMA'), array('language' => $this->Session->read('Config.language'), 'controller' => 'product_groups', 'id' => 4, 'slug' => 'led_ekipmanlari'), array('class' => 'core_animation_fast')); ?></li>
                            </ul>
                        </li>
                        <li><a href="Javascript:void(0);" class="core_animation_fast"><?php echo __('KURUMSAL'); ?></a>
                            <ul class="core_animation_fast">
                                <li><?php echo $this->Html->link(__('HAKKIMIZDA'), array('controller' => 'page', 'id' => 1, 'slug' => 'hakkimizda'), array('class' => 'core_animation_fast')); ?></li>
                                <li><?php echo $this->Html->link(__('DUYURU & HABERLER'), array('controller' => 'posts'), array('class' => 'core_animation_fast')); ?></li>
                                <li><?php echo $this->Html->link(__('REFERANSLAR'), array('controller' => 'references'), array('class' => 'core_animation_fast')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link(__('İLETİŞİM'),  array('controller' => 'contacts'), array('class' => 'core_animation_fast')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_12 shadow">&nbsp;</div>
        <?php echo $this->element('slug'); ?>
        <?php echo $this->Session->flash(); ?>
    	<?php echo $this->fetch('content'); ?>
    </div>
    <div class="footer_container">
        <div class="container_12 footer">
            <div class="grid_12 inline">
                <img alt="product images" class="core_animation_fast" src="img/footer_ref.png" />
            </div>
            <div class="grid_6 copyright">
                DHİ İnşaat ve Dış Ticaret ©2013
            </div>
            <div class="grid_6 copyright text-right">
                <a class="core_animation_fast" href="www.sentezyum.com">Sentezyum Interactive</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            if ($("body").height() > $(".footer").offset().top + $(".footer").height()) { $('.content').css("min-height", $('.content').height() + ($("body").height() - ($(".footer").offset().top + $(".footer").height())) + "px");}
        });
    </script>
</body>
</html>