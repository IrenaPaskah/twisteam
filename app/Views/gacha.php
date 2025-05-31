<!doctype html>
<html class="no-js" lang="id">

<!-- head -->
<?= $this->include('layouts/head'); ?>

<body>
    <?= $this->include('layouts/header'); ?>

    <div class="main-container" style="padding-top: 10px;">
        <!-- Judul dan Deskripsi -->
        <img src="/assets/img/twisteam.png" alt="TwistTeam Logo" class="logo" />
        <div class="subtitle">Fun & easy group division and spin the wheel!</div>

        <!-- Input data -->
        <textarea id="nameInput" rows="5" placeholder="enter name per line"></textarea>
        <input type="number" id="groupCount" placeholder="number of groups" />

        <!-- Tombol -->
        <div>
            <button class="btn btn-custom btn-gacha" onclick="generateGroups()">GACHA</button>
        </div>

        <!-- Hasil -->
        <div class="result-box" id="resultBox">
            <!-- Team result will appear here -->
        </div>
    </div>

    <!-- footer -->
    <?= $this->include('layouts/footer'); ?>

    <!-- scripts -->
    <?= $this->include('layouts/scripts'); ?>

</body>

</html>