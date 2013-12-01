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
<body class='<?php echo @$this->params->group; ?>'>
    <h1 style="display:none;"><?php echo __($title_for_layout); ?></h1>
    <div class="container_12">
        <div class="grid_12 header-thin">
            <div class="grid_6 alpha contact">
                +90 212 220 00 00  | <a href="mailto:info@dhiexport.com">info@dhiexport.com</a>
            </div>
            <div class="grid_6 omega text-right language-select">
                <a href="#">türkçe</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">english</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">русский</a>
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
                            <?php echo $this->Html->link(__('ÜRÜN GRUPLARI'), '/', array('class' => 'core_animation_fast')); ?>
                            <ul class="core_animation_fast">
                                <li><?php echo $this->Html->link(__('YER HİZMETLERİ EKİPMANLARI'), array('controller' => 'urun_gruplari', 'action' => 'yer_ekipmanlari'), array('class' => 'core_animation_fast')); ?></li>
                                <li><?php echo $this->Html->link(__('ENDÜSTRİYEL LED AYDINLATMA'), array('controller' => 'urun_gruplari', 'action' => 'led_ekipmanlari'), array('class' => 'core_animation_fast')); ?></li>
                            </ul>
                        </li>
                        <li><a href="#" class="core_animation_fast">KURUMSAL</a>
                            <ul class="core_animation_fast">
                                <li><?php echo $this->Html->link(__('HAKKIMIZDA'), '/hakkimizda', array('class' => 'core_animation_fast')); ?></li>
                                <li><?php echo $this->Html->link(__('DUYURU & HABERLER'), '/haber_duyuru', array('class' => 'core_animation_fast')); ?></li>
                                <li><?php echo $this->Html->link(__('REFERANSLAR'), '/referanslar', array('class' => 'core_animation_fast')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link(__('İLETİŞİM'), '/iletisim', array('class' => 'core_animation_fast')); ?></li>
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
</body>
</html>