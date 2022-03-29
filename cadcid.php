<!DOCTYPE html>

<?php
    include_once "acao.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $id_cidade = isset($_GET['id_cidade']) ? $_GET['id_cidade'] : "";
    if ($id_cidade > 0)
        $dados = buscarDados($id_cidade);
}
    $title = "Cadastro de Cidades";
    $nome_cid = isset($_POST['nome_cid']) ? $_POST['nome_cid'] : "";
    
//var_dump($dados);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/estilo.css">

</head>


<body>

   
  
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
    
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">

            <li>

            <a class="nav-link" href="cidade.php">Cidades</a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="estado.php">Estados</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="cadest.php">Cadastro de Estado</a>
            </li>
          <li>
          <a class="nav-link" href="cadcid.php">Cadastro de Cidade</a>

          </li>
            <ul>
        </div>
        </div>
    </nav>
    


    <div class="container-fluid">
<br>

<h3>Insira a Cidade</h3><br>

        <form method="post" action="acao.php">
        <div class="form-group col-lg-3">
        <label>ID da Cidade</label>
                    <input readonly  type="text" name="id_cidade" id="id_cidade" class="form-control" value="<?php if ($acao == "editar") echo $dados['id_cidade']; else echo 0; ?>"><br>

        <label>Nome da Cidade </label>
                    <input name="nome_cid" id="nome_cid" type="text" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['nome_cid']; ?>"><br>
                

        <label> Estado da Cidade </label><br>
                    <select name="id_estado" id="id_estado" class="form-select"> 
                        <?php
                            $pdo = Conexao::getInstance(); 
                
                            $consulta = $pdo->query("SELECT * FROM estado");

                            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   

                                if ($acao == "editar") echo $dados['id_estado']; 
                                                                    
                                ?>

                
              <option value="<?php echo $linha['id_estado'];?>"> <?php if ($acao == "editar") $dados['id_estado']; ?>  <?php echo $linha['nome_est'];?></option> 
               <?php }
               ?>
    </select>

<br><br>


    <button name="acao" value="salvar" id="acao" type="submit" class="btn btn-outline-secondary">
                     Salvar
                </button>
                  </div>
                    </div>
           
    </form>
    

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>