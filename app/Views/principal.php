<?= $this->extend('app') ?>
<?= $this->section('content') ?>
<style>
    .chart-container {
        width: 70%;
        /* Reducido de 80% a 50% */
        margin: 20px auto;
    }

    .chart-wrapper {
        position: relative;
        height: 350px;
        /* Altura fija más pequeña */
        margin-bottom: 20px;
    }

    canvas {
        max-width: 100%;
    }
</style>
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
                        <!-- <div class="book-btn">
                            <a href="#reservation" class="table-btn hvr-underline-from-center">¿Que quiere comprar?</a>
                        </div> -->
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
<div id="menu" class="menu-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">
                        Datos Estadísticos
                    </h2>
                </div>
                <div class="chart-container">
                    <div class="chart-wrapper">
                        <canvas id="barChart"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="lineChart"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>

                <!-- end tab-menu -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Configuración común para todos los gráficos
    const commonOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    boxWidth: 10,
                    font: {
                        size: 11
                    }
                }
            },
            title: {
                display: true,
                font: {
                    size: 14
                }
            }
        }
    };

    // Gráfico de Barras
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Verduras', 'Frutas', 'Carnes'],
            datasets: [{
                label: 'Cantidad de Productos',
                data: [40, 25, 35],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            ...commonOptions,
            plugins: {
                ...commonOptions.plugins,
                title: {
                    ...commonOptions.plugins.title,
                    text: 'Productos por Categoría'
                }
            }
        }
    });

    // Gráfico de Líneas
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
            datasets: [{
                label: 'Precio Promedio',
                data: [65, 59, 80, 81, 56, 40],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            ...commonOptions,
            plugins: {
                ...commonOptions.plugins,
                title: {
                    ...commonOptions.plugins.title,
                    text: 'Tendencia de Precios'
                }
            }
        }
    });

    // Gráfico Circular
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['16 de Julio', 'Rodriguez', 'Yungas', 'Rio Seco'],
            datasets: [{
                data: [30, 25, 25, 20],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            ...commonOptions,
            plugins: {
                ...commonOptions.plugins,
                title: {
                    ...commonOptions.plugins.title,
                    text: 'Distribución por Mercado'
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>