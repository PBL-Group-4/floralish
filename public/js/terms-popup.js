document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk membuka popup
    window.openTermsPopup = function() {
        const popup = document.getElementById('termsPopup');
        const overlay = document.getElementById('termsOverlay');
        const popupContent = document.querySelector('#termsPopup .bg-white');
        
        // Tampilkan overlay dan popup
        overlay.classList.remove('hidden');
        popup.classList.remove('hidden');
        
        // Tambahkan animasi
        setTimeout(() => {
            overlay.classList.add('opacity-100');
            popupContent.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        // Mencegah scrolling pada body
        document.body.style.overflow = 'hidden';
    };
    
    // Fungsi untuk menutup popup
    window.closeTermsPopup = function() {
        const popup = document.getElementById('termsPopup');
        const overlay = document.getElementById('termsOverlay');
        const popupContent = document.querySelector('#termsPopup .bg-white');
        
        // Hapus animasi
        popupContent.classList.remove('scale-100', 'opacity-100');
        overlay.classList.remove('opacity-100');
        
        // Tunggu animasi selesai, lalu sembunyikan
        setTimeout(() => {
            popup.classList.add('hidden');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    };
    
    // Event listener untuk tombol close
    const closeButton = document.getElementById('closeTermsPopup');
    if (closeButton) {
        closeButton.addEventListener('click', closeTermsPopup);
    }
    
    // Event listener untuk overlay (klik di luar popup)
    const overlay = document.getElementById('termsOverlay');
    if (overlay) {
        overlay.addEventListener('click', closeTermsPopup);
    }
    
    // Event listener untuk tombol ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeTermsPopup();
        }
    });
}); 