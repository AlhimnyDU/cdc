<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#conf_password").val();
            if (password != confirmPassword) {
                swal("Password Tidak Cocok", "Harap isi password dengan sama", "error");
                return false;
            }
            return true;
        });
    });
</script>