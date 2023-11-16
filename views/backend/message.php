<?php

use App\Libraries\MyClass;
?>
<?php if (Myclass::has_flash('message')) : ?>
    <?php $arr = Myclass::get_flash('message'); ?>
    <div class="alert alert-<?= $arr['type']; ?> alert-dismissible fade show" role="alert">
        <strong>Thông báo</strong> <?= $arr['msg']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>