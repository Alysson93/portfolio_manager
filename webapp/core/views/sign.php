<h2>Acesse a sua conta:</h2>
<form method="post" action="<?=WEB_URL?>/acesso">
    <label for="username1">Username</label>
    <input type="text" id="username1" name="username" required
        value="<?=isset($data['username']) ? $data['username'] : '' ?>" 
    >
    <label for="password1">Senha</label>
    <input type="password" id="password1" name="password" required
        value="<?=isset($data['password']) ? $data['password'] : '' ?>"
    >
    <input type="submit" name="signin" value="Acessar">
</form>

<h2>Ainda não possui conta? Cadastre-se aqui:</h2>
<form method="post" action="<?=WEB_URL?>/acesso">
    <label for="username2">Username</label>
    <input type="text" id="username2" name="username" required
        value="<?=isset($data['username']) ? $data['username'] : '' ?>"
    >
    <label for="password2">Senha</label>
    <input type="password" id="password2" name="password" required
        value="<?=isset($data['password']) ? $data['password'] : '' ?>"
    >
    <label for="confirm_password">Repita a sua senha</label>
    <input type="password" id="confirm_password" name="confirm_password" required
        value="<?=isset($data['confirm_password']) ? $data['confirm_password'] : '' ?>"
    >
    <label for="name">Nome</label>
    <input type="text" id="name" name="first_name" required
        value="<?=isset($data['name']) ? $data['name'] : '' ?>"
    >
    <label for="lastname">Sobrenome</label>
    <input type="text" id="lastname" name="last_name" required
        value="<?=isset($data['lastname']) ? $data['lastname'] : '' ?>"
    >
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="Ex: joao@email.com" required
        value="<?=isset($data['email']) ? $data['email'] : '' ?>"
    >
    <label for="phone">Telefone</label>
    <input type="text" id="phone" name="phone" placeholder="Ex: (00) 9 1234 - 5678" required
        value="<?=isset($data['phone']) ? $data['phone'] : '' ?>"
    >
    <input type="submit" name="signup" value="Cadastrar">
</form>