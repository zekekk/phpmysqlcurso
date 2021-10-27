<form method="post">
    <input type="hidden" name="id" value="<?php echo $mercadoria['id']; ?>">
    <legend><?php echo ($mercadoria['id'] > 0) ? 'Atualizar Mercadoria' : 'Cadastrar Nova Mercadoria' ?></legend>

    
    <!--Linha 1-->
    <div class="row mb-3">
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="codBarra" class="form-label">
                Codigo de Barra:
            </label>
            <input type="text" class="form-control" name="codBarra" value="<?php echo $mercadoria['codBarra']; ?>" maxlength="9" placeholder="Código de Barra de 9 números">
            <?php if($tem_erros && array_key_exists('codBarra',$erros_validacao)) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['codBarra']; ?>
                    </span>
            <?php endif; ?>
        </div>

        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="validadeProduto" class="form-label">
                Data de Validade:
            </label>
            <input type="text" class="form-control" name="validadeProduto" value="<?php echo traduz_data_para_exibir($mercadoria['validadeProduto']); ?>" required maxlength="10" placeholder="DD/MM/AAAA">
            <?php if($tem_erros && array_key_exists('validadeProduto',$erros_validacao)) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['validadeProduto']; ?>
                    </span>
            <?php endif; ?>
        </div>

        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="marcaProduto" class="form-label">
                Nome da marca:
            </label>
            <input type="text" class="form-control" name="marcaProduto" value="<?php echo $mercadoria['marcaProduto']; ?>" required maxlength="25" placeholder="Nome da Marca">
        </div>
    </div>

    <!--Linha 2-->
    <div class="row mb-3">
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="precoProduto" class="form-label">
                Preço:
            </label>
            <input type="text" class="form-control" name="precoProduto" value="<?php echo $mercadoria['precoProduto']; ?>" required maxlength="9" placeholder="Preço (Apenas números)">
            <?php if($tem_erros && array_key_exists('precoProduto',$erros_validacao)) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['precoProduto']; ?>
                    </span>
                <?php endif; ?>
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="tipoProduto" class="form-label">
                Tipo produto:
            </label>
            <input type="text" class="form-control" name="tipoProduto" value="<?php echo $mercadoria['tipoProduto']; ?>" required maxlength="25" placeholder="Tipo do produto (queijo, carne, hortaliça,etc)">
        </div>
        <div class="col-lg-4 col-sm-12 mb-3">
            <label for="pesoProduto" class="form-label">
                Peso:
            </label>
            <input type="text" class="form-control" name="pesoProduto" value="<?php echo $mercadoria['pesoProduto']; ?>" required maxlength="7" placeholder="O peso">
        </div>
    </div>
    <input type="submit" class="btn btn-danger" value="<?php echo ($mercadoria['id'] > 0) ? 'Atualizar' : 'Cadastrar' ?>">
</form>