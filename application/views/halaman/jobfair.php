<style>
    /* Style the video: 100% width and height to cover the entire window */
    #myVideo {
        width: auto;
        height: 100%;
        right: 0;
        /* bottom: 0; */
    }

    /* Add some content at the bottom of the video/page */
    .content {
        position: fixed;
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
</style>
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
</body>

</html>