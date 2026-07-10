document.addEventListener('DOMContentLoaded', () => {
    // Reveal on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // Counter animation
    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');
                const duration = 2000;
                let start = 0;
                const increment = target / (duration / 16);
                const updateCounter = () => {
                    start += increment;
                    if (start < target) {
                        counter.textContent = Math.floor(start);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };
                updateCounter();
                counterObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(c => counterObserver.observe(c));

    // Typing effect
    const typingElement = document.getElementById('typing-text');
    if (typingElement) {
        const words = ['Website', 'Source Code', 'Template', 'Script'];
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        function type() {
            const currentWord = words[wordIndex];
            if (!isDeleting) {
                typingElement.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
                if (charIndex === currentWord.length) {
                    isDeleting = true;
                    setTimeout(type, 1500);
                } else {
                    setTimeout(type, 100);
                }
            } else {
                typingElement.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
                if (charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % words.length;
                    setTimeout(type, 500);
                } else {
                    setTimeout(type, 50);
                }
            }
        }
        type();
    }

    // FAQ Accordion
    document.querySelectorAll('.faq-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            btn.classList.toggle('active');
            btn.nextElementSibling.classList.toggle('hidden');
        });
    });

    // Live search
    const landingSearch = document.getElementById('landingSearch');
    const landingResults = document.getElementById('landingSearchResults');
    if (landingSearch) {
        landingSearch.addEventListener('input', function() {
            const q = this.value.trim();
            if (q.length < 2) {
                landingResults.innerHTML = '';
                landingResults.classList.add('hidden');
                return;
            }
            fetch(BASE_URL + '/product/search?q=' + encodeURIComponent(q))
                .then(res => res.json())
                .then(data => {
                    landingResults.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.className = 'p-3 hover:bg-indigo-50 cursor-pointer border-b border-gray-100 transition flex justify-between items-center';
                            div.innerHTML = `<a href="${BASE_URL}/product/detail/${item.id}" class="flex-1 font-medium text-gray-700">${item.title} <span class="text-indigo-600 font-semibold float-right">Rp ${item.price_regular}</span></a>`;
                            landingResults.appendChild(div);
                        });
                        landingResults.classList.remove('hidden');
                    } else {
                        landingResults.innerHTML = '<p class="p-3 text-gray-500 text-sm">Produk tidak ditemukan</p>';
                        landingResults.classList.remove('hidden');
                    }
                });
        });
        document.addEventListener('click', (e) => {
            if (!landingSearch.contains(e.target) && !landingResults.contains(e.target)) {
                landingResults.classList.add('hidden');
            }
        });
    }
});

// Global wishlist function
function toggleWishlist(productId) {
    fetch(BASE_URL + '/user/toggleWishlist', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'product_id=' + productId
    }).then(res => res.json());
}