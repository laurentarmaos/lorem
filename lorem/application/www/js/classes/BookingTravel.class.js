'use strict';




var BookingTravelForm = function()
{
  this.trav          = $('#trav');
	this.travDetails   = $('#trav-details');
  this.link          = $('#link');
};


BookingTravelForm.prototype.onChangeTrav = function()
{
	var choice = this.trav.val();


	$.getJSON
	(
		getRequestUrl() + '/trav?id=' + choice,
		this.onAjaxChangeTrav.bind(this)       
	);
};

BookingTravelForm.prototype.onAjaxChangeTrav = function(e)
{
  this.travDetails.children('img').attr('src', getWwwUrl() + '/images/planets/' + e.Image);
  this.travDetails.children('img').attr('alt', e.Image);
  $('#validateChoice').html('<p></p>');
  $('#validateChoice').children('p').append('<h3>'+e.Name+'</h3><br>'+e.Description +'<br>'+ e.DescriptionPlus+'<br> Prix : '+ e.Price +' €');
  $("#destination").val(e.Name);
  $('#linkConfirm').removeClass('hide');

};


BookingTravelForm.prototype.run = function(){
	this.trav.on('change', this.onChangeTrav.bind(this));
};
