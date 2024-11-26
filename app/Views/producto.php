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
                    <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white " data-text-animation="fade-in-right" data-split="char" data-duration="0.9" data-stagger="0.09">Productos</h2>

                    <div class="breadcrumb__menu">
                        <nav>
                            <ul>
                                <li><span><a href="index.html">Inicio</a></span></li>
                                <li class="active"><span>Productos</span></li>
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
                                    <form action="<?= base_url('producto'); ?>" method="post">
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
                                    <a href="<?= base_url('categoria-producto') . '?id_categoria=' . $value['id_categoria']?>">
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
                <section class="wishlist section-space overflow-hidden pt-0">
                    <div class="container">
                        <div class="table-content wishlist-table table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="wishlist-product-name">N°</th>
                                        <th class="wishlist-product-name">Producto</th>
                                        <th class="product-price"> Precio</th>
                                        <th class="product-quantity">Categoria</th>
                                        <th class="product-quantity">Feria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $key => $value) : ?>
                                        <tr>
                                            <td class="product__price"><span class="amount"><?= $value['id_producto'] ?></span></td>
                                            <td class="product__wrapper">
                                                <div class="product__name">
                                                    <h6 class="title text-uppercase"><a href="javascript::void(0)"><?= $value['producto'] ?></a></h6>
                                                </div>
                                            </td>
                                            <td class="product__price"><span class="amount"><?= $value['precio'] ?> Bs.</span></td>
                                            <td class="product__quantity">
                                                <span><?= $value['categoria'] ?></a></span>
                                            </td>
                                            <td class="product__quantity">
                                                <span><?= $value['nombre_mercado'] ?></a></span>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php if (count($productos) == 0) : ?>
                                        <td colspan="4">
                                            <p>No hay productos disponibles.</p>
                                        </td>
                                    <?php endif ?>
                                </tbody>
                            </table>
                            <?= $pager->links('default', 'bootstrap'); ?>
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