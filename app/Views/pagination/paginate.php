<style>
    .page-item:not(:first-child) .page-link {
        color: #ad1a19;
    }
    .active>.page-link,
    .page-link.active {
        color: #fff !important;
        background-color: #ad1a19;
        border-color: #ad1a19;
    }
    .page-link:hover{
        color: #ad1a19;
    }
    .page-link {
        color: #ad1a19;
    }
    .pagination-dots {
        padding: 0.5rem 0.75rem;
        line-height: 1.25;
        color: #6c757d;
    }
</style>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php
        $links = $pager->links();
        $currentURI = current_url(true);
        $segments = $currentURI->getSegments();
        $currentPage = 1;
        
        // Encontrar la página actual desde los links
        foreach ($links as $link) {
            if ($link['active']) {
                $currentPage = (int)$link['title'];
                break;
            }
        }
        
        // Botones "Primero" y "Anterior"
        if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>">Primero</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>">Anterior</a>
            </li>
        <?php endif;

        // Variables para controlar la visualización
        $totalLinks = count($links);
        $startPage = 1;
        $endPage = $totalLinks;

        // Mostrar primera página
        if (!empty($links)) {
            echo '<li class="page-item ' . ($links[0]['active'] ? 'active' : '') . '">';
            echo '<a class="page-link" href="' . $links[0]['uri'] . '">' . $links[0]['title'] . '</a>';
            echo '</li>';
        }

        // Si hay muchas páginas antes de la actual, mostrar puntos suspensivos
        if ($currentPage > 4) {
            echo '<li class="page-item disabled"><span class="pagination-dots" style="font-size: 2rem;">...</span></li>';
        }

        // Mostrar páginas cercanas a la actual
        foreach ($links as $link) {
            $pageNum = (int)$link['title'];
            if ($pageNum > 1 && $pageNum < $totalLinks) {
                if (abs($pageNum - $currentPage) <= 1) {
                    echo '<li class="page-item ' . ($link['active'] ? 'active' : '') . '">';
                    echo '<a class="page-link" href="' . $link['uri'] . '">' . $link['title'] . '</a>';
                    echo '</li>';
                }
            }
        }

        // Si hay muchas páginas después de la actual, mostrar puntos suspensivos
        if ($currentPage < ($totalLinks - 3)) {
            echo '<li class="page-item disabled"><span class="pagination-dots" style="font-size: 2rem;">...</span></li>';
        }

        // Mostrar última página si hay más de una página
        if ($totalLinks > 1) {
            $lastLink = end($links);
            echo '<li class="page-item ' . ($lastLink['active'] ? 'active' : '') . '">';
            echo '<a class="page-link" href="' . $lastLink['uri'] . '">' . $lastLink['title'] . '</a>';
            echo '</li>';
        }

        // Botones "Siguiente" y "Último"
        if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>">Próximo</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>">Último</a>
            </li>
        <?php endif ?>
    </ul>
</nav>