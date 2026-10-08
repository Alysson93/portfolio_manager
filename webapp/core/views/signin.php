<div>
    <?php if (isset($data['erros']['login_error'])) { ?>
        <span><?= $data['erros']['login_error'] ?></span>
    <?php } ?>
    <h2>Acesse a sua conta:</h2>
    <form method="post" action="<?=WEB_URL?>/acesso/entrar">
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
        <input type="submit" name="signin" class="apa-btn" value="Acessar">
    </form>
    <p>Ainda não é cadastrado? Cadastre-se <a href="<?=WEB_URL?>/acesso" class="apa-btn">aqui.</a></p>
</div>