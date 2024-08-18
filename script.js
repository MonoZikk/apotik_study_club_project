function confirmRedirect(event) {
    event.preventDefault(); // Mencegah link langsung dibuka
    var platform = this.getAttribute('data-platform');
    var userConfirmation = confirm("Apakah Anda ingin membuka Instagram");
    
    if (userConfirmation) {
        window.location.href = this.href; // Redirect ke URL yang ditentukan jika pengguna setuju
    }
}

// Tambahkan event listener ke masing-masing tombol
document.getElementById('instagram-follow').addEventListener('click', confirmRedirect);
document.getElementById('instagram2-follow').addEventListener('click', confirmRedirect);
document.getElementById('instagram3-follow').addEventListener('click', confirmRedirect);