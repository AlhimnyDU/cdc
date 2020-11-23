<!DOCTYPE html>
<html>

<head>
    <title>Video Pengenalan Perusahaan</title>
</head>

<body style="background-color:#e07b39;">
    <div class="container">
        <div style="position:relative;  width:1500px;height:850px;background-image: url(<?php echo base_url('assets/halaman/jobfair/bg.png') ?>);background-repeat: no-repeat;background-size: cover;">
            <?php echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe style=\"position: absolute; margin: 155px 210px;\" width=\"1080px\" height=\"500px\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $video->link); ?>
            <a style="font-family: Franklin Gothic;font-size:24px;position: absolute; margin-top: 730px; margin-left:1290px;" href="<?php echo site_url('halaman/company/' . $id_perusahaan) ?>">Apply Job Here</a>
        </div>
    </div>
</body>

</html>