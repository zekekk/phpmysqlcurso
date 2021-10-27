<main class="container-fluid">
    <section class="row mx-10 mt-3 p-3 mb-3 bg-white rounded">
        
        <?php require 'formulario-lote.php'; ?>

        <?php if ($exibir_tabela) : ?>
            <?php require 'tabela-lote.php'; ?>
        <?php endif; ?>
    
    </section>
</main>