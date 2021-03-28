<style>
    /* Style the video: 100% width and height to cover the entire window */
    #myVideo {
        width: 1280px;
        height: auto;
        right: 0;
        bottom: 0;
    }

    /* Add some content at the bottom of the video/page */
    .content {
        position: fixed;
        height: 50%;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #f1f1f1;
        width: 100%;
        padding: 20px;
    }

    /* Style the button used to pause/play the video */
    #myBtn {
        width: 200px;
        font-size: 18px;
        padding: 10px;
        border: none;
        background: #000;
        color: #fff;
        cursor: pointer;
    }

    #myBtn:hover {
        background: #ddd;
        color: black;
    }

    .center {
        margin-height: 100px;
        width: 100%;
        padding: 10px;
    }

    @media (max-width: 767px) {
        #myVideo {
            display: none;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }

        .content {
            position: none;
            height: auto;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: auto;
            padding: 0px;
        }
    }
    }
</style>
<div class="center">
    <video id="myVideo" autoplay muted loop>
        <source src="<?php echo base_url() ?>assets/home/jobfair/halaman_utama.mp4" type="video/mp4">
    </video>
    <div class="content">
        <center>
            <h1>Coming Soon</h1>
            <p>Job Fair ITENAS 2021</p>
            <!-- Use a button to pause/play the video with JavaScript -->
            <button id="myBtn">Coming Soon</button>
        </center>
    </div>
</div>

</body>

</html>