
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?= $title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="<?= base_url() ?>index.php/signup/store">
  <img class="mb-4" src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
	<h1 class="h3 mb-3 font-weight-normal">Novo Cadastro</h1>

	<label for="inputName" class="sr-only">Nome</label>
	<input type="text" name="nome" id="inputNome" class="form-control" placeholder="Nome do Usuário" required autofocus>

	
  <label for="inputEmail" class="sr-only">Email</label>
	<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
	
  <label for="inputPassword" class="sr-only">Password</label>
	<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
	
	<p>
		<a href="<?=base_url()?>index.php/login">Tudo pronto, você já tem um login?</a>
	</p>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
  <p class="mt-5 mb-3 text-muted">&copy; GYMSYS - GYM 2024</p>
</form>
</body>
</html>
