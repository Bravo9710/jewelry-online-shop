
//Items counter

let counterValue = parseInt($('.counter .counter__container').html());

$('.btn-add').on('click', function(e) {
	counterValue++;

	$('.counter .counter__container').html(counterValue)
})

$('.btn-remove').on('click', function(e) {
	if(counterValue <= 1) {
		return;
	} else {
		counterValue--;
	}

	$('.counter .counter__container').html(counterValue)
})

//Select handle on change

$('.js-color').change(function() {
	$('.selected_image').toggleClass('hide');
})

//Handle tabs

$('.js-tabs').on('click', '.tabs__nav a', function(e) {
	e.preventDefault();

	const $this = $(this);
	const tabId = $(this).attr('href');

	$this
		.parent()
		.addClass('is-current')
		.siblings()
		.removeClass('is-current');

	$('.js-tabs')
		.find(tabId)
		.addClass('is-current')
		.siblings()
		.removeClass('is-current');
})

$('#image-gold').change(function() {
	fileName = $(this).val().replace(/C:\\fakepath\\/i, '')

	$thisId = $(this).attr('id');

	$(this).attr('value', fileName);

	$(`label[for=${$thisId}]`).text(fileName);
})


$('#image-silver').change(function() {
	fileName = $(this).val().replace(/C:\\fakepath\\/i, '')

	$thisId = $(this).attr('id');

	$(this).attr('value', fileName);

	$(`label[for=${$thisId}]`).text(fileName);
})
