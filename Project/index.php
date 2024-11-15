<?php include('layouts/header.php'); ?>

<div class="container mt-5">
  <h1 class="text-center">Descubra o seu Signo</h1>
  <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
    <div class="form-group mb-3">
      <label for="data_nascimento">Data de Nascimento:</label>
      <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Descobrir Signo</button>
  </form>
</div>

<?php include('layouts/footer.php'); ?>


