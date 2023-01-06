const input_date = document.getElementById('reservation-form-date');
input_date.addEventListener('change', updateDate);
function updateDate(e) {
  confirmdate.textContent = e.target.value;
}

const input_time = document.getElementById('reservation-form-time');
input_time.addEventListener('change', updateTime);
function updateTime(e) {
  confirmtime.textContent = e.target.value;
}

const input_number = document.getElementById('reservation-form-number');
input_number.addEventListener('change', updateNumber);
function updateNumber(e) {
  confirmnumber.textContent = e.target.value;
}


