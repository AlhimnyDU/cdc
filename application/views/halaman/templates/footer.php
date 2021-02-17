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
            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
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
<script src="<?php echo base_url() ?>assets/home/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url() ?>assets/halaman/flipdown/flipdown.js"></script>
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
    $('.telp').inputmask('Regex', {
      regex: "^[0-9]{1,6}(\\.\\d{1,2})?$"
    });

    // $("#form").submit(function(e) {

    //   //stop submitting the form to see the disabled button effect
    //   e.preventDefault();

    //   //disable the submit button
    //   $("#btnSubmit").attr("disabled", true);
    //   return true;

    // });
    $('#formulir').submit(function() {
      $(this).find(':input[type=submit]').prop('disabled', true);
    });
    var tm = new Date("2021/04/05");
    var flipdown = new FlipDown(tm.getTime() / 1000, "pendaftaran", {
      theme: "dark",
    }).start();
  });
</script>
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
</body>

</html>