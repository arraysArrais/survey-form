//Limita a seleção de 3 opções para os inputs dentro da div de categoria
$(".formulario input[type=checkbox]").on("click", function() {
    var count = $(".formulario input[type=checkbox]:checked").length;
    if (count < 3) {
      $(".formulario input[type=checkbox]").removeAttr("disabled");
    } else {
      $(".formulario input[type=checkbox]").prop("disabled", "disabled");
      $(".formulario input[type=checkbox]:checked").removeAttr("disabled");
    }
  });