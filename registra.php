<?php
<<<<<<< HEAD
    require_once 'crud.php';
    # inicia a sessão no arquivo

    if($_POST) {

        $prod = filter_input(INPUT_POST, "prod", FILTER_SANITIZE_STRING);
        $file = $_FILES['fileUpload'];
        $desc = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_STRING);
        $rev = filter_input(INPUT_POST, "rev", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
        $custo = filter_input(INPUT_POST, "custo", FILTER_SANITIZE_NUMBER_INT);
        $quant = filter_input(INPUT_POST, "quant", FILTER_SANITIZE_NUMBER_INT);
        
        
       // if(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT)) {
         //   $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        //}
        
        if($file['error']) {
            //throw new Exception('Error: ' . $file['error']);
            $_SESSION['msg'] = false;
            
            exit;
        }
        
        $dirUploads = 'uploads';
        
        if(!is_dir($dirUploads)) {
            mkdir($dirUploads);
        }
        
        // http://php.net/manual/pt_BR/function.move-uploaded-file.php
        #move_uploaded_file(filename, destination) // essa função retorna um booleano
        if(move_uploaded_file($file['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . $file['name'])) {
            
        } else {
            //throw new Exception('Falha ao efetuar o upload.');
            $_SESSION['msg'] = false;
            exit;
        }
        
        $foto=$file['name'];
   
        
        if (salvar($prod, $foto, $quant, $price, $custo, $desc, $rev)){
            // cria a sessão e define valor a ela
=======

require_once 'crud.php';
require_once 'validar.php';
# inicia a sessão no arquivo



if ($_POST) {
    

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $senhaValidar = filter_input(INPUT_POST, "senhaValidar", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data_nasc = filter_input(INPUT_POST, "data_nasc", FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_NUMBER_INT);
    $ddd = filter_input(INPUT_POST, "ddd", FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, "celular", FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_STRING);
    $uf = filter_input(INPUT_POST, "uf", FILTER_SANITIZE_STRING);
    $rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT);
    $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if($senhaValidar != $senha){
        $_SESSION['cond_cli']['dpassword'] = false;
        header("Location:cadastro.php");
    }
    else{
        $_SESSION['cond_cli']['dpassword'] = true;
    }

    if (validarNome($nome)) {
        $_SESSION['cond_cli']['nome'] = true;
        $_SESSION['valorcli']['nome'] = $nome;
    } else {
        $_SESSION['cond_cli']['nome'] = false;
        $_SESSION['valorcli']['nome'] = "";
    }
    if (validarEmail($email)) {
        $_SESSION['cond_cli']['email'] = true;
        $_SESSION['valorcli']['email'] = $email;
    } else {
        $_SESSION['cond_cli']['email'] = false;
        $_SESSION['valorcli']['email'] = "";
    }
    if (validarLogin($login)) {
        $_SESSION['cond_cli']['login'] = true;
        $_SESSION['valorcli']['login'] = $login;
    } else {
        $_SESSION['cond_cli']['login'] = false;
        $_SESSION['valorcli']['login'] = "";
    }
    if (validarSenha($senha)) {
        $_SESSION['cond_cli']['senha'] = true;
        $_SESSION['valorcli']['senha'] = $senha;
    } else {
        $_SESSION['cond_cli']['senha'] = false;
        $_SESSION['valorcli']['senha'] = "";
    }
    if (validarData($data_nasc)) {
        $_SESSION['cond_cli']['data_nasc'] = true;
        $_SESSION['valorcli']['data_nasc'] = $data_nasc;
    } else {
        $_SESSION['cond_cli']['data_nasc'] = false;
        $_SESSION['valorcli']['data_nasc'] = "";
    }
    if (validarCpf($cpf)) {
        $_SESSION['cond_cli']['cpf'] = true;
        $_SESSION['valorcli']['cpf'] = $cpf;
    } else {
        $_SESSION['cond_cli']['cpf'] = false;
        $_SESSION['valorcli']['cpf'] = "";
    }
    if (validarDDD($ddd)) {
        $_SESSION['cond_cli']['ddd'] = true;
        $_SESSION['valorcli']['ddd'] = $ddd;
    } else {
        $_SESSION['cond_cli']['ddd'] = false;
        $_SESSION['valorcli']['ddd'] = "";
    }
    if (validarTelefone($celular)) {
        $_SESSION['cond_cli']['celular'] = true;
        $_SESSION['valorcli']['celular'] = $celular;
    } else {
        $_SESSION['cond_cli']['celular'] = false;
        $_SESSION['valorcli']['celular'] = "";
    }

    if (validarCep($cep)) {
        $_SESSION['cond_cli']['cep'] = true;
        $_SESSION['valorcli']['cep'] = $cep;
    } else {
        $_SESSION['cond_cli']['cep'] = false;
        $_SESSION['valorcli']['cep'] = "";
    }
    if (validarTexto($bairro)) {
        $_SESSION['cond_cli']['bairro'] = true;
        $_SESSION['valorcli']['bairro'] = $cep;
    } else {
        $_SESSION['cond_cli']['bairro'] = false;
        $_SESSION['valorcli']['bairro'] = "";
    }
    if (validarUf($uf, $cidade)) {
        $_SESSION['cond_cli']['uf'] = true;
        $_SESSION['valorcli']['uf'] = $uf;
    } else {
        $_SESSION['cond_cli']['uf'] = false;
        $_SESSION['valorcli']['uf'] = "";
    }
    if (validarTexto($rua)) {
        $_SESSION['cond_cli']['rua'] = true;
        $_SESSION['valorcli']['rua'] = $rua;
    } else {
        $_SESSION['cond_cli']['rua'] = false;
        $_SESSION['valorcli']['rua'] = "";
    }
    if (validarNumeroEndereco($numero)) {
        $_SESSION['cond_cli']['numero'] = true;
        $_SESSION['valorcli']['numero'] = $numero;
    } else {
        $_SESSION['cond_cli']['numero'] = false;
        $_SESSION['valorcli']['numero'] = "";
    }
    if (validarTextoVazio($complemento)) {
        $_SESSION['cond_cli']['complemento'] = true;
        $_SESSION['valorcli']['complemento'] = $complemento;
    } else {
        $_SESSION['cond_cli']['complemento'] = false;
        $_SESSION['valorcli']['complemento'] = "";
    }

    $telefone = $ddd . $celular;

    if (in_array(false, $_SESSION['cond_cli'])) {
        header("Location: cadastro.php");
    } 
    else{
        if (cadastroCliente($nome, $email, $login, $senha, $data_nasc, $cpf, $telefone, $cep, $bairro, $cidade, $rua, $numero, $complemento)) {
>>>>>>> 5dc251731d1ac5d86270cff69514364734ee04d1
            $_SESSION['msg'] = true;
            header("location:login.php");
        } else {
            if(!isset($_SESSION['cond_cli']['cadastro_existente'])){
                $_SESSION['msg'] = false;
            }
            header("location:cadastro.php");
        }
    }
}