const deadline = new Date("2025-04-10T23:59:59").getTime();
const startTime = new Date("2025-04-05T00:00:00").getTime();

const submitBtn = document.getElementById('submitBtn');
const uploadForm = document.getElementById('uploadForm');
const message = document.getElementById('message');
const timer = document.getElementById('timer');

function updateTimer() {
    const now = new Date().getTime();
    
    if (now < startTime) {
        submitBtn.disabled = true;
        timer.textContent = "Upload will start soon...";
        return;
    }

    const timeLeft = deadline - now;
    if (timeLeft <= 0) {
        submitBtn.disabled = true;
        timer.textContent = "Submission period has ended.";
        return;
    }

    submitBtn.disabled = false;
    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
    timer.textContent = `Time Left: ${days}d ${hours}h ${minutes}m ${seconds}s`;
}

setInterval(updateTimer, 1000);

uploadForm.addEventListener('submit', function(e) {
    submitBtn.disabled = true;
    message.textContent = 'Uploading...';
});
