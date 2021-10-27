<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Super Mercado</title>
</head>

<body>
  <?php include 'navbar.php' ?>
  <main>
    <section id="empresa" id="cadastro">
      <h2>Super Mercado</h2>
      <h3>A loja Super Mercado é uma loja destinada a entregar produtos
        por toda parte do Brasil, com rapidez na entrega e qualidade,
        aqui você encontra qualquer tipo de mercadoria.
      </h3>
      <br>
      <h4>Tudo isso com um preço baixo que cabe no seu bolso!</h4>
    </section>
    <section id="ofertas">
      <h2>Ofertas do dia</h2>
      <div class="text-center">
        <img src="img/ofertas.jpg" class="rounded" alt="...">
        <h6>Imagem meramente ilustrativa</h6>
      </div>
    </section>
    <section id="mercadorias">
      <h2>Sessões
      </h2>
      <br>
      <!--Seção 1-->
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-70">
            <img src="img/acougue.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Açougue</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Açougue</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-70">
            <img src="img/verduras2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Hortifruti</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Frutas e Verduras</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-80">
            <img src="img/frios.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Frios</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Frios</a>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      <br>

      <!--Seção 2-->
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-80">
            <img src="img/bebidas.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Bebidas</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Bebidas</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-80">
            <img src="img/cereais.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Cereais e Farináceos</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Cereais e Farináceos</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-80">
            <img src="img/padaria.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Padaria</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Padaria</a>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      <br>

      <!--Seção 3-->
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-80">
            <img src="img/laticinios.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Laticínios</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Laticínios</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-80">
            <img src="img/higiene.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Higiene Pessoal</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Higiene Pessoal</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-80">
            <img src="img/limpeza.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Produtos de Limpeza</h5>
              <br>
              <a href="#" class="btn btn-danger">Ir para Produtos de Limpeza</a>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      <footer>
        <?php 'footer.php' ?>
      </footer>

</html>