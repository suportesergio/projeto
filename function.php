<?php
  /**
   * função que devolve em formato JSON os dados do cliente
   */
  function retorna( $nome, $db )
  {
    $sql = "SELECT `id`, `nome`, `telefone`, `endereco`
      FROM `cliente` WHERE `nome` = '{$nome}' ";

    $query = $db->query( $sql );

    $arr = Array();
    if( $query->num_rows )
    {
      while( $dados = $query->fetch_object() )
      {
        $arr['endereco'] = $dados->endereco;
        $arr['telefone'] = $dados->telefone;
      }
    }
    else
      $arr['endereco'] = 'não encontrado';

    return json_encode( $arr );
  }

/* só se for enviado o parâmetro, que devolve os dados */
if( isset($_GET['nome']) )
{
  $db = new mysqli('localhost', 'root', 'cons2000', 'bda');
  echo retorna( filter ( $_GET['nome'] ), $db );
}

function filter( $var ){
  return $var;//a implementação desta, fica a cargo do leitor
}