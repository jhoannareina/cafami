<?= $this->extend('app') ?>
<?= $this->section('content') ?>

<div id="banner" class="banner full-screen-mode parallax">
    <div class="container pr">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="banner-static">
                <div class="banner-text">
                    <div class="banner-cell">

                        <h1>
                            <span class="cafami-text">CAFAMI</span>
                            <span class="typer" id="typer-id" data-delay="200" data-delim=":" data-words="Compara:Elige:Ahorra" data-colors="red"></span>
                            <span class="cursor" data-cursorDisplay="_" data-owner="typer-id"></span>
                        </h1>

                        <h2>Los Precios al Alcance de tu Hogar</h2>
                        <p>"Bienvenido a CAFAMI, la plataforma boliviana que te ayuda a comparar precios y ahorrar. Descubre los mejores productos de diferentes mercados en La Paz y otras ciudades, todo en un solo lugar. ¡Decidir nunca fue tan fácil!"</p>
                        <div class="book-btn">
                            <a href="#reservation" class="table-btn hvr-underline-from-center">¿Que quiere comprar?</a>
                        </div>
                        <a href="#about">
                            <div class="mouse"></div>
                        </a>
                    </div>
                    <!-- end banner-cell -->
                </div>
                <!-- end banner-text -->
            </div>
            <!-- end banner-static -->
        </div>
        <!-- end col -->
    </div>
    <!-- end container -->
</div>

<?= $this->endSection() ?>