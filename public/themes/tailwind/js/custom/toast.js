function toastTopEnd(title = '', message = '', icon = 'success', html = '', timer = 3000) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,
        title: title,
        text: message,
        html: html,
        showConfirmButton: false,
        timer: timer  // Adjust the timer as needed (in milliseconds)
    });
}

function toastInfo(title = '', message = '', icon = 'success', html = '') {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
        html: html,
    });
}