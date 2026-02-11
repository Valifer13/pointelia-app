const navMobileBtn = document.getElementById('nav-mobile-btn');
const navMobileBtnChilds = navMobileBtn.children;

navMobileBtn.addEventListener('click', () => {
    navMobileBtn.classList.toggle('active');

    if (navMobileBtn.classList.contains('active')) {
        navMobileBtnChilds[0].classList.add('rotate-45', 'translate-y-1.5');
        navMobileBtnChilds[1].classList.add('-rotate-45', '-translate-y-1');
    } else {
        navMobileBtnChilds[0].classList.remove('rotate-45', 'translate-y-1.5');
        navMobileBtnChilds[1].classList.remove('-rotate-45', '-translate-y-1');
    }
})

const searchInput = document.getElementById('searchInput');
const clearBtn = document.getElementById('clearBtn');

searchInput?.addEventListener("input", () => {
    if (searchInput.value.trim() !== "") {
        clearBtn.classList.remove("hidden");
    } else {
        clearBtn.classList.add("hidden");
    }
})

clearBtn?.addEventListener('click', () => {
    searchInput.value = "";
    clearBtn.classList.add('hidden');
    searchInput.focus();
})