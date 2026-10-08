<div>
    <?php if (isset($data['erros']['server_error'])) { ?>
        <span><?= $data['erros']['server_error'] ?></span>
    <?php } ?>
    <h2>Crie a sua conta!</h2>
    <form method="post" action="<?=WEB_URL?>/acesso">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required
            value="<?=isset($data['username']) ? $data['username'] : '' ?>"
        >
        <?php if (isset($data['erros']['username_error'])) { ?>
            <span><?= $data['erros']['username_error'] ?></span>
        <?php } ?>
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" required
            value="<?=isset($data['password']) ? $data['password'] : '' ?>"
        >
        <?php if (isset($data['erros']['password_error'])) { ?>
            <span><?= $data['erros']['password_error'] ?></span>
        <?php } ?>
        <label for="confirm_password">Repita a sua senha</label>
        <input type="password" id="confirm_password" name="confirm_password" required
            value="<?=isset($data['confirm_password']) ? $data['confirm_password'] : '' ?>"
        >
        <?php if (isset($data['erros']['confirm_password_error'])) { ?>
            <span><?= $data['erros']['confirm_password_error'] ?></span>
        <?php } ?>
        <label for="name">Nome</label>
        <input type="text" id="name" name="first_name" required
            value="<?=isset($data['first_name']) ? $data['first_name'] : '' ?>"
        >
        <?php if (isset($data['erros']['first_name_error'])) { ?>
            <span><?= $data['erros']['first_name_error'] ?></span>
        <?php } ?>
        <label for="lastname">Sobrenome</label>
        <input type="text" id="lastname" name="last_name" required
            value="<?=isset($data['last_name']) ? $data['last_name'] : '' ?>"
        >
        <?php if (isset($data['erros']['last_name_error'])) { ?>
            <span><?= $data['erros']['last_name_error'] ?></span>
        <?php } ?>
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Ex: joao@email.com" required
            value="<?=isset($data['email']) ? $data['email'] : '' ?>"
        >
        <?php if (isset($data['erros']['email_error'])) { ?>
            <span><?= $data['erros']['email_error'] ?></span>
        <?php } ?>
        <label for="phone">Telefone</label>
        <input type="text" id="phone" name="phone" placeholder="Ex: (00) 9 1234 - 5678" required
            value="<?=isset($data['phone']) ? $data['phone'] : '' ?>"
        >
        <?php if (isset($data['erros']['phone_error'])) { ?>
            <span><?= $data['erros']['phone_error'] ?></span>
        <?php } ?>
        <input type="submit" name="signup" class="apa-btn" value="Cadastrar">
    </form>
    <p>Já possui a sua conta? Acesse <a href="<?=WEB_URL?>/acesso/entrar" class="apa-btn">aqui.</a></p>
</div>