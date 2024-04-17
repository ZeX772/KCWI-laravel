// To properly decode the pdf generated from the API
function b64toBlob(b64Data, contentType, sliceSize) {
    contentType = contentType || '';
    sliceSize = sliceSize || 512;

    var byteCharacters = atob(b64Data);
    var byteArrays = [];

    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);
        byteArrays.push(byteArray);
    }

    var blob = new Blob(byteArrays, { type: contentType });
    return blob;
}

function ucfirst(str) {
    if (typeof str !== 'string' || str.length === 0) {
        return str; // Return unchanged if not a non-empty string
    }

    return str.charAt(0).toUpperCase() + str.slice(1);
}

function clearFormFieldErrors(form){
    $(`${form} select`).removeClass('border border-danger');
    if( $(`${form} select`).next().is('p') )
        $(`${form} select`).next().remove();

    $(`${form} input`).removeClass('border border-danger');
    if( $(`${form} input`).next().is('p') )
        $(`${form} input`).next().remove();

    $(`${form} textarea`).removeClass('border border-danger');
    if( $(`${form} textarea`).next().is('p') )
        $(`${form} textarea`).next().remove();
}

function isValidPhoneNumber(phoneNumber) {
    // Remove non-digit characters from the phone number
    var cleanPhoneNumber = phoneNumber.replace(/\D/g, '');

    // Validate if the cleaned phone number has at least 5 digits
    // Adjust this threshold based on your specific requirements
    return cleanPhoneNumber.length >= 5;
}