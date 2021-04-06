<style>
    /* Style the video: 100% width and height to cover the entire window */
    #lobby {
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        overflow: auto;
    }

    /* Add some content at the bottom of the video/page */
    .content {
        position: fixed;
        right: 15px;
        bottom: 13px
    }

    /* Style the button used to pause/play the video */
    #myBtn {
        width: 200px;
        font-size: 18px;
        padding: 10px;
        border: none;
        background: #e48118;
        color: #fff;
        cursor: pointer;
    }

    #myBtn:hover {
        background: #ddd;
        color: black;
    }

    @media (max-width: 767px) {
        #myBtn {
            width: 50px;
            font-size: 10px;
            padding: 10px;
            border: none;
            background: #e48118;
            color: #fff;
            cursor: pointer;
        }
    }

    @media (max-width: 450px) {
        #myBtn {
            width: 50px;
            font-size: 8px;
            padding: 2px;
            border: none;
            background: #e48118;
            color: #fff;
            cursor: pointer;
        }
    }
</style>
<div id="lobby">
    <video autoplay muted loop>
        <source src="<?php echo base_url() ?>assets/home/jobfair/GSG_UTAMA.mp4" type="video/mp4">
    </video>
    <div class="content">
        <a href="<?php echo base_url('halaman/jobfair_home') ?>" id="myBtn"><i class="fa fa-home"></i> Masuk Halaman Job Fair</a>
        <?php if ($this->session->userdata("nama") != NULL) {
            if ($this->session->userdata('user')) { ?>
                <a href="<?php echo base_url('user') ?>" id="myBtn"><i class="fa fa-user"></i> Hallo, <?php echo $this->session->userdata("nama") ?></a>
            <?php } else if ($this->session->userdata('admin')) { ?>
                <a href="<?php echo base_url('admin') ?>" id="myBtn"><i class="fa fa-user"></i> Hallo, <?php echo $this->session->userdata("nama") ?></a>
            <?php } else if ($this->session->userdata('perusahaan')) { ?>
                <a href="<?php echo base_url('perusahaan') ?>" id="myBtn"><i class="fa fa-user"> Hallo, </i> <?php echo $this->session->userdata("nama") ?></a>
            <?php } ?>
        <?php } else { ?>
            <a href="<?php echo base_url('login') ?>" id="myBtn"><i class="fa fa-question-circle"></i> Login</a>
            <a href="<?php echo base_url('halaman/daftar_peserta') ?>" id="myBtn"><i class="fa fa-user"></i> Belum Punya Akun?</a>
        <?php } ?>
    </div>
</div>
</body>

</html>