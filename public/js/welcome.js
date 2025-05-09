document.addEventListener('DOMContentLoaded', function() {
    const startButton = document.getElementById('startButton');
    const transitionOverlay = document.getElementById('transitionOverlay');
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenuClose = document.getElementById('mobileMenuClose');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    
    // Mobile Menu Toggle
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.add('active');
        mobileMenuOverlay.classList.add('active');
    });
    
    mobileMenuClose.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
    });
    
    mobileMenuOverlay.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
    });
    
    // Fungsi untuk animasi penghitungan
    function animateValue(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            
            if (element.id === 'ratingValue') {
                // Khusus untuk rating, gunakan nilai desimal
                const value = (progress * (end - start) + start).toFixed(1);
                element.textContent = value + ' / 5';
            } else {
                // Untuk statistik lainnya, gunakan nilai bulat
                const value = Math.floor(progress * (end - start) + start);
                element.textContent = value + '+';
            }
            
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }
    
    // Mulai animasi penghitungan
    setTimeout(() => {
        animateValue(document.getElementById('orderCount'), 0, 100, 2000);
        animateValue(document.getElementById('regionCount'), 0, 96, 2000);
        animateValue(document.getElementById('ratingValue'), 0.1, 4.8, 2000);
    }, 500);
    
    startButton.addEventListener('click', function() {
        // Tampilkan overlay transisi
        transitionOverlay.style.display = 'flex';
        
        // Tambahkan class active setelah sedikit delay untuk memicu animasi
        setTimeout(function() {
            transitionOverlay.classList.add('active');
        }, 50);
        
        // Tunggu animasi selesai, lalu arahkan ke halaman home
        setTimeout(function() {
            window.location.href = '/';
        }, 2500);
    });
}); 