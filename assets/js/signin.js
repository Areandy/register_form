var lang = JSON.parse(hidden_lang.value)

signin_form.addEventListener('submit', (e) => {

	e.preventDefault()
	var flag = true

	/*
	**	Validation for username or email field
	*/
	var regex = (name_or_email.value.match(/@/))
		? /^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}$/
		: /^[0-9a-zA-Z_]{3,30}$/

	if (regex.test(name_or_email.value)) {
		name_or_email.classList.remove('is-invalid')
		name_or_email.classList.add('is-valid')
	} else {
		name_or_email.classList.remove('is-valid')
		name_or_email.classList.add('is-invalid')
		flag = false
	}

	/*
	**	Validation for password
	*/
	regex = /^[0-9a-zA-Z@#$_!]{6,30}$/

	if (password.value.length < 6 || password.value.length > 30) {
		password_feedback.innerText = (password.value.length < 6)
			? lang.min6
			: lang.max30
		password.classList.add('is-invalid')
		flag = false
	} else if (regex.test(password.value)) {
		password.classList.remove('is-invalid')
		password.classList.add('is-valid')
	} else {
		password_feedback.innerText = lang.pass_err
		password.classList.remove('is-valid')
		password.classList.add('is-invalid')
		flag = false
	}

	if (flag)
		signin_form.submit()
})