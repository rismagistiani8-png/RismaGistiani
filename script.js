/* --- JAVASCRIPT EXTERNAL ---
  Sesuai materi: Interaksi & Logika
*/

// 1. VARIABEL & TIPE DATA
let namaWeb = "Praktikum Web Dasar"; // String (let: bisa berubah)
const tahun = 2024;                // Number (const: tetap)
let isMateriLengkap = true;        // Boolean

// Tipe Kompleks (Object)
let instruktur = {
    nama: "Admin Informatika",
    bidang: "Web Development"
};

// Tipe Kompleks (Array)
let daftarMateri = ["HTML", "CSS", "JavaScript"];

// Output Dasar untuk Debugging
console.log("Nama Web: " + namaWeb);
console.log("Daftar Materi: ", daftarMateri);


// 2. FUNGSI & LOGIKA
// Fungsi Biasa dengan Parameter dan Return
function sapaPengunjung(nama) {
    return "Selamat datang di " + namaWeb + ", " + nama + "!";
}

// Arrow Function (Modern) untuk menghitung angka
const tambahMateri = (jumlah) => {
    return "Total materi sekarang: " + (daftarMateri.length + jumlah);
};

// Menampilkan hasil fungsi ke console
console.log(sapaPengunjung("Mahasiswa"));


// 3. PERULANGAN (LOOP)
// Mencetak daftar materi ke console secara otomatis
console.log("Urutan Belajar:");
for (let i = 0; i < daftarMateri.length; i++) {
    console.log((i + 1) + ". " + daftarMateri[i]);
}


// 4. DOM (Document Object Model) & INTERAKSI
// Mengambil elemen menggunakan querySelector
const form = document.querySelector("#formPendaftaran");
const inputNama = document.querySelector("#nama");
const footerPara = document.querySelector(".main-footer p");

// Mengubah isi teks via JS (Manipulasi DOM)
footerPara.innerHTML = "&copy; " + tahun + " Teknik Informatika UMMI - Updated by JS";

// Validasi Form sebelum dikirim (Percabangan If...Else)
form.addEventListener("submit", (event) => {
    // Mengambil nilai dari input
    let namaUser = inputNama.value;
    
    if (namaUser.length < 3) {
        alert("Peringatan: Nama terlalu pendek!");
        event.preventDefault(); // Mencegah form dikirim jika tidak valid
    } else {
        alert("Terima kasih " + namaUser + ", data kamu berhasil divalidasi!");
    }
});

// 5. CONTOH PERCABANGAN LAIN
let jam = new Date().getHours();
if (jam < 12) {
    console.log("Selamat Pagi!");
} else if (jam < 18) {
    console.log("Selamat Siang!");
} else {
    console.log("Selamat Malam!");
}