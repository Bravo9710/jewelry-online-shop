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

//Items counter
