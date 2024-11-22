<?= $this->extend('app') ?>
<?= $this->section('content') ?>

<div class="special-menu pad-top-100 parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title color-white text-center"> Navega en los mercados de la ciudad de La Paz desde un solo lugar </h2>
                    <h5 class="title-caption text-center">
                        Compara los precios de frutas, verduras y productos esenciales de la canasta familiar en los mercados yy ferias más concurridos de La Paz.
                        Encuentra las mejores opciones para tu economía, todo desde un solo lugar, y ahorra mientras disfrutas de productos frescos y de calidad.
                        ¡Haz que tus compras sean más fáciles y económicas!
                    </h5>
                </div>
                <div class="special-box">
                    <div id="owl-demo">
                        <?php
                        foreach ($mercado as $value): ?>
                            <div class="item item-type-zoom">
                                <a href="<?= base_url('mercado/' . esc($value['id_mercado'])); ?>" class="item-hover">
                                    <?= esc($value['nombre_mercado']); ?>
                                </a>
                                <div class="item-info">
                                    <div class="headline">
                                        <?= $value['nombre_mercado'] ?>
                                        <div class="line"></div>
                                        <div class="dit-line">
                                            <?= $value['ubicacion'] ?>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                <div class="item-img">
                                    <img src="<?= base_url() . $value['url']; ?>" alt="sp-menu">

                                </div>
                            </div>
                        <?php
                        endforeach
                        ?>
                    </div>
                </div>
            </div>
            <!-- end special-box -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>

<?= $this->endSection() ?>