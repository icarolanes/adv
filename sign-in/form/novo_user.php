<form action="novo_acesso.php" method="post">
  <img hidden class="mb-4" src="../img/peiu_escuro.png" alt="" width="300" height="90">
  <h1 class="h3 mb-3 fw-normal">Advocacia</h1>

  <div class="form-floating">
    <input type="number" class="form-control" name="cpf" id="cpf" placeholder="cpf" required>
    <label for="cpf" inputmode="numeric">cpf:</label>
  </div>

  <div class="form-floating">
    <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" required>
    <label for="nome">nome:</label>
  </div>

  <div class="form-floating">
    <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="sobrenome" required>
    <label for="sobrenome">sobrenome:</label>
  </div>

  <div class="form-floating">
    <input type="text" class="form-control" name="email" id="email" placeholder="email" required>
    <label for="email">email:</label>
  </div>

  <div class="form-floating">
    <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder="Password" required>
    <label for="floatingPassword">Senha</label>
  </div>

  <div class="form-check form-switch form-switch mb-3 ">
    <label>
      <input class="form-check-input" type="checkbox" id="myCheckbox" checked value="remember-me">Solicitar acesso
    </label>
  </div>

  <button class="w-100 btn btn-lg btn-primary" type="submit">Solicitar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>