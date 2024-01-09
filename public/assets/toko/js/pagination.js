const products = document.querySelectorAll('.products .product');
const itemsPerPage = 4; // Jumlah produk per halaman
let currentPage = 1; // Halaman saat ini, diinisialisasi dengan halaman pertama

function showPage(page) {
    const start = (page - 1) * itemsPerPage;
    const end = page * itemsPerPage;

    products.forEach((product, index) => {
        if (index >= start && index < end) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}

function changePage(page) {
    currentPage = page;
    showPage(currentPage);
}

// Menampilkan halaman pertama saat halaman dimuat
showPage(currentPage);
