<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        
        <?php if (Yii::$app->user->identity->rule ==1) { ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    
                    ['label' => 'Lokasi TPU', 'icon' => 'file-code-o', 'url' => ['/data-lokasi-tpu']],
                    ['label' => 'Data Petugas ', 'icon' => 'dashboard', 'url' => ['/data-petugas']],
                    // ['label' => 'Report', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ],
            ]
        ) ?>
        <?php }else{ ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    
                    ['label' => 'Data Makam', 'icon' => 'file-code-o', 'url' => ['/data-makam', 'id'=>Yii::$app->user->identity->ID_TPU]],
                    ['label' => 'Report ', 'icon' => 'dashboard', 'url' => ['/data-petugas']],
                    // ['label' => 'Data Petugas ', 'icon' => 'dashboard', 'url' => ['/data-petugas']],
                    // ['label' => 'Report', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ],
            ]
        ) ?>
        <?php } ?>
    </section>

</aside>
