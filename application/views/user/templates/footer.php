        <!-- footer content -->
        <footer>
          <div class="pull-right">
            CDC Itenas
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/Flot/jquery.flot.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/Flot/jquery.flot.time.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Datatables -->
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/jszip/dist/jszip.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendors/pdfmake/build/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url() ?>assets/admin/build/js/custom.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
        <script>
          $(document).ready(function() {
            $('.datatable').DataTable();
            $('.datatable2').DataTable({
              "lengthChange": false,
              "searching": false,
              "paging": false,
              "info": false
            });
            <?php
            $daftar = date('Y-m-d', strtotime($akun->created));
            $batas = date('Y-m-d', strtotime("2020-12-03"));
            if ((empty($mengikuti)) && ($daftar <=  $batas)) { ?>
              $('#jobModal').modal({
                backdrop: 'static',
                keyboard: false
              });
              $("#jobModal").modal('show');
            <?php } ?>
          });
        </script>
        <script>
          CKEDITOR.replaceClass = 'editor';
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
            $('.ipk').inputmask("9.99");
          });
        </script>
        <?php if ($this->session->flashdata('insert_akun', TRUE)) { ?>
          <script>
            swal({
              title: "Registration Success!",
              text: "You clicked the button!",
              icon: "success",
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
        <?php if ($this->session->flashdata('update_data', TRUE)) { ?>
          <script>
            swal({
              title: "Update Success!",
              text: "Data anda telah berhasil update!",
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
        <script type="text/javascript">
          $('.beforeDelete').on('click', function(e) {
            e.preventDefault(); // prevent form submit
            var urlToRedirect = e.currentTarget.getAttribute('href');
            swal({
              title: 'Apakah anda yakin ?',
              text: "Data Akan dihapus",
              icon: 'warning',
              type: 'warning',
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
              if (willDelete) {
                window.location.href = urlToRedirect;
              }
            })
          })
        </script>
        <script type="text/javascript">
          $('.beforeAjukan').on('click', function(e) {
            e.preventDefault(); // prevent form submit
            var urlToRedirect = e.currentTarget.getAttribute('href');
            swal({
              title: 'Apakah anda yakin akan melamar pada lowongan kerja ini ?',
              text: "Data anda akan diajukan ke perusahaan",
              icon: 'warning',
              type: 'warning',
              buttons: true,
              dangerMode: true,
            }).then((result) => {
              if (result) {
                window.location.href = urlToRedirect;
              }
            })
          })
        </script>
        <script type="text/javascript">
          $('.beforeTolak').on('click', function(e) {
            e.preventDefault(); // prevent form submit
            var urlToRedirect = e.currentTarget.getAttribute('href');
            swal({
              title: 'Menolak lamaran',
              text: "Jika lamaran ditolak, maka anda tidak dapat mengajukan kembali lamaran kerja ini. Apakah anda sudah yakin?",
              icon: 'warning',
              type: 'warning',
              buttons: true,
              dangerMode: true,
            }).then((result) => {
              if (result) {
                window.location.href = urlToRedirect;
              }
            })
          })
        </script>
        <script type="text/javascript">
          $('.beforeTerima').on('click', function(e) {
            e.preventDefault(); // prevent form submit
            var urlToRedirect = e.currentTarget.getAttribute('href');
            swal({
              title: 'Menerima lamaran',
              text: "Anda akan menjadi penerima lowongan kerja pada perusahaan ini harus menyetujui ketentuan dari perusahaan ini, apakah anda sudah yakin?",
              icon: 'warning',
              type: 'warning',
              buttons: true,
              dangerMode: true,
            }).then((result) => {
              if (result) {
                window.location.href = urlToRedirect;
              }
            })
          })
        </script>
        </body>

        </html>