// validation.js - Enhanced version
function validateRegistrationForm() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const errorMessage = document.getElementById('error-message');
    
    // Reset pesan error
    errorMessage.innerHTML = '';
    errorMessage.style.display = 'none';
    
    // Hilangkan kelas error dari semua input
    document.querySelectorAll('.input-box input').forEach(input => {
        input.parentElement.classList.remove('input-error');
    });
    
    // Validasi password (minimal 8 karakter, huruf besar, huruf kecil, dan angka)
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (!passwordRegex.test(password)) {
        const passwordInput = document.getElementById('password');
        passwordInput.parentElement.classList.add('input-error');
        
        let errorText = 'Password harus memenuhi kriteria berikut:<ul>';
        if (password.length < 8) errorText += '<li>Minimal 8 karakter</li>';
        if (!/[A-Z]/.test(password)) errorText += '<li>Mengandung minimal 1 huruf besar</li>';
        if (!/[a-z]/.test(password)) errorText += '<li>Mengandung minimal 1 huruf kecil</li>';
        if (!/\d/.test(password)) errorText += '<li>Mengandung minimal 1 angka</li>';
        errorText += '</ul>';
        
        errorMessage.innerHTML = errorText;
        errorMessage.style.display = 'block';
        return false;
    }
    
    // Validasi konfirmasi password
    if (password !== confirmPassword) {
        const confirmInput = document.getElementById('confirm_password');
        confirmInput.parentElement.classList.add('input-error');
        
        errorMessage.innerHTML = 'Konfirmasi password tidak cocok dengan password yang dimasukkan.';
        errorMessage.style.display = 'block';
        return false;
    }
    
    return true;
}

// Fungsi untuk menampilkan error dari URL parameter jika ada
function showErrorFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    const errorType = urlParams.get('type'); // Untuk detail error "exists"
    const errorMessage = document.getElementById('error-message');
    
    if (error) {
        errorMessage.style.display = 'block';
        
        switch(error) {
            case 'exists':
                if (errorType === 'username') {
                    document.getElementById('username').parentElement.classList.add('input-error');
                    errorMessage.innerHTML = 'Username sudah terdaftar. Silakan gunakan username lain.';
                } else if (errorType === 'email') {
                    document.getElementById('email').parentElement.classList.add('input-error');
                    errorMessage.innerHTML = 'Email sudah terdaftar. Silakan gunakan email lain.';
                } else {
                    errorMessage.innerHTML = 'Username atau email sudah terdaftar. Silakan gunakan yang lain.';
                }
                break;
            case 'password':
                document.getElementById('password').parentElement.classList.add('input-error');
                errorMessage.innerHTML = 'Password harus minimal 8 karakter dan mengandung huruf besar, huruf kecil, dan angka.';
                break;
            case 'mismatch':
                document.getElementById('confirm_password').parentElement.classList.add('input-error');
                errorMessage.innerHTML = 'Konfirmasi password tidak cocok.';
                break;
            case 'failed':
                errorMessage.innerHTML = 'Gagal membuat akun. Silakan coba lagi.';
                break;
            default:
                errorMessage.innerHTML = 'Terjadi kesalahan. Silakan coba lagi.';
        }
    }
}

// Jalankan saat halaman dimuat
window.onload = function() {
    showErrorFromURL();
    
    // Tambahkan event listener untuk form
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            if (!validateRegistrationForm()) {
                event.preventDefault();
            }
        });
    }
    
    // Reset error message when user starts typing in an input field
    document.querySelectorAll('.input-box input').forEach(input => {
        input.addEventListener('input', function() {
            this.parentElement.classList.remove('input-error');
            // Only hide the error message if user is fixing the specific error
            const errorParam = new URLSearchParams(window.location.search).get('error');
            if ((errorParam === 'exists' && (this.id === 'username' || this.id === 'email')) ||
                (errorParam === 'password' && this.id === 'password') ||
                (errorParam === 'mismatch' && this.id === 'confirm_password')) {
                document.getElementById('error-message').style.display = 'none';
            }
        });
    });
};