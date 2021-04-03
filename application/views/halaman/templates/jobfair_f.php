</main><!-- End #main -->
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url() ?>assets/home/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/venobox/venobox.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url() ?>assets/home/assets/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
  $(document).ready(function() {
    $('.dropify').dropify({
      messages: {
        'default': 'Drag and drop / Click',
        'replace': 'Drag and drop / Click',
        'remove': 'Remove',
        'error': 'Ooops, something wrong happended.'
      }
    });
    $('.ipk').inputmask("9.99");
    $('.telp').inputmask("9999999999999");

    // $("#form").submit(function(e) {

    //   //stop submitting the form to see the disabled button effect
    //   e.preventDefault();

    //   //disable the submit button
    //   $("#btnSubmit").attr("disabled", true);
    //   return true;

    // });
    $('#close').click(function() {
      $('#guide').hide();
    });
  });
</script>
<?php if ((!$this->session->userdata('user')) && (!$this->session->userdata('perusahaan')) && (!$this->session->userdata('admin'))) { ?>
  <script>
    swal({
      title: "Wajib Login Akun!",
      text: "Hanya login akun CDC yang dapat mengakses halaman Virtual Job Fair 2021, silahkan login terlebih dahulu",
      icon: "info",
      buttons: {
        confirm: true,
      },
      closeOnClickOutside: false,
      closeOnEsc: false,
    }).then(function() {
      window.location = "<?php echo base_url('login') ?>";
    });
  </script>
<?php } else if (!$this->session->userdata('mengikuti')) { ?>
  <script>
    swal({
      title: "Acara Virtual Job Fair Itenas 2021",
      text: "Apakah anda ingin mengikuti Virtual Job Fair Itenas 2021, data akun anda akan tercatat mengikuti acara ini dengan mengklik tombol dibawah?",
      icon: "info",
      buttons: true,
      dangerMode: true,
      closeOnClickOutside: false,
      closeOnEsc: false,
    }).then((mengikuti) => {
      if (mengikuti) {
        window.location = "<?php echo base_url('user/mengikuti/2') ?>";
      } else {
        window.location = "<?php echo base_url() ?>";
      }
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('insert_peserta')) { ?>
  <script>
    swal({
      title: "Terdaftar Peserta Job Fair!",
      text: "Akun anda telah terdaftar sebagai peserta Virtual Job Fair Itenas 2021",
      icon: "success",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('sudah_mengajukan', TRUE)) { ?>
  <script>
    swal({
      title: "Lamaran ditolak!",
      text: "Anda telah melakukan pengajuan pada lowongan kerja ini!",
      icon: "warning",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('lengkapi_persyaratan', TRUE)) { ?>
  <script>
    swal({
      title: "Anda belum bisa mengajukan lamaran!",
      text: "Harap menguploadkan ijazah pada profil anda",
      icon: "warning",
      timer: 5000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('insert_data', TRUE)) { ?>
  <script>
    swal({
      title: "Insert Success!",
      text: "Data anda telah berhasil masuk!",
      icon: "success",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('daftar_berhasil', TRUE)) { ?>
  <script>
    swal({
      title: "Registrasi Success!",
      text: "Data anda telah berhasil masuk! ditunggu partisipasinya",
      icon: "success",
      timer: 5000
    });
  </script>
<?php } ?>