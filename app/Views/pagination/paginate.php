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
</style>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <!-- Botón de navegación anterior -->
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>">Primero</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>">Anterior</a>
            </li>
        <?php endif ?>

        <!-- Números de páginas -->
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <!-- Botón de navegación siguiente -->
        <?php if ($pager->hasNextPage()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPage() ?>">Próximo</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>">Último</a>
            </li>
        <?php endif ?>
    </ul>
</nav>