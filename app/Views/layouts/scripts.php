<!-- spin -->
<script>
    const canvas = document.getElementById("wheelCanvas");
    const ctx = canvas.getContext("2d");
    const inputArea = document.querySelector(".input-area");
    const spinBtn = document.querySelector(".btn-spin");

    const flashMessage = document.getElementById("flashMessage");
    const flashText = document.getElementById("flashText");
    const removeBtn = document.getElementById("removeBtn");
    const keepBtn = document.getElementById("keepBtn");

    const notifSound = document.getElementById("notifSound");

    let names = [];
    let isSpinning = false;
    let lastSelectedName = "";
    let wheelRotation = 0; // dalam radian

    function drawWheel() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        const radius = canvas.width / 2;
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;

        const segmentAngle = (2 * Math.PI) / names.length;

        names.forEach((name, i) => {
            const angle = i * segmentAngle + wheelRotation;

            // Gambar sektor
            ctx.beginPath();
            ctx.moveTo(centerX, centerY);
            ctx.arc(centerX, centerY, radius, angle, angle + segmentAngle);
            ctx.closePath();

            ctx.fillStyle = `hsl(${(i * 360 / names.length)}, 70%, 60%)`;
            ctx.fill();

            // Tulis nama
            ctx.save();
            ctx.translate(centerX, centerY);
            ctx.rotate(angle + segmentAngle / 2);
            ctx.textAlign = "right";
            ctx.fillStyle = "#fff";
            ctx.font = "14px sans-serif";
            ctx.fillText(name.trim(), radius - 10, 5);
            ctx.restore();
        });

        // Penanda di atas roda
        ctx.beginPath();
        ctx.moveTo(centerX, centerY - radius - 10);
        ctx.lineTo(centerX - 10, centerY - radius - 25);
        ctx.lineTo(centerX + 10, centerY - radius - 25);
        ctx.closePath();
        ctx.fillStyle = "#FFD700";
        ctx.fill();
    }

    function updateNames() {
        names = inputArea.value.trim().split("\n").filter(n => n.trim() !== "");
        drawWheel();
    }

    function spinWheel() {
        if (isSpinning || names.length === 0) return;
        isSpinning = true;
        flashMessage.style.display = "none";

        const spinSound = document.getElementById("spinSound");
        if (spinSound) spinSound.play();

        const segmentAngle = (2 * Math.PI) / names.length;
        const randomSpin = Math.random() * 2 * Math.PI;
        const totalRotation = (2 * Math.PI * 5) + randomSpin;

        const duration = 4000;
        const startTime = performance.now();
        const startRotation = wheelRotation;

        function animate(time) {
            const elapsed = time - startTime;
            const t = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - t, 3);

            wheelRotation = startRotation + (totalRotation - startRotation) * eased;
            drawWheel();

            if (t < 1) {
                requestAnimationFrame(animate);
            } else {
                isSpinning = false;
                wheelRotation = wheelRotation % (2 * Math.PI);

                // Koreksi pointer di atas
                const adjustedAngle = (2 * Math.PI - wheelRotation + (3 * Math.PI / 2)) % (2 * Math.PI);
                const selectedIndex = Math.floor(adjustedAngle / segmentAngle) % names.length;


                lastSelectedName = names[selectedIndex];

                const notifSound = document.getElementById("notifSound");
                if (notifSound) notifSound.play();

                flashText.innerHTML = `Nama yang terpilih: <strong>${lastSelectedName}</strong>`;
                flashMessage.style.display = "block";
                flashMessage.classList.remove("flash-show");
                void flashMessage.offsetWidth;
                flashMessage.classList.add("flash-show");

                // Tambahkan efek glow
                canvas.classList.add("glow");
                setTimeout(() => canvas.classList.remove("glow"), 1000);

                // Tambahkan confetti (optional)
                if (window.confetti) {
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: {
                            y: 0.6
                        }
                    });
                }
            }
        }

        requestAnimationFrame(animate);
    }

    function removeName() {
        names = names.filter(n => n !== lastSelectedName);
        inputArea.value = names.join("\n");
        updateNames();
        flashMessage.style.display = "none";
    }

    function keepName() {
        flashMessage.style.display = "none";
    }

    inputArea.addEventListener("input", updateNames);
    spinBtn.addEventListener("click", spinWheel);
    removeBtn.addEventListener("click", removeName);
    keepBtn.addEventListener("click", keepName);

    updateNames(); // initial render
</script>


<!-- gacha -->
<script>
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function generateGroups() {
        const names = document.getElementById('nameInput').value.trim().split('\n').filter(n => n.trim() !== '');
        const groupCount = parseInt(document.getElementById('groupCount').value);
        const resultBox = document.getElementById('resultBox');

        if (names.length === 0 || isNaN(groupCount) || groupCount <= 0) {
            resultBox.innerHTML = '<span class="text-danger">Please enter valid names and number of groups.</span>';
            return;
        }

        const shuffled = shuffleArray(names);
        const groups = Array.from({
            length: groupCount
        }, () => []);

        shuffled.forEach((name, i) => {
            groups[i % groupCount].push(name);
        });

        let output = '';
        groups.forEach((group, idx) => {
            output += `<strong>Group ${idx + 1}:</strong><br>${group.join(', ')}<br><br>`;
        });

        resultBox.innerHTML = output;
    }
</script>