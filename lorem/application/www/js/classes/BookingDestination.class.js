'use strict';




var BookinDestinationForm = function()
{
  this.dest          = $('#dest');
	this.destDetails   = $('#dest-details');
  this.link          = $('#link');
};


BookinDestinationForm.prototype.onChangeDest = function()
{
	var choice = this.dest.val();


	$.getJSON
	(
		getRequestUrl() + '/dest?id=' + choice, 
		this.onAjaxChangeDest.bind(this)
	);
};

BookinDestinationForm.prototype.onAjaxChangeDest = function(e)
{
  this.destDetails.children('img').attr('src', getWwwUrl() + '/images/planets/' + e.Image);
  this.destDetails.children('img').attr('alt', e.Image);
  $('#validateChoice').html('<p></p>');
  $('#validateChoice').children('p').append('<h3>'+e.Name+'</h3><br>'+e.Description +'<br>'+ e.DescriptionPlus +'<br> Prix : '+ e.Price +' €');
  $("#destination").val(e.Name);
  $('#linkConfirm').removeClass('hide');

};


BookinDestinationForm.prototype.run = function(){
	this.dest.on('change', this.onChangeDest.bind(this));
};
