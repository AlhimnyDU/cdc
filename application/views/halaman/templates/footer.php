</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 footer-contact">
          <h3><img src="<?php echo site_url('assets/halaman/logo.png') ?>" style="width: 200px;"></h3>
          <p>
            <b>Biro Kemahasiswaan dan Alumni (Career Development Center/CDC-Itenas)</b> <br>
            Jl. PKH. Mustopha No.23 – Bandung 40124, Indonesia <br>
            Phone : +62-22-7272215 (ext.235) <br>
            Mobile : +62-812-8515-8712 <br>
            e-Mail: cdc@itenas.ac.id or cdc.itenas@gmail.com
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url() ?>">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url('halaman/loker') ?>">Job</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url('halaman/magang') ?>">Internship</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url('halaman/info') ?>">News</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url('halaman/carrer') ?>">Career Counseling</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url('halaman/list_company') ?>">Company</a></li>
          </ul>
        </div>

        <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4></h4>
          <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>
        </div> -->

      </div>
    </div>
  </div>

  <div class="container d-lg-flex py-4">

    <div class="mr-lg-auto text-center text-lg-left">
      <div class="copyright">
        &copy; Copyright <strong><span>CDC ITENAS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
    <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
      <a href="https://www.instagram.com/cdc.itenas/?hl=en" class="instagram"><i class="bx bxl-instagram"></i></a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url() ?>assets/home/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/venobox/venobox.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/owl.carousel/owl.carousel.min.js" rel="stylesheet"></script>
<script src="<?php echo base_url() ?>assets/home/assets/js/main.js"></script>
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
  $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      loop: true,
      autoplay: true,
      smartSpeed: 500,
      items: 1,
      nav: false,
      autoplayHoverPause: false
    });
    $('.ipk').inputmask("9.99");
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
    $('#paket').hide();
    $("#jenis").change(function() {
      if ($('#jenis').val() == 'peserta') {
        $("#inlineRadio1").prop("disabled", true);
        $("#inlineRadio2").prop("disabled", true);
        $("#inlineRadio3").prop("disabled", true);
        $("#inlineRadio1").removeAttr('required');
        $('#paket').hide();
      } else if (($('#jenis').val() == 'sponsorship') || ($('#jenis').val() == 'scholarship')) {
        $("#inlineRadio1").prop("disabled", false);
        $("#inlineRadio2").prop("disabled", false);
        $("#inlineRadio3").prop("disabled", false);
        $("#inlineRadio1").prop("required", true);
        $('#paket').show();
      }
    });
    $('.dropify').dropify({
      messages: {
        'default': '',
        'replace': '',
        'remove': 'Remove',
        'error': 'Ooops, something wrong happended.'
      }
    });
    $('.ipk').inputmask("9.99");
    $('.telp').inputmask("9999999999999");

    $(".submit").click(function() {
      $(".submit").prop('disabled', true);
      $('#formKuesioner').submit();
    });

    $(".buttonSubmit").click(function() {
      $(".buttonSubmit").prop('disabled', true);
      var password = $("#password").val();
      var confirmPassword = $("#conf_password").val();
      if (password != confirmPassword) {
        $(".buttonSubmit").prop('disabled', false);
        swal("Password Tidak Cocok", "Harap isi password dengan sama", "error");
        return false;
      } else {
        $('#formulir').submit();
        return true;
      }
    });
    var tm = new Date("2021/04/05");
    var flipdown = new FlipDown(tm.getTime() / 1000, "pendaftaran", {
      theme: "dark",
    }).start();

  });
</script>
<?php if ($this->session->flashdata('lupas')) { ?>
  <script>
    swal({
      title: "Lupa Password!",
      text: "Anda telah menggunakan fitur lupa password, silahkan check email anda untuk melakukan ganti password",
      icon: "success",
      timer: 3000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('lupas_berhasil')) { ?>
  <script>
    swal({
      title: "Ganti Password!",
      text: "Akun anda telah diganti password, silahkan mencoba login",
      icon: "success",
      timer: 3000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('lupas_gagal')) { ?>
  <script>
    swal({
      title: "Ganti Password!",
      text: "Akun anda gagal mengganti password, silahkan hubungi admin",
      icon: "error",
      timer: 3000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('insert_akunP')) { ?>
  <script>
    swal({
      title: "Registration Success!",
      text: "Akun sudah tersimpan, silahkan tunggu admin mengaktifkan akun anda",
      icon: "success",
      timer: 3000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('insert_akun')) { ?>
  <script>
    swal({
      title: "Registration Success!",
      text: "Akun sudah tersimpan, silahkan login dan lengkapi data",
      icon: "success",
      timer: 3000
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
<?php if ($this->session->flashdata('nothing', TRUE)) { ?>
  <script>
    swal({
      title: "Sertifikat Tidak Ada",
      text: "anda tidak mengikuti acara/webinar/seminar",
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
<?php if ($this->session->flashdata('suksesLogin')) { ?>
  <script>
    swal({
      title: "Login Success!",
      text: "Anda berhasil login",
      icon: "success",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('gagalLogin')) { ?>
  <script>
    swal({
      title: "Login Failed!",
      text: "Email atau password salah, silahkan coba lagi",
      icon: "error",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('telah_daftar', TRUE)) { ?>
  <script>
    swal({
      title: "Registrasi ditolak!",
      text: "Anda telah melakukan pendaftaran!",
      icon: "warning",
      timer: 2000
    });
  </script>
<?php } ?>
<?php if ($this->session->flashdata('telah_mengisi', TRUE)) { ?>
  <script>
    swal({
      title: "Data ditolak!",
      text: "Anda telah mengisikan form ini, data anda telah tercatat sebelumnya!",
      icon: "warning",
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
<script>
  function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    swal({
        title: 'Apakah anda yakin ?',
        text: "Harap seluruh berkas persyaratan telah dicek kembali dan data anda akan dikirim ke perusahaan",
        icon: 'warning',
        type: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((ajukan) => {
        // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
        if (ajukan) {
          window.location = urlToRedirect;
          swal("Pengajuan Lamaran Berhasil!", {
            icon: "success",
          });
        } else {
          swal("Aju Lamaran Gagal!");
        }
      });
  }
</script>
</body>

</html>