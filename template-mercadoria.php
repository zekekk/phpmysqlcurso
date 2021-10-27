<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Super Mercado</title>
</head>

<main class="container-fluid">
    <section class="row mx-10 mt-3 p-3 mb-3 bg-white rounded">

        <?php require 'formulario-mercadoria.php'; ?>

        <?php if ($exibir_tabela) : ?>
            <?php require 'tabela-mercadorias.php'; ?>
        <?php endif; ?>

    </section>
</main>