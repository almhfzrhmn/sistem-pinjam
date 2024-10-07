// Logic pengisian input peminjaman alat olahraga secara otomatis
function setReturnDate() {
  let borrowDate = new Date(); // Ambil waktu saat ini
  let returnDate = new Date(borrowDate);
  returnDate.setHours(returnDate.getHours() + 2); // Menambahkan 2 jam

  // Format tanggal pengembalian ke format yyyy-mm-dd
  let formattedDate = returnDate.toISOString().split('T')[0];
  
  document.getElementById("tgl_pengembalian").value = formattedDate;
}

// Logic pengisian input denda dan keterlambatan pengembalian alat olahraga secara otomatis
function hitungDenda() {
  const tglPengembalian = new Date(document.getElementById('tgl_pengembalian').value);
  const alatKembali = new Date(document.getElementById('alat_kembali').value);
  const keterlambatan = document.getElementById('keterlambatan');
  const denda = document.getElementById('denda');
  
  if (alatKembali > tglPengembalian) {
      keterlambatan.value = 'Ya';
      // Hitung denda, misalnya denda per jam adalah Rp 5000
      let diffInHours = Math.floor((alatKembali - tglPengembalian) / (1000 * 3600));
      denda.value = diffInHours * 5000;
  } else {
      keterlambatan.value = 'Tidak';
      denda.value = 0;
  }
}

// Panggil fungsi setReturnDate() saat halaman dimuat
window.onload = function() {
  setReturnDate(); // Panggil fungsi setReturnDate untuk mengatur tanggal pengembalian
  hitungDenda();
}
