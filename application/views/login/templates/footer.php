    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      $( document ).ready(function() {
          $('.dropify').dropify({
          messages: {
          'default': 'Drag and drop a file here or click',
          'replace': 'Drag and drop or click to replace',
          'remove':  'Remove',
          'error':   'Ooops, something wrong happended.'
          }
          });
      });
    </script>
    <?php if($this->session->flashdata('insert_akun')){?>
      <script>
        swal({
          title: "Registration Success!",
          text: "Akun sudah tersimpan, silahkan login",
          icon: "success",
          timer: 2000
        });
      </script>
    <?php } ?>
    <?php if($this->session->flashdata('perusahaan_ada')){?>
      <script>
        swal({
          title: "Registration Failed!",
          text: "Nama Akun / Perusahaan sudah terdaftar!",
          icon: "error",
          timer: 2000
        });
      </script>
    <?php } ?>
</html>