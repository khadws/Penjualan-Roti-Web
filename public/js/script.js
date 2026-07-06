document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.querySelector("#search");
    const searchInputContainer = document.querySelector("#search-input-container");

    searchIcon.onclick = (event) => {
        event.preventDefault(); // Mencegah perilaku default anchor
        searchInputContainer.classList.toggle("active");
        searchIcon.style.display = searchInputContainer.classList.contains("active") ? 'none' : 'inline-flex'; // icon search hilang ketika aktif
        
        if (searchInputContainer.classList.contains("active")) {
            searchInput.focus(); // Fokus pada input ketika terlihat
        }
    };

    document.addEventListener("click", (event) => {
        const isClickInside = searchInputContainer.contains(event.target) || searchIcon.contains(event.target);
        if (!isClickInside) {
            searchInputContainer.classList.remove("active");
            searchIcon.style.display ='inline-block';
        }
    });
});



// // Fungsi untuk mengecek apakah section "Rekom" terlihat di viewport
// function isRekomSectionInView() {
//     const sectionPosition = rekom.getBoundingClientRect().top;
//     const screenPosition = window.innerHeight / 80;
//     const rekomSection = document.getElementById('rekom');
//     const rect = rekomSection.getBoundingClientRect();
//     return rect.top <= window.innerHeight /80;
// }

// // Fungsi untuk mengubah warna font navbar ketika di-scroll ke section rekomendasi
// function updateNavbarOnScroll() {
//     const navbar = document.getElementById('navbar');
    
//     if (isRekomSectionInView()) {
//         // Tambahkan kelas 'navbar-dark' jika section rekomendasi terlihat
//         navbar.classList.add('navbar-dark');
//     } else {
//         // Hapus kelas 'navbar-dark' jika section rekomendasi tidak terlihat
//         navbar.classList.remove('navbar-dark');
//     }
// }

// // Event listener untuk mendeteksi scroll
// document.addEventListener('scroll', updateNavbarOnScroll);

