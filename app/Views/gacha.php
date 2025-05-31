<!doctype html>
<html class="no-js" lang="id">

<!-- head -->
<?= $this->include('layouts/head'); ?>

<body>
    <?= $this->include('layouts/header'); ?>

    <div class="main-container" style="padding-top: 10px;">
        <!-- Judul dan Deskripsi -->
        <div class="title">Twist Team</div>
        <div class="subtitle">Fun & easy group division and spin the wheel!</div>

        <!-- Tombol -->
        <div>
            <button class="btn btn-custom btn-gacha">GACHA</button>
        </div>

        <!-- Input Nama -->
        <textarea class="input-area" placeholder="Masukkan satu nama per baris"></textarea>

        <!-- Flash Message -->
        <div id="flashMessage">
            <strong id="flashText"></strong><br><br>
            <button class="btn btn-sm btn-primary" onclick="keepName()">Biarkan</button>
            <button class="btn btn-sm btn-secondary" onclick="removeName()">Hapus</button>
        </div>

        <!-- Roda -->
        <div class="wheel">
            <canvas id="wheelCanvas" width="300" height="300"></canvas>
            <img src="/assets/img/pointer.png" alt="pointer" class="pointer" />
        </div>

        <!-- Suara Notifikasi -->
        <audio id="notifSound" src="assets/sounds/congrats.wav" preload="auto"></audio>
    </div>

    <!-- footer -->
    <?= $this->include('layouts/footer'); ?>

    <!-- scripts -->
    <?= $this->include('layouts/scripts'); ?>

</body>

</html>