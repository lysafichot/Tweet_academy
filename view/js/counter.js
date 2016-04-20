$(document).ready(function() {


  $('#maxChar').text('140');
  $('#formTweet').addClass('disabled'); 

    
    $('#tweet-textarea').keyup(function() {
 /*     var regex = new RegExp('https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,}');

var cb = $('#tweet-textarea').val().match(regex);
alert(cb);*/
      var postLength = $(this).val().length;
      var charactersLeft = 140 - postLength;
      $('#maxChar').text(charactersLeft);
      
      if(charactersLeft < 0) {
        $('#formTweet').addClass('disabled'); 
      }
      else if(charactersLeft == 140) {
        $('#formTweet').addClass('disabled');
      }
      else {
        $('#formTweet').removeClass('disabled');
      }
      
    });
    $('formTweet').addClass('disabled');


});