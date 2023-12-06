@if(!empty(session('success')))
    <div class="alert alert-success" role="alert" id="successAlert">{{ session('success') }}</div>
@endif

@if(!empty(session('error')))
    <div class="alert alert-danger" role="alert" id="errorAlert">{{ session('error') }}</div>
@endif

<script>
    // Function to remove the alerts after 2 seconds
    function removeAlerts() {
        setTimeout(function() {
            var successAlert = document.getElementById('successAlert');
            var errorAlert = document.getElementById('errorAlert');

            if (successAlert) {
                successAlert.remove();
            }
            if (errorAlert) {
                errorAlert.remove();
            }
        }, 2000);
    }

    // Call the function when the page loads
    window.onload = removeAlerts;
</script>
