$(document).ready(function() {
    //obtenemos el valor de los input
    $('#adicionar').click(function() {

        var nombre = $('input:radio[name=product]:checked').val();
        var pro = $('input:checkbox[name=p]:checked').val();
        if (pro == null) {
          var pro ="";
          var mul = 1;
        }else {
          var mul = pro.slice(-1);
        }

        var pn="p_"+nombre;
        var precio = document.getElementById(pn).value;
        var precio = mul * precio;
        var total = document.getElementById('total').value;
        var i = document.getElementById("int").value + 1; //contador para asignar id al boton que borrara la fila
        var fila = '<tr id="row' + i + '"><td><input type="text" name="productos[]" value="'+nombre+'" autofocus readonly style=" border: 0;" /></td><td><input type="text" name="precios[]" value="'+precio+'" autofocus readonly style=" border: 0;" /></td><td><input type="text" name="promos[]" value="'+pro+'" autofocus readonly style=" border: 0;" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
        var T=0;
        i++;
        //----------------------------------------

        //----------------------------------------

        $('#mytable tr:first').after(fila);
        $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
        var nFilas = $("#mytable tr").length;
        T= parseInt(total) + parseInt(precio);
        $("#adicionados").append('Total: $'+T);
        //le resto 1 para no contar la fila del header
        document.getElementById("int").value = "";
        document.getElementById("int").value = i;
        document.getElementById("total").value = T;
        document.getElementById('spTotal').innerHTML = '-'+T;
        document.getElementById('spTotalVen').innerHTML = T;
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        var total = document.getElementById('total').value;

        var valores = 0;

          // Obtenemos todos los valores contenidos en los <td> de la fila
          // seleccionada
          $(this).parents("tr").find(".pre").each(function() {
            valores = $(this).html();
          });


        //cuando da click obtenemos el id del boton
        $('#row' + button_id + '').remove(); //borra la fila
        //limpia el para que vuelva a contar las filas de la tabla
        $("#adicionados").text("");
        var nFilas = $("#mytable tr").length;
        T= parseInt(total) - parseInt(valores);
        document.getElementById("total").value = T;
        $("#adicionados").append('Total: $'+T);
        document.getElementById('spTotal').innerHTML = '-'+T;
        document.getElementById('spTotalVen').innerHTML = T;
    });
});

function sumar() {

  var total = 0;

  $(".monto").each(function() {

    if (isNaN(parseFloat($(this).val()))) {

      total += 0;

    } else {
      total = parseFloat($(this).val());
      tt = total;
      var totalV = document.getElementById('total').value;
      total -= totalV;
      if (tt >= totalV) {
          document.getElementById('boton').disabled=false;
      }else {
          document.getElementById('boton').disabled=true;
      }
    }

  });

  //alert(total);
  document.getElementById('spTotal').innerHTML = total;

}


$(document).ready(function() {
    //obtenemos el valor de los input
    $('#adicionar2').click(function() {
        var nombre = document.getElementById('producto').value;
        var sucursal = document.getElementById('sucursal').value;
        var precio = document.getElementById('precio').value;
        var RE = /^\d*\.?\d*$/;
        if (RE.test(precio)) {
            var i = document.getElementById("int").value + 1; //contador para asignar id al boton que borrara la filao
            var fila = '<tr id="row' + i + '"><td><input type="text" name="productos[]" value="'+nombre+'" autofocus readonly style=" border: 0;" /></td><td><input type="text" name="precio[]" value="'+precio+'" autofocus readonly style=" border: 0;" /></td><td><input type="text" name="sucursales[]" value="'+sucursal+'" autofocus readonly style=" border: 0;" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove2">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
            var T=0;
            i++;
            $('#mytable2 tr:first').after(fila);
            var nFilas = $("#mytable2 tr").length;
            //le resto 1 para no contar la fila del header
            document.getElementById("int").value = "";
            document.getElementById("int").value = i;
        } else {
            alert("En el precio no se aceptan letras");
        }

    });
    $(document).on('click', '.btn_remove2', function() {
        var button_id = $(this).attr("id");

        var valores = 0;

          // Obtenemos todos los valores contenidos en los <td> de la fila
          // seleccionada
          $(this).parents("tr").find(".pre").each(function() {
            valores = $(this).html();
          });


        //cuando da click obtenemos el id del boton
        $('#row' + button_id + '').remove(); //borra la fila
        //limpia el para que vuelva a contar las filas de la tabla
        var nFilas = $("#mytable2 tr").length;
    });
});

$('#file_mini').on('change',function(){
   $('#inputvalmini').text( $(this).val());
 });

$('#file_chico').on('change',function(){
    $('#inputvalchico').text( $(this).val());
});

$('#file_mediano').on('change',function(){
   $('#inputvalmediano').text( $(this).val());
});

$('#file_grande').on('change',function(){
   $('#inputvalgrande').text( $(this).val());
 });

$('#file_ml').on('change',function(){
    $('#inputvalml').text( $(this).val());
  });

$('#file_l').on('change',function(){
   $('#inputvall').text( $(this).val());
 });

$('#file_cs').on('change',function(){
  $('#inputvalcs').text( $(this).val());
});

$('#file_cd').on('change',function(){
   $('#inputvalcd').text( $(this).val());
});

$('#file_cas').on('change',function(){
   $('#inputvalcas').text( $(this).val());
 });

 $('#file_cad').on('change',function(){
    $('#inputvalcad').text( $(this).val());
  });
//configuracion de precios y imagenes

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
