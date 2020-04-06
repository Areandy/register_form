var lang = JSON.parse(hidden_lang.value)

signup_form.addEventListener('submit', (e) => {

	e.preventDefault()
	var flag = true

	/*
	**	Validation for username
	*/
	var regex = /^[0-9a-zA-Z_]{3,30}$/ 

	if (username.value.length < 3 || username.value.length > 30) {
		username_feedback.innerText = (username.value.length < 3)
			? lang.min3
			: lang.max30
		username.classList.add('is-invalid')
		flag = false
	} else if (regex.test(username.value)) {
		username.classList.remove('is-invalid')
		username.classList.add('is-valid')
	} else {
		username_feedback.innerText = lang.username_err
		username.classList.remove('is-valid')
		username.classList.add('is-invalid')
		flag = false
	}

	/*
	**	Validation for email
	*/
	regex = /^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}$/

	if (email.value.length < 8 || email.value.length > 30) {
		email_feedback.innerText = (email.value.length < 8)
			? lang.min8
			: lang.max30
		email.classList.add('is-invalid')
		flag = false
	} else if (regex.test(email.value)) {
		email.classList.remove('is-invalid')
		email.classList.add('is-valid')
	} else {
		email_feedback.innerText = lang.email_err
		email.classList.remove('is-valid')
		email.classList.add('is-invalid')
		flag = false
	}

	/*
	**	Validation for password
	*/

	if (password1.value === password2.value) {
		regex = /^[0-9a-zA-Z@#$_!]{6,30}$/

		if (password2.value.length < 6 || password2.value.length > 30) {
			password_feedback.innerText = (password2.value.length < 6)
				? lang.min6
				: lang.max30
			password2.classList.add('is-invalid')
			flag = false
		} else if (regex.test(password2.value)) {
			password1.classList.remove('is-invalid')
			password1.classList.add('is-valid')
			password2.classList.remove('is-invalid')
			password2.classList.add('is-valid')
		} else {
			password_feedback.innerText = lang.pass_err
			password1.classList.remove('is-valid')
			password1.classList.add('is-invalid')
			password2.classList.remove('is-valid')
			password2.classList.add('is-invalid')
			flag = false
		}

	} else {
		password_feedback.innerText = lang.pass_err_match
		password1.classList.remove('is-valid')
		password1.classList.add('is-invalid')
		password2.classList.remove('is-valid')
		password2.classList.add('is-invalid')
		flag = false
	}
	/*
	**	There is no way this looks better on vanilla JS, unfortunately.
	*/

	if (flag)
		signup_form.submit()
})