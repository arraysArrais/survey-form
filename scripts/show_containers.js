//Exibe dinâmicamente containers de resposta de acordo com a categoria selecionada
$(".formularioresposta").hide();

    function exibe(categoria, resposta) {
      if ($(categoria).is(":checked")) {
        $(resposta).show(200);
      } else {
        $(resposta).hide(200);
      }
    }