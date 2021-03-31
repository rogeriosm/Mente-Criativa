<nav class="navbar navbar-expand-lg navbar-dark">

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCadastro">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCadastro">
        
        <form  action="/projetoFinal/controller/controleLoginCadastro.php" method="post">
<!--inputs e botoes de submit-->
            <div class="form-group form-inline">
                <input name="usuario" class="form-control form-control-sm" type="text" placeholder=" Usuario" maxlength="100" required><br>
                <input name="senha" class="form-control form-control-sm" type="password" placeholder=" Senha" maxlength="10" required><br>
                <input name="nome" class="form-control form-control-sm" type="text" placeholder=" Nome" maxlength="10" value="usuario" required hidden readonly><br>
                
                <button name="logar" class="btn btn-sm btn-outline-dark" type="submit" value="logar" autofocus>Entrar</button><!--botao inicia com o autofocus-->
                <button name="criarConta" class="btn btn-sm btn-primary" type="submit" value="criarConta" >Criar Conta</button><br>
                
            </div>

<!--botao usuario radio-->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" value="3" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadioInline1">Usuário</label>
            </div>

<!--botao instituto radio-->
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline1" value="2" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Instituição</label>
            </div>

        </form>

    </div>
</nav>
