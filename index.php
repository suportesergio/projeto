<html>
<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("input[name='nome']").blur(function(){
      var $endereco = $("input[name='endereco']");
      var $telefone = $("input[name='telefone']");

      $endereco.val('Carregando...');
      $telefone.val('Carregando...');

        $.getJSON(
          'function.php',
          { nome: $( this ).val() },
          function( json )
          {
            $endereco.val( json.endereco );
            $telefone.val( json.telefone );
          }
        );
    });
  });
  </script>
</head>
<body>
  <form action="" method="post">
    <label>Nome: <input type="text" name="nome" /></label>
    <label>Endereço: <input name="endereco" type="text"  value="" /></label>
    <label>Telefone: <input type="text" name="telefone" value="" /></label>
  </form>
</body>
</html>