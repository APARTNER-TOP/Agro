<script>
    var requiredMessage = "{{ __('contents.requiredMessage')}}";
    var typeMismatchMessage = "{{ __('contents.mismatchMessage')}}"

    function invalidMsg(inputField) {
        if (inputField.value === '') {
            inputField.setCustomValidity(requiredMessage);
        } else if (inputField.typeMismatch) {
            inputField.setCustomValidity(typeMismatchMessage);
        } else {
            inputField.setCustomValidity('');
        }
        return true;
    }
</script>
