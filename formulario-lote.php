<form method="post">
<input type="hidden" name="id" value="<?php echo $lote['id']; ?>">
    <legend><?php echo ($lote['id'] > 0) ? 'Atualizar Lote' : 'Cadastrar Novo Lote' ?></legend>


    <!--Linha 1-->
    <div class="row mb-3">
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="codLote" class="form-label">
                Codigo do Lote:
            </label>
            <input type="text" class="form-control" name="codLote" value="<?php echo $lote['codLote']; ?>" required maxlength="7" placeholder="Código de 7 números">
            <?php if($tem_erros && array_key_exists('codLote',$erros_validacao)) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['codLote']; ?>
                    </span>
            <?php endif; ?>
        </div>

        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="validadeLote" class="form-label">
                Data de Validade:
            </label>
            <input type="text" class="form-control" name="validadeLote" value="<?php echo traduz_data_para_exibir($lote['validadeLote']); ?>" required maxlength="10" placeholder="DD/MM/AAAA">
            <?php if($tem_erros && array_key_exists('validadeLote',$erros_validacao)) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['validadeLote']; ?>
                    </span>
            <?php endif; ?>
        </div>
        
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="marcaLote" class="form-label">
                Nome da marca:
            </label>
            <input type="text" class="form-control" name="marcaLote" value="<?php echo $lote['marcaLote']; ?>" required maxlength="25" placeholder="Nome da Marca do Lote ex.: Coca Cola, Friboi, Vanish...">
        </div>
    </div>

    <!--Linha 2-->
    <div class="row mb-5">
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="tipoLote" class="form-label">
                Tipo do lote:
            </label>
            <input type="text" class="form-control" name="tipoLote" value="<?php echo $lote['tipoLote']; ?>" required maxlength="50" placeholder="Tipo do produto (refrigerante, detergente,etc)">
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="valorLote" class="form-label">
                Valor do Lote:
            </label>
            <input type="text" class="form-control" name="valorLote" value="<?php echo $lote['valorLote']; ?>" required maxlength="10" placeholder="Valor em R$">
            <?php if($tem_erros && array_key_exists('valorLote',$erros_validacao)) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['valorLote']; ?>
                    </span>
            <?php endif; ?>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="quantidadeLote" class="form-label">
                Quantidade do Lote:
            </label>
            <input type="text" class="form-control" name="quantidadeLote" value="<?php echo $lote['quantidadeLote']; ?>" required maxlength="3" placeholder="Quantidade">
            <?php if($tem_erros && array_key_exists('quantidadeLote',$erros_validacao)) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['quantidadeLote']; ?>
                    </span>
            <?php endif; ?>
        </div>
        <div class="col-lg-12 col-sm-12 mb-3">
            <label for="fornecedorLote" class="form-label">
                Nome do Fornecedor:
            </label>
            <input type="text" class="form-control" name="fornecedorLote" value="<?php echo $lote['fornecedorLote']; ?>" required maxlength="35" placeholder="Nome">
        </div>
    </div>
    <input type="submit" class="btn btn-danger" value="<?php echo ($lote['id'] > 0) ? 'Atualizar' : 'Cadastrar' ?>">
</form>