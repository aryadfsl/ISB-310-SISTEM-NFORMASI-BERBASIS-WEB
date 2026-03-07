// Fungsi Navigasi Sidebar
function showHome() {
    document.getElementById('home-row').style.display = 'flex';
    document.getElementById('menu-section').style.display = 'none';
    document.getElementById('calc-section').style.display = 'none';
}

function showMenu() {
    document.getElementById('home-row').style.display = 'none';
    document.getElementById('menu-section').style.display = 'block';
    document.getElementById('calc-section').style.display = 'none';
}

function showCalculator() {
    document.getElementById('home-row').style.display = 'none';
    document.getElementById('menu-section').style.display = 'none';
    document.getElementById('calc-section').style.display = 'flex'; // Menggunakan flex agar horizontal
}

// Logika Kalkulator
function hitungKalkulator() {
    const b1 = document.getElementById('bil1').value;
    const b2 = document.getElementById('bil2').value;
    const opr = document.getElementById('opr').value;

    if (b1 === "" || b2 === "") {
        alert("inputan pertama dan kedua harus lebih dari 0");
        return;
    }

    const n1 = parseFloat(b1);
    const n2 = parseFloat(b2);
    let hasil = 0;

    switch (opr) {
        case '+': hasil = n1 + n2; break;
        case '-': hasil = n1 - n2; break;
        case '*': hasil = n1 * n2; break;
        case '/': hasil = n2 !== 0 ? n1 / n2 : "Inf"; break;
    }

    document.getElementById('hasil').value = hasil;
}

function resetKalkulator() {
    document.getElementById('bil1').value = "";
    document.getElementById('bil2').value = "";
    document.getElementById('hasil').value = "";
}

// Logika Menu Makanan Otomatis
function hitungMenu() {
    const q1 = parseInt(document.getElementById('qty1').value) || 0;
    const q2 = parseInt(document.getElementById('qty2').value) || 0;
    const q3 = parseInt(document.getElementById('qty3').value) || 0;
    
    const total = (q1 * 12000) + (q2 * 10000) + (q3 * 15000);
    let diskon = total > 50000 ? total * 0.1 : 0;
    
    document.getElementById('total').value = total;
    document.getElementById('diskon').value = diskon;
    document.getElementById('bayar').value = total - diskon;
}

// Jalankan listener input saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    ['qty1', 'qty2', 'qty3'].forEach(id => {
        const el = document.getElementById(id);
        if(el) el.addEventListener('input', hitungMenu);
    });
});

function resetMenu() {
    ['qty1', 'qty2', 'qty3', 'total', 'diskon', 'bayar'].forEach(id => {
        document.getElementById(id).value = (id.includes('qty') || id === 'total' || id === 'diskon' || id === 'bayar') ? 0 : "";
    });
}

function showMenuAfterAlert() {
    alert("hai,selamat datang di sistem sederhana");
    alert("Input Jumlah Pesanan agar di hitung otomatis oleh sistem");
    showMenu();
}
