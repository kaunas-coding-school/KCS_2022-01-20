$(function (){

  $('#sendForm').click(function (){

    let name = $('#fn').val();
    let car = $('#masina').val();
    let message = $('#zinute').val();

    let data = {
      'vardas': name,
      'auto': car,
      'zinute': message
    }

    $.post('http://localhost/kursiustiduomenis.php', data,  function (ats){
      $('#atsakymas').text(ats);
    });

  });


});