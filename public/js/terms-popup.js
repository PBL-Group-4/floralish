// Debug flag
const DEBUG = true;

function debug(message, ...args) {
    if (DEBUG) {
        console.log(`[Terms Popup] ${message}`, ...args);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('Initializing terms popup');
    
    // Dapatkan elemen-elemen yang diperlukan
    const popup = document.getElementById('termsPopup');
    const overlay = document.getElementById('termsOverlay');
    const closeButton = document.getElementById('closeTermsPopup');
    const termsLink = document.querySelector('a[onclick="openTermsPopup()"]');

    console.log('Popup element:', popup);
    console.log('Overlay element:', overlay);

    if (!popup || !overlay) {
        console.error('Required elements not found!');
        return;
    }

    // Fungsi untuk membuka popup
    window.openTermsPopup = function() {
        console.log('Opening popup');
        popup.style.display = 'block';
        document.body.style.overflow = 'hidden';
    };

    // Fungsi untuk menutup popup
    window.closeTermsPopup = function() {
        console.log('Closing popup');
        popup.style.display = 'none';
        document.body.style.overflow = '';
    };

    // Event listener untuk tombol close
    if (closeButton) {
        closeButton.addEventListener('click', function(e) {
            e.preventDefault();
            closeTermsPopup();
        });
    }

    // Event listener untuk klik di luar popup
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            console.log('Overlay clicked - closing popup');
            closeTermsPopup();
        }
    });

    // Event listener untuk tombol Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && popup.style.display === 'block') {
            console.log('Escape key pressed - closing popup');
            closeTermsPopup();
        }
    });

    // Event listener untuk link syarat dan ketentuan
    if (termsLink) {
        termsLink.addEventListener('click', function(e) {
            e.preventDefault();
            openTermsPopup();
        });
    }

    console.log('Terms popup initialized');
}); 