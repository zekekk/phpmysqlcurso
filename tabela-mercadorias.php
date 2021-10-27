<table class="table">
    <thead class="thead-success" class="col-lg-2 col-sm-12 mb-3">
        <tr>
            <th scope="row">Código de Barra</th>
            <th>Validade</th>
            <th>Marca</th>
            <th>Preço </th>
            <th>Tipo</th>
            <th>Peso</th>
            <th>Edição</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_mercadorias as $mercadorias) : ?>
            <tr>
                <td><?php echo $mercadorias['codBarra'] ?></td>
                <td><?php echo traduz_data_para_exibir($mercadorias['validadeProduto']); ?></td>
                <td><?php echo $mercadorias['marcaProduto'] ?></td>
                <td><?php echo traduz_valor_para_exibir($mercadorias['precoProduto']); ?></td>
                <td><?php echo $mercadorias['tipoProduto'] ?></td>
                <td><?php echo $mercadorias['pesoProduto'] ?></td>
                <td>
                    <a href="editar-mercadoria.php?id=<?php echo $mercadorias['id']; ?>">
                        <button type="button" class="btn btn-outline-success">&#128221;</button>
                    </a>
                    <a href="remover-mercadoria.php?id=<?php echo $mercadorias['id']; ?>">
                        <button type="button" class="btn btn-outline-danger">&#10060;</button>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>