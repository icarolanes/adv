<form action="vlog.php" method="post">
  <img hidden class="mb-4" src="../img/peiu_escuro.png" alt="" width="300" height="90">
  <h1 class="h3 mb-3 fw-normal">Advocacia</h1>
  <?php
      session_start();
      if (isset($_SESSION['loginErro'])) {
        echo $_SESSION['loginErro'];
        session_destroy();
      }
      ?>
  <div class="form-floating">
    <input type="number" class="form-control" name="usuario" id="floatingInput" placeholder="CPF" required>
    <label for="floatingInput" inputmode="numeric">Login:</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder="Password" required>
    <label for="floatingPassword">Senha</label>
  </div>
  <div class="form-check form-switch form-switch mb-3 ">
    <label>
      <input class="form-check-input" type="checkbox" id="myCheckbox" value="remember-me"> Solicitar acesso
    </label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit">Acessar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>