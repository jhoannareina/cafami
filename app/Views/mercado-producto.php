<?= $this->extend('app-second') ?>
<?= $this->section('content') ?>
<style>
    .wishlist-table tbody tr td {
        padding: 20px 0;
    }

    .wishlist-table tbody tr {
        text-align: center;
    }

    .wishlist-table tbody tr .product__wrapper {
        display: flex;
    }
</style>
<!-- <php dd($productos)?> -->
<div class="breadcrumb__area breadcrumb__header-up breadcrumb-space overly overflow-hidden">
    <div class="breadcrumb__bg"><img src="<?= base_url('template2'); ?>/assets/imgs/breadcrumb/breadcrumb.jpg" alt="image not found"></div>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12">
                <div class="breadcrumb__content text-center">
                    <div class="breadcrumb__shape-1 upDown"><img src="<?= base_url('template2'); ?>/assets/imgs/breadcrumb/shape-1.png" alt="image not found"></div>
                    <div class="breadcrumb__shape-2 zooming2"><img src="<?= base_url('template2'); ?>/assets/imgs/breadcrumb/shape-2.png" alt="image not found"></div>
                    <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white " data-text-animation="fade-in-right" data-split="char" data-duration="0.9" data-stagger="0.09"><?= $mercado['nombre_mercado'] ?></h2>

                    <div class="breadcrumb__menu">
                        <nav>
                            <ul>
                                <li><span><a href="index.html">Inicio</a></span></li>
                                <li class="active"><span><?= $mercado['nombre_mercado'] ?></span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog-details section-space-120">
    <div class="container" style="max-width: 100%;">
        <div class="row">
            <div class="col-xl-4">
                <div class="blog-4__right sidebar-rr-sticky">
                    <div class="sidebar">
                        <div class="sidebar__widget">
                            <div class="sidebar__widget-search">
                                <div class="search__bar">
                                    <form action="<?= base_url('mercado'); ?>" method="post">
                                        <input type="hidden" id="id_mercado" name="id_mercado" value="<?= $mercado['id_mercado'] ?>" />
                                        <input type="text" id="search" name="search" placeholder="Busque productos aqui" value="<?= $search ?? '' ?>" />
                                        <button type="submit">
                                            <i class="fa-regular fa-magnifying-glass"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h5 class="sidebar__widget-title">Categorias</h5>
                            <div class="sidebar__widget-category">
                                <?php foreach ($categorias as $value) : ?>
                                    <a href="<?= base_url('categoria') . '?id_categoria=' . $value['id_categoria'] . '&id_mercado=' . $mercado['id_mercado'] ?>">
                                        <?= $value['nombre'] ?> <span><i class="fa-solid fa-arrow-right"></i></span>
                                    </a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Breadcrumb area start  -->

                <!-- Breadcrumb area start  -->

                <!-- wishlist area start -->
                <section class="shop section-space-120" style="padding-top: 0;">
                    <div class="container">
                        <div class="row mb-minus-30">
                            <?php foreach ($productos as $key => $value) : ?>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="featured-product__item mb-30 ">
                                        <a data-bs-toggle="modal" data-bs-target="#modal-main" href="#" class="featured-product__media">
                                            <img src="<?= base_url('assets/images/productos/') . $value['producto'] ?>.jfif" alt="image not found">
                                        </a>
                                        <div class="featured-product__content">
                                            <h6 class="text-uppercase"><a href="#"><?= $value['producto'] ?></a></h6>
                                        </div>
                                        <ul class="featured-product__action-btn">
                                            <li><a data-id="<?= $value['id_producto'] ?>" data-bs-toggle="modal" data-bs-target="#modal-<?= $value['id_producto'] ?>" href="#" style="border-radius: 500px;width: 11rem;"><i class="fa-light fa-eye" style="margin-right: 5px;"></i> Ver precios</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-<?= $value['id_producto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 2rem !important; font-family: inherit;">Precios <?= $value['producto'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <section class="wishlist section-space overflow-hidden pt-0">
                                                    <div class="container">
                                                        <div class="table-content wishlist-table table">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="product-price">N°</th>
                                                                        <th class="product-price">Medida</th>
                                                                        <th class="product-price"> Tamaño</th>
                                                                        <th class="product-quantity">Precio</th>
                                                                        <th class="product-quantity">Precio 1</th>
                                                                        <th class="product-quantity">Precio media (1/2)</th>
                                                                        <th class="product-quantity" style="font-size: 1.3rem;">Precio cuarta (1/4)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $count = 1 ?>
                                                                    <?php foreach ($value['precios'] as $key => $v) : ?>
                                                                        <tr>
                                                                            <td class="product__price"><span class="amount"><?= $count++ ?></span></td>
                                                                            <td class="product__price"><span class="amount"><?= $v['medida'] ?></span></td>
                                                                            <td class="product__quantity">
                                                                                <span><?= $v['nombre_proporcion'] ?></a></span>
                                                                            </td>
                                                                            <td class="product__price"><span class="amount"><?= $v['precio'] ?> Bs.</span></td>
                                                                            <td class="product__price"><span class="amount"><?= $v['precio_1'] ?> Bs.</span></td>
                                                                            <td class="product__price"><span class="amount"><?= $v['precio_1/2'] ?> Bs.</span></td>
                                                                            <td class="product__price"><span class="amount"><?= $v['precio_1/4'] ?> Bs.</span></td>
                                                                            
                                                                            
                                                                            <!-- <td class="product__quantity">
                                                                                <span><= $v['nombre_mercado'] ?></a></span>
                                                                            </td> -->
                                                                        </tr>
                                                                    <?php endforeach ?>
                                                                    <?php if (count($value['precios']) == 0) : ?>
                                                                        <td colspan="4">
                                                                            <p>No hay precios disponibles.</p>
                                                                        </td>
                                                                    <?php endif ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <?= $pager->links('default', 'bootstrap'); ?>
                            <?php if (count($productos) == 0) : ?>
                                <td colspan="5">
                                    <p>No hay productos disponibles.</p>
                                </td>
                            <?php endif ?>
                        </div>
                    </div>
                </section>

                <!-- wishlist area start -->

                <!--latest-instagram area start-->
                <!-- <div class="rr-instagram overflow-hidden">
                    <div class="rr-instagram-warpper">
                        <div class="swiper-container rr-instagram-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="rr-instagram__thumb">
                                        <div class="overlay"></div>
                                        <a href="https://www.instagram.com/" class="overlay-icon"><span><i class="fa-brands fa-instagram"></i></span></a>
                                        <a href="contact.html"><img decoding="async" src="assets/imgs/rr-instagram/instagram-1.jpg" class="img-fluid" alt="img not found"></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rr-instagram__thumb">
                                        <div class="overlay"></div>
                                        <a href="https://www.instagram.com/" class="overlay-icon"><span><i class="fa-brands fa-instagram"></i></span></a>
                                        <a href="contact.html"><img decoding="async" src="assets/imgs/rr-instagram/instagram-2.jpg" class="img-fluid" alt="img not found"></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rr-instagram__thumb">
                                        <div class="overlay"></div>
                                        <a href="https://www.instagram.com/" class="overlay-icon"><span><i class="fa-brands fa-instagram"></i></span></a>
                                        <a href="contact.html"><img decoding="async" src="assets/imgs/rr-instagram/instagram-3.jpg" class="img-fluid" alt="img not found"></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rr-instagram__thumb">
                                        <div class="overlay"></div>
                                        <a href="https://www.instagram.com/" class="overlay-icon"><span><i class="fa-brands fa-instagram"></i></span></a>
                                        <a href="contact.html"><img decoding="async" src="assets/imgs/rr-instagram/instagram-4.jpg" class="img-fluid" alt="img not found"></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rr-instagram__thumb">
                                        <div class="overlay"></div>
                                        <a href="https://www.instagram.com/" class="overlay-icon"><span><i class="fa-brands fa-instagram"></i></span></a>
                                        <a href="contact.html"><img decoding="async" src="assets/imgs/rr-instagram/instagram-5.jpg" class="img-fluid" alt="img not found"></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rr-instagram__thumb">
                                        <div class="overlay"></div>
                                        <a href="https://www.instagram.com/" class="overlay-icon"><span><i class="fa-brands fa-instagram"></i></span></a>
                                        <a href="contact.html"><img decoding="async" src="assets/imgs/rr-instagram/instagram-6.jpg" class="img-fluid" alt="img not found"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--latest-instagram area end-->

            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>
<?= $this->section('script') ?>

<?= $this->endSection() ?>