$(document).ready(function() {

  //SET BODY HEIGHT FOR SHORT CONTENT
  function setBodyFill() {
    var $window = $( window ).height();
    var $header = $('header').height();
    var $footer = $('footer').outerHeight();
    var $main  = $('main').height();

    $('.fill-bodyheight').css('min-height', $window - $header - $footer);
  };

  setBodyFill();
  $(window).on("resize", setBodyFill);

});
