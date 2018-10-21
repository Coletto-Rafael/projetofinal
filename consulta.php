<?php include 'cabecalho.php' ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="jumbotron" align="center">
                    <p>Página Index</p>
                    
                </div>
            </div>
            <section>
        <div class="container">
            <div class="row col-xs-6 col-xs-offset-3">
                <fieldset>
                    <legend>Registro de Produto</legend>
                    <form action="busca.php" method="post">
                        <div class="form-group">
                            <label for="prod">Nome do produto</label>
                            <input type="text" class="form-control" 
                            name="prod" id="prod" required>
                        </div>
                       
                        <div>
                            <button type="submit" class="btn btn-info">Consultar</button>
                            <?php
                                if(isset($_SESSION['msg'])) { 
                                    if($_SESSION['msg']) {
                                        
                            ?>
                            <p class="pull-right text-success">Dados gravados com sucesso</p>
                            <?php
                                    } else {
                            ?>
                            <p class="pull-right text-danger">Erro ao gravar</p>
                            <?php
                                    }
                                }
                                # removem a sessão
                                unset($_SESSION['msg']);
                            ?>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
        </div>
    </section>
<?php include 'rodape.php' ?>