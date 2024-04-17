$("body").on('click', '[data-bs-toggle="modal"]', function () {

	const backdrops = $(".modal-backdrop.fade.show");

	let count = 0;
	backdrops.each(function () {
		if (count > 0) {
			count++;

			$(this).remove();
		} else {
			count++;
		}
	});
});

$('.main-content').on('keyup', 'input', function () {
	// check first if the input has error
	const hasBorderError = $(this).hasClass('border-danger');

	if (hasBorderError) {
		$(this).removeClass('border border-danger');

		const hasErrorMessage = $(this).next().hasClass('text-danger');
		if (hasErrorMessage)
			$(this).next().remove();
	}

	const hasParentFields = ['date'];
	const inputType = $(this).attr('type');
	if (hasParentFields.includes(inputType)) {
		$(this).parent().removeClass('border border-danger');

		const hasErrorMessage = $(this).parent().next().hasClass('text-danger');
		if (hasErrorMessage)
			$(this).parent().next().remove();
	}
});

$('.main-content').on('change', 'select', function () {
	// check first if the input has error
	const hasBorderError = $(this).hasClass('border-danger');

	if (hasBorderError) {
		$(this).removeClass('border border-danger');

		const hasErrorMessage = $(this).next().hasClass('text-danger');
		if (hasErrorMessage)
			$(this).next().remove();
	}
});

$('.main-content').on('keyup', 'textarea', function () {
	// check first if the input has error
	const hasBorderError = $(this).hasClass('border-danger');

	if (hasBorderError) {
		$(this).removeClass('border border-danger');

		const hasErrorMessage = $(this).next().hasClass('text-danger');
		if (hasErrorMessage)
			$(this).next().remove();
	}
});

// * For session
// const INTERVAL_DURATION_ACTIVITY = 60 * 60 * 1000; // 1 hour in milliseconds
// const INTERVAL_DURATION_INACTIVITY = 30 * 60 * 1000; // 30 minutes in milliseconds
// let userIsActive = false;
// let activityInterval;
// let lastActivityTime = Date.now();

// function setUserActivity() {
// 	userIsActive = true;
// 	lastActivityTime = Date.now();

// 	// Clear the previous interval and start a new one
// 	clearInterval(activityInterval);
// 	activityInterval = setInterval(setUserInactivity, INTERVAL_DURATION_INACTIVITY);
// }

// function setUserInactivity() {
// 	const timeSinceLastActivity = Date.now() - lastActivityTime;
// 	if (timeSinceLastActivity >= INTERVAL_DURATION_INACTIVITY) {
// 		userIsActive = false;
// 		console.log("User is inactive");
// 	} else {
// 		console.log("User is active");
// 	}
// }

// function refreshTokenAndExpiration() {
// 	// Make sure to adjust the token refresh endpoint and request payload as needed
// 	axios.post(`${getAppUrl()}/admin-main/refresh-token`, {}, {
// 		headers: {
// 			'Content-Type': 'application/json',
// 		}
// 	}).then(response => {
// 		// Handle token refresh success
// 		console.log("Token refreshed successfully");
// 		// Update expiration time every 1 hour
// 		const expirationTime = Date.now() + INTERVAL_DURATION_ACTIVITY;
// 		sessionStorage.setItem('api_token_expires_at', expirationTime);
// 		console.log("Token expiration updated");
// 	}).catch(error => {
// 		// Handle token refresh failure
// 		console.error("Error refreshing token:", error);
// 	});
// }

// document.addEventListener('mousemove', setUserActivity);
// document.addEventListener('keydown', setUserActivity);

// // Set initial expiration time
// const expirationTime = Date.now() + INTERVAL_DURATION_ACTIVITY;
// sessionStorage.setItem('api_token_expires_at', expirationTime);

// // Start refreshing token and expiration every 1 hour
// setInterval(refreshTokenAndExpiration, INTERVAL_DURATION_ACTIVITY);

// // Start monitoring user activity
// setUserActivity();