<?php
session_start();
require 'config/connection.php';
require 'functions/checksessionerror.php';


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>
    DEV
  </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>



<body>
  <a href="login.php">Login</a>
  <header class="header">
    <h1 id="title">Pesquisa do consumidor</h1>
    <p id="description"><i>Queremos te fornecer ofertas imbatíveis nesta Black Friday!</i></p>
  </header>
  <div class="container">
    <form id="survey-form" action="form_action.php" method="POST">
      <div class="formulario">

        <?php
        checkSessionError();
        ?>

        <label id="name-label" for="name">Nome</label>
        <input name="name" class="inputform" id="name" type="text" placeholder="Seu nome" required>
      </div>
      <div class="formulario">
        <label id="email-label" for="email">Email</label>
        <input name="email" class="inputform" id="email" type="email" placeholder="Seu melhor email" required>
      </div>
      <div class="formulario">
        <label id="number-label" for="cpf">CPF</label><span id="validacpf"></span>
        <input name="cpf" class="inputform" id="cpf" type="text" placeholder="Seu CPF" maxlength="11" pattern="[0-9]{11}" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
      </div>
      <?php

      ?>
      <div class="formulario" id="categorias">
        <p>Na Black Friday, você está procurando por ofertas em quais categorias? (selecione até 3 opções)</p>
        <input type="checkbox" id="modacategoria" name="categoria" onclick="exibe(modacategoria,modaresposta)" value="1"> Moda
        <br>
        <input type="checkbox" id="artdiversoscategoria" name="categoria" onclick="exibe(artdiversoscategoria,artdiversosresposta)" value="2"> Artigos Diversos
        <br>
        <input type="checkbox" id="blzcategoria" name="categoria" onclick="exibe(blzcategoria,blzresposta)" value="3"> Beleza/Cuidados Pessoais
        <br>
        <input type="checkbox" id="casacategoria" name="categoria" onclick="exibe(casacategoria,casaresposta)" value="4"> Casa e Decoração
        <br>
        <input type="checkbox" id="gastronomiacategoria" name="categoria" onclick="exibe(gastronomiacategoria,gastronomiaresposta)" value="5"> Gastronomia
        <br>
        <input type="checkbox" id="lazercategoria" name="categoria" onclick="exibe(lazercategoria,lazerresposta)" value="6"> Lazer/Entretenimento
        <br>
        <input type="checkbox" id="petcategoria" name="categoria" onclick="exibe(petcategoria,petresposta)" value="7"> Pet
        <br>
        <input type="checkbox" id="eletroeletronicocategoria" name="categoria" onclick="exibe(eletroeletronicocategoria,eletroeletronicoresposta)" value="8"> Eletroeletrônico
        <br>
        <input type="checkbox" id="eletrodomesticocategoria" name="categoria" onclick="exibe(eletrodomesticocategoria,eletrodomesticoresposta)" value="9"> Eletrodoméstico
        <br>
        <input type="checkbox" id="infantilcategoria" name="categoria" onclick="exibe(infantilcategoria,infantilresposta)" value="10"> Infantil

      </div>
      <div class="formularioresposta" id="modaresposta">
        <p>Dentro da categoria "Moda", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="1"> Feminina
        <br>
        <input type="checkbox" name="resposta[]" value="2"> Masculina
        <br>
        <input type="checkbox" name="resposta[]" value="3"> Bolsas/Calçados
        <br>
        <input type="checkbox" name="resposta[]" value="4"> Acessórios
        <br>
        <input type="checkbox" name="resposta[]" value="5"> Moda sustentável
      </div>
      <div class="formularioresposta" id="artdiversosresposta">
        <p>Dentro da categoria "Artigos Diversos", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="6"> Livros
        <br>
        <input type="checkbox" name="resposta[]" value="7"> Itens Colecionáveis
        <br>
        <input type="checkbox" name="resposta[]" value="8"> Ferramenta e construção
        <br>
        <input type="checkbox" name="resposta[]" value="9"> Papelaria
      </div>
      <div class="formularioresposta" id="blzresposta">
        <p>Dentro da categoria "Beleza/Cuidados Pessoais", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="10"> Perfume/Hidratante
        <br>
        <input type="checkbox" name="resposta[]" value="11"> Maquiagem
        <br>
        <input type="checkbox" name="resposta[]" value="12"> Itens para cabelo
        <br>
        <input type="checkbox" name="resposta[]" value="13"> Cuidados com a pele
        <br>
        <input type="checkbox" name="resposta[]" value="14"> Corpo e banho
      </div>
      <div class="formularioresposta" id="casaresposta">
        <p>Dentro da categoria "Casa e Decoração", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="15"> Jogo de cama
        <br>
        <input type="checkbox" name="resposta[]" value="16"> Jogo de banheiro
        <br>
        <input type="checkbox" name="resposta[]" value="17"> Decoração
        <br>
        <input type="checkbox" name="resposta[]" value="18"> Móveis
        <br>
        <input type="checkbox" name="resposta[]" value="19"> Aparelho de Jantar
      </div>
      <div class="formularioresposta" id="gastronomiaresposta">
        <p>Dentro da categoria "Gastronomia", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="20"> Fast-food
        <br>
        <input type="checkbox" name="resposta[]" value="21"> Jantar
        <br>
        <input type="checkbox" name="resposta[]" value="22"> Cerveja e/ou vinho
        <br>
        <input type="checkbox" name="resposta[]" value="23"> Petiscos
        <br>
        <input type="checkbox" name="resposta[]" value="24"> Doces
      </div>
      <div class="formularioresposta" id="lazerresposta">
        <p>Dentro da categoria "Lazer/Entretenimento", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="25"> Cinema
        <br>
        <input type="checkbox" name="resposta[]" value="26"> Teatro
        <br>
        <input type="checkbox" name="resposta[]" value="27"> Lazer infantil
        <br>
        <input type="checkbox" name="resposta[]" value="28"> Espaço Gamer
        <br>
        <input type="checkbox" name="resposta[]" value="29"> Eventos Culturais do Shopping
      </div>
      <div class="formularioresposta" id="petresposta">
        <p>Dentro da categoria "Pet", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="30"> Operações Pet
        <br>
        <input type="checkbox" name="resposta[]" value="31"> Acessórios Pet
        <br>
        <input type="checkbox" name="resposta[]" value="32"> Lazer Pet
        <br>
        <input type="checkbox" name="resposta[]" value="33"> Eventos Pet
      </div>
      <div class="formularioresposta" id="eletroeletronicoresposta">
        <p>Dentro da categoria "Eletroeletrônico", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="34"> Celular
        <br>
        <input type="checkbox" name="resposta[]" value="35"> Computador/notebook
        <br>
        <input type="checkbox" name="resposta[]" value="36"> Video Game
        <br>
        <input type="checkbox" name="resposta[]" value="37"> Acessórios Gamer
        <br>
        <input type="checkbox" name="resposta[]" value="38"> Fone de ouvido
      </div>
      <div class="formularioresposta" id="eletrodomesticoresposta">
        <p>Dentro da categoria "Eletrodoméstico", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="39"> Microondas
        <br>
        <input type="checkbox" name="resposta[]" value="40"> Geladeira
        <br>
        <input type="checkbox" name="resposta[]" value="41"> Televisão
        <br>
        <input type="checkbox" name="resposta[]" value="42"> Fogão
        <br>
        <input type="checkbox" name="resposta[]" value="43"> Ar Condicionado
      </div>
      <div class="formularioresposta" id="infantilresposta">
        <p>Dentro da categoria "Infantil", quais produtos são mais interessantes pra você?</p>
        <input type="checkbox" name="resposta[]" value="39"> Brinquedos
        <br>
        <input type="checkbox" name="resposta[]" value="40"> Moda Infantil
        <br>
        <input type="checkbox" name="resposta[]" value="41"> Acessórios Puericultura
        <br>
        <input type="checkbox" name="resposta[]" value="42"> Operações
        <br>
        <input type="checkbox" name="resposta[]" value="43"> Ar Condicionado
      </div>

      <div class="formulario">
        <input id="submit" type="submit" value="Enviar" disabled>
      </div>
    </form>
  </div>

  <script type="text/javascript" src="scripts/show_containers.js"></script>
  <script type="text/javascript" src="scripts/input_limit.js"></script>
  <script type="text/javascript" src="scripts/valida_cpf.js"></script>

</body>

</html>