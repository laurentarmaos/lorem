'use strict';



$(document).on('click', '.plus', mafonc)


function mafonc(e){
  e.preventDefault();
  var id = $(this).data('id');
  $('#desc-'+ id).toggleClass('hide');
  $('#plus-'+ id).toggleClass('hide');
}






  var bookinForm = new BookinDestinationForm();
  bookinForm.run();

  var travForm = new BookingTravelForm();
  travForm.run();
