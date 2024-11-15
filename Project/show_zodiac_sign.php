<?php include('layouts/header.php'); ?>
<div class="container mt-5 text-center">
  <?php

  $data_nascimento = $_POST['data_nascimento'];
  $signos = simplexml_load_file("signos.xml");
  $data_nascimento = new DateTime($data_nascimento);
  $signo_encontrado = false;


  function estaNoPeriodo($data, $dataInicio, $dataFim){


    if (!$data) {
      echo "<p>Erro: Data de nascimento inválida ({$_POST['data_nascimento']})</p>";
      return false;
    }
    
    $dataInicio = DateTime::createFromFormat('d/m', $dataInicio . '/' . $data->format('Y'));
    $dataFim = DateTime::createFromFormat('d/m', $dataFim . '/' . $data->format('Y'));

    if ($dataFim < $dataInicio) {
      $dataFim->modify('+1 year');
    }

    return ($data >= $dataInicio && $data <= $dataFim);

  }

  foreach ($signos->signo as $signo) {
    
    if (estaNoPeriodo($data_nascimento, $signo->dataInicio, $signo->dataFim)) {
      echo "<h2>Seu Signo: {$signo->signoNome}</h2>";
      echo "<p>{$signo->descricao}</p>";
      $signo_encontrado = true;
      break;
    }
  }  


  if (!$signo_encontrado) {
    echo "<p>Desculpe, não conseguimos encontrar um signo para a data informada.</p>";
  }


  if ($signos === false) {
    echo "Erro ao carregar o arquivo XML.";
    exit;
  }

  ?>
  <a href="./index.php" class="btn btn-secondary mt-4">Voltar</a>
</div>
<?php include('layouts/footer.php'); ?>