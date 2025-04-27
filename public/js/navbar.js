document.addEventListener('DOMContentLoaded', function() {
    // Elemen-elemen menu mobile
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenuClose = document.getElementById('mobileMenuClose');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    
    // Toggle menu mobile saat tombol diklik
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.add('active');
        mobileMenuOverlay.classList.add('active');
    });
    
    // Tutup menu mobile saat tombol tutup diklik
    mobileMenuClose.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
    });
    
    // Tutup menu mobile saat overlay diklik
    mobileMenuOverlay.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
    });
    
    // Fungsi untuk menangani perubahan status login
    function updateLoginStatus(isLoggedIn, userName) {
        const loggedOutDropdown = document.querySelector('.dropdown:not(#loggedInDropdown)');
        const loggedInDropdown = document.getElementById('loggedInDropdown');
        
        if (isLoggedIn) {
            loggedOutDropdown.classList.add('hidden');
            loggedInDropdown.classList.remove('hidden');
            
            // Update nama pengguna jika disediakan
            if (userName) {
                const userNameElement = loggedInDropdown.querySelector('button');
                userNameElement.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    ${userName}
                `;
            }
        } else {
            loggedOutDropdown.classList.remove('hidden');
            loggedInDropdown.classList.add('hidden');
        }
    }
    
    // Contoh penggunaan: updateLoginStatus(true, 'John Doe');
}); 