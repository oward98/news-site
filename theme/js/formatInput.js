function formatInput(inputElement) {
    inputElement.autocomplete = 'off';
    inputElement.spellcheck = 'false';
}

var subscribeInput = document.getElementById('subscribe-field-blog_subscription-2');

if (subscribeInput) {
    window.addEventListener('load', function() { formatInput(subscribeInput) });
}


