<table class="table">
    <thead class="thead-success" class="col-lg-2 col-sm-12 mb-3">
        <tr>
            <th>Código</th>
            <th>Validade</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Valor total</th>
            <th>Quantidade</th>
            <th>Nome do Fornecedor</th>
            <th>Edição</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_lotes as $lotes) : ?>
            <tr>
                <td scope="row"><?php echo $lotes['codLote'] ?></td>
                <td><?php echo traduz_data_para_exibir($lotes['validadeLote']); ?></td>
                <td><?php echo $lotes['marcaLote'] ?></td>
                <td><?php echo $lotes['tipoLote'] ?></td>
                <td><?php echo traduz_valor_para_exibir($lotes['valorLote']) ?></td>
                <td><?php echo $lotes['quantidadeLote'] ?></td>
                <td><?php echo $lotes['fornecedorLote'] ?></td>
                <td>
                    <a href="editar-lote.php?id=<?php echo $lotes['id']; ?>">
                        <button type="button" class="btn btn-outline-success">&#128221;</button>
                    </a>
                    <a href="remover-lote.php?id=<?php echo $lotes['id']; ?>">
                        <button type="button" class="btn btn-outline-danger">&#10060;</button>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>