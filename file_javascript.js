function firmado(event){
  //alert(event.keyCode);
  if(event.keyCode == 13 || event.keyCode == undefined){
    $.ajax({
      url : './motores/hanumat.php',
      type : 'post',
      dataType : 'JSON',
      data : {
        r : 'l',
        usr : $("#usuario").val(),
        pwd : $("#pwd").val()
      }
    }).done(function(r) {
      if (r.error == '0') {
        window.location.href = "./" + r.pagina;
      } else {
        console.log(r);
        toastr.error('Error de credenciales')
      }
    });
    return false;
  }
}
