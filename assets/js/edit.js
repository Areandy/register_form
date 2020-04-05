var lang = JSON.parse(hidden_lang.value)

edit_form.addEventListener('submit', (e) => {

	e.preventDefault()
	var flag = true

	/*
	**	Validation for the first name
	*/
	var regex = /^[a-zA-Z]{3,30}$/

	if (first_name.value.length == 0) {
		first_name.classList.remove('is-invalid')
	} else if (first_name.value.length < 3 || first_name.value.length > 30) {
		first_name_feedback.innerText = (first_name.value.length < 3)
			? lang.min3
			: lang.max30
		first_name.classList.add('is-invalid')
		flag = false
	} else if (regex.test(first_name.value)) {
		first_name.classList.remove('is-invalid')
		first_name.classList.add('is-valid')
	} else {
		first_name_feedback.innerText = lang.name_err
		first_name.classList.remove('is-valid')
		first_name.classList.add('is-invalid')
		flag = false
	}

	/*
	**	Validation for the last name
	*/
	regex = /^[a-zA-Z]{3,30}$/

	if (last_name.value.length == 0) {
		last_name.classList.remove('is-invalid')
	} else if (last_name.value.length < 3 || last_name.value.length > 30) {
		last_name_feedback.innerText = (last_name.value.length < 3)
			? lang.min3
			: lang.max30	
		last_name.classList.add('is-invalid')
		flag = false
	} else if (regex.test(last_name.value)) {
		last_name.classList.remove('is-invalid')
		last_name.classList.add('is-valid')
	} else {
		last_name_feedback.innerText = lang.name_err
		last_name.classList.remove('is-valid')
		last_name.classList.add('is-invalid')
		flag = false
	}

	/*
	**	Validation for age
	*/
	regex = /^[1-9][0-9]$/

	if (age.value.length == 0) {
		age.classList.remove('is-invalid')
	} else if (regex.test(age.value)) {
		age.classList.remove('is-invalid')
		age.classList.add('is-valid')
	} else {
		age.classList.remove('is-valid')
		age.classList.add('is-invalid')
		flag = false
	}

	if (flag)
		// console.log('submit')
		edit_form.submit()
})