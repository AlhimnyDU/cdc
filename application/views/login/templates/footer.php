<div class="overlay" hidden>
  <div class="overlay__inner">
    <div class="overlay__content"><span class="spinner"></span></div>
  </div>
</div>
</body>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/vendors/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(function() {
    $("#btnSubmit").click(function() {
      var password = $("#password").val();
      var confirmPassword = $("#conf_password").val();
      if (password != confirmPassword) {
        swal("Password Tidak Cocok", "Harap isi password dengan sama", "error");
        return false;
      }
      return true;
    });
    $(".buttonSubmit").click(function() {
      $(".overlay").removeAttr('required');
    });
    $('#umum').hide();
    $('#role').change(function() {
      if ($('#role').val() == 'umum') {
        $('#umum').show();
        $('#internal').hide();
        $("#nik").prop("disabled", false);
        $("#asal").prop("disabled", false);
        $("#nik").prop("required", true);
        $("#asal").prop("required", true);
        $("#nrp").prop("disabled", true);
        $("#nrp").removeAttr('required');
      } else {
        $('#umum').hide();
        $('#internal').show();
        $("#nik").prop("disabled", true);
        $("#asal").prop("disabled", true);
        $("#nik").removeAttr('required');
        $("#asal").removeAttr('required');
        $("#nrp").prop("disabled", false);
        $("#nrp").prop("required", true);
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('.dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong happended.'
      }
    });
  });
</script>
<?php if ($this->session->flashdata('insert_akunP')) { ?>
  <script>
    swal({
      title: "Registration Success!",
      text: "Akun sudah tersimpan, silahkan tunggu admin mengaktifkan akun anda",
      icon: "success",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('insert_akun')) { ?>
  <script>
    swal({
      title: "Registration Success!",
      text: "Akun sudah tersimpan, silahkan login",
      icon: "success",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('nonaktif')) { ?>
  <script>
    swal({
      title: "Akun Belum Aktif!",
      text: "Silahkan hubungi admin untuk mengaktifkan akun",
      icon: "info"
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('perusahaan_ada')) { ?>
  <script>
    swal({
      title: "Registration Failed!",
      text: "Nama Akun / Perusahaan sudah terdaftar!",
      icon: "error",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('akun_ada')) { ?>
  <script>
    swal({
      title: "Registration Failed!",
      text: "Akun sudah terdaftar!",
      icon: "error",
      timer: 2000
    });
  </script>
<?php } ?>

</html>