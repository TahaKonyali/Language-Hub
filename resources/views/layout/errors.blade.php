@error('success')
    <script>
        $(document).ready(function() {
            toastr.success({!! json_encode($message) !!});
        });
    </script>
@enderror
@error('danger')
    <script>
        $(document).ready(function() {
            toastr.error({!! json_encode($message) !!});
        });
    </script>
@enderror
