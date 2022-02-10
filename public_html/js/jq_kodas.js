$(function (){

  let div = $('main section div:first-child');
  let div2 = $('main section div:nth-child(2)');

  div.click(function (){
    div2.fadeToggle();
  });


  div.on('mouseover', function (){
    div2.fadeToggle();
  })


});