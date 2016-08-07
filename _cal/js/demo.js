$(function () {
	var selector = new Date;
	selector.addDays(0);
	$('.3-calendars').pickmeup({
		flat		: true,
		date		: new Date,
		format			: 'd-m-Y',
		mode		: 'single',
		calendars	: 3,
		change : function (date){
			alert(date);
		},
	});
});