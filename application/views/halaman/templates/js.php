<script>
  var tm = new Date("2020/12/01");
  var flipdown =  new FlipDown(tm.getTime() / 1000, "pendaftaran", {
        theme: "dark",
    }).start();
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/src/responsiveslides.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/src/bootstrap.js"></script>
<script>
  $(function() {
    $(".rslides").responsiveSlides({
      auto: true,         
      speed: 500  
    });
  });
</script>