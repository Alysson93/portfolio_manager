<header class="apa-flex">
    <h1><a href="/">MeuPortfolio</a></h1>
    <ul class="apa-flex">
        <li><a href="/">Home</a></li>
        <?php if (!isset($_SESSION['token'])) { ?>
        <li><a href="/acesso">Entre ou cadastre-se!</a></li>
        <?php } else { ?>
        <li><a href="/mp/<?=$_SESSION['username']?>">Perfil</a></li>
        <li><a href="/acesso/sair">Sair</a></li>
        <?php } ?>
    </ul>
</header>