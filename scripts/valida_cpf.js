function CPF() {
    "user_strict";

    function r(r) {
      for (var t = null, n = 0; 9 > n; ++n) t += r.toString().charAt(n) * (10 - n);
      var i = t % 11;
      return i = 2 > i ? 0 : 11 - i
    }

    function t(r) {
      for (var t = null, n = 0; 10 > n; ++n) t += r.toString().charAt(n) * (11 - n);
      var i = t % 11;
      return i = 2 > i ? 0 : 11 - i
    }
    var n = '<p style="color:red; font-size:12px;">Informe um CPF válido</p>',
      i = '<p style="color:green; font-size:12px;">CPF válido</p>';
    this.gera = function() {
      for (var n = "", i = 0; 9 > i; ++i) n += Math.floor(9 * Math.random()) + "";
      var o = r(n),
        a = n + "-" + o + t(n + "" + o);
      return a
    }, this.valida = function(o) {
      for (var a = o.replace(/\D/g, ""), u = a.substring(0, 9), f = a.substring(9, 11), v = 0; 10 > v; v++)
        if ("" + u + f == "" + v + v + v + v + v + v + v + v + v + v + v) return n;
      var c = r(u),
        e = t(u + "" + c);
      return f.toString() === c.toString() + e.toString() ? i : n
    }
  }

  var CPF = new CPF();

  $(document).ready(function() {
    $("#cpf").keyup(function() {
      var teste = CPF.valida($(this).val());
      $("#validacpf").html(teste);
      if (teste == '<p style="color:green; font-size:12px;">CPF válido</p>') {
        $("#submit").removeAttr("disabled");
      } else {
        $("#submit").attr("disabled", true);
      }
    });

    $("#cpf").blur(function() {
      var teste = CPF.valida($(this).val());
      $("#validacpf").html(teste);
      if (teste == '<p style="color:green; font-size:12px;">CPF válido</p>') {
        $("#submit").removeAttr("disabled");
      } else {
        $("#submit").attr("disabled", true);
      }
    });
  });