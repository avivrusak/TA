<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Rusdiawan</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    
                    ['label' => 'Lokasi TPU', 'icon' => 'file-code-o', 'url' => ['/data-lokasi-tpu']],
                    ['label' => 'Data Petugas ', 'icon' => 'dashboard', 'url' => ['/data-petugas']],
                    ['label' => 'Report', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ],
            ]
        ) ?>

    </section>

</aside>
