<!-- extends form Views/layouts/default.php and config from app/config/view.php -->
<?php $this->layout(config('view.layout')) ?>

<!--Load nội dung trang home/dashboard.php vào vị trí section('page')
                                                của layouts/default.php-->
<?php $this->start('page') ?>
    <?php $this->insert('home/dashboard'); ?>
<?php $this->stop() ?>

<!--Insert script in the place section("js") in layout default -->
<?php $this->start('js'); ?>
    <?php $this->insert('home/script'); ?>
<?php $this->stop(); ?>