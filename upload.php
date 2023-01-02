<?php
//especifica o diretório onde o arquivo será colocado
$target_dir = "imgprodutos/";

//especifica o caminho do arquivo a ser carregado
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

//ainda não foi usado (será usado mais tarde)
$uploadOk = 1;

//contém a extensão do arquivo (em letras minúsculas)
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verifique se o arquivo de imagem é uma imagem real ou uma imagem falsa
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Imagem adicionada sucesso"; 
    $uploadOk = 1;
  } else {
    echo "Ficheiro não é uma imagem";
    $uploadOk = 0;
  }
}
?>