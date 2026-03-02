// *
// * Navbar Functionality
// *

const navMobileBtn = document.getElementById('mobile-sidebar-btn');
const navSidebarCollapseBtn = document.getElementById('sidebar-collapse-btn');
const navItems = document.querySelectorAll('.nav-item span');
const navbar = document.getElementById('navbar');
const navDividers = document.querySelectorAll('.nav-divider');
const navDividerTitles = document.querySelectorAll('.nav-divider-title');
const body = document.getElementById('body');
const aside = document.getElementById('aside');
const main = document.getElementById('main');
const header = document.getElementById('header');
const logo = document.querySelector('.logo span');
const logoContainer = document.getElementById('logo-container');
const navSidebarCollapseIcon = document.getElementById('sidebar-collapse-icon');
const navSidebarCollapseArrowIcon = document.getElementById('sidebar-collapse-arrow-icon');

navSidebarCollapseBtn.addEventListener('click', () => {
    navbar.classList.toggle('expand');
    if (navbar.classList.contains('expand')) {
        console.log('show sidebar');
        navItems.forEach(navItem => {
            navItem.classList.remove('hidden');
        })
        main.classList.add('lg:grid-cols-[16rem_1fr]');
        main.classList.remove('lg:grid-cols-[5rem_minmax(0,1fr)]');
        navSidebarCollapseIcon.classList.remove('hidden');
        navSidebarCollapseArrowIcon.classList.add('hidden');
        navSidebarCollapseBtn.classList.add('right-3');
        navSidebarCollapseBtn.classList.remove('-right-2.5');
        navDividerTitles.forEach(navDividerTitle => navDividerTitle.classList.remove('hidden'));
        navDividers.forEach(navDivider => navDivider.classList.add('hidden'));
    } else {
        console.log('hide sidebar');
        navItems.forEach(navItem => {
            navItem.classList.add('hidden');
        })
        main.classList.remove('lg:grid-cols-[16rem_1fr]');
        main.classList.add('lg:grid-cols-[5rem_minmax(0,1fr)]');
        navSidebarCollapseIcon.classList.add('hidden');
        navSidebarCollapseArrowIcon.classList.remove('hidden');
        navSidebarCollapseBtn.classList.remove('right-3');
        navSidebarCollapseBtn.classList.add('-right-2.5');
        navDividerTitles.forEach(navDividerTitle => navDividerTitle.classList.add('hidden'));
        navDividers.forEach(navDivider => navDivider.classList.remove('hidden'));
    }
});

navMobileBtn.addEventListener('click', () => {
    navbar.classList.toggle('active');

    if (navbar.classList.contains('active')) {
        navbar.classList.remove('-translate-x-full');
        body.classList.add('overflow-hidden');
    } else {
        navbar.classList.add('-translate-x-full');
        body.classList.remove('overflow-hidden');
    }
});

// *
// * Data Option
// *

// const dataOptionGroups = document.querySelectorAll('.data-option-group');
// const dataOptionBtns = document.querySelectorAll('.data-option-btn');
// const dataOptions = document.querySelectorAll('.data-option');

// // fungsi untuk menutup semua menu
// function closeAllOptions() {
//     dataOptions.forEach(opt => {
//         opt.classList.remove('active', 'opacity-100', 'scale-100', 'visible');
//     });

//     dataOptionBtns.forEach(btn => {
//         btn.classList.remove('inset-shadow-sm');
//     });
// }

// // klik tombol
// dataOptionBtns.forEach((btn, i) => {
//     btn.addEventListener('click', (e) => {
//         e.stopPropagation(); // ⛔ cegah document click

//         const isActive = dataOptions[i].classList.contains('active');

//         closeAllOptions();

//         if (!isActive) {
//             btn.classList.add('inset-shadow-sm');
//             dataOptions[i].classList.add('active', 'opacity-100', 'scale-100', 'visible');
//         }
//     });
// });

// // cegah klik di dalam menu ikut menutup
// dataOptions.forEach(opt => {
//     opt.addEventListener('click', (e) => {
//         e.stopPropagation();
//     });
// });

// // klik di luar -> tutup semua
// document.addEventListener('click', () => {
//     closeAllOptions();
// });

const buttons = document.querySelectorAll('.data-option-btn');
const menu = document.getElementById('floating-menu');

const detailLink = document.getElementById('menu-detail');
const editLink = document.getElementById('menu-edit');
const deleteForm = document.getElementById('menu-delete-form');
const deleteBtn = document.getElementById('menu-delete-btn');

let activeBtn = null;

buttons.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.stopPropagation();

        const nis = btn.dataset.nis;
        const name = btn.dataset.name;

        // set link
        detailLink.href = `/students/detail/${nis}`;
        editLink.href = `/students/edit/${nis}`;
        deleteForm.action = `/students/delete/${nis}`;
        deleteBtn.onclick = () => confirm(`Apakah anda yakin untuk menghapus ${name}?`);

        activeBtn = btn;

        updateMenuPosition(btn);
        openMenu();
    });
});

function updateMenuPosition(btn) {
    const rect = btn.getBoundingClientRect();

    if (rect.bottom < 0 || rect.top > window.innerHeight) {
        closeMenu();
        return;
    }

    menu.style.top = rect.bottom + "px";
    menu.style.left = rect.left + "px";
}

function openMenu() {
    menu.classList.remove('invisible', 'opacity-0', 'scale-95');
    menu.classList.add('opacity-100', 'scale-100');
}

function closeMenu() {
    menu.classList.add('invisible', 'opacity-0', 'scale-95');
    menu.classList.remove('opacity-100', 'scale-100');
    activeBtn = null;
}

// klik luar = tutup
document.addEventListener('click', closeMenu);
menu.addEventListener('click', e => e.stopPropagation());


// ✅ INI KUNCI UTAMANYA
window.addEventListener('scroll', () => {
    if (activeBtn) {
        updateMenuPosition(activeBtn);
    }
});

window.addEventListener('resize', () => {
    if (activeBtn) {
        updateMenuPosition(activeBtn);
    }
});

// *
// * Flash Functionality
// *

const flashes = document.querySelectorAll('.flash');

flashes.forEach((flash, i) => {
    const closeBtn = flash.querySelector('.close-flash-btn');

    closeBtn.addEventListener('click', () => {
        flash.remove();
    });
})

// *
// * Whatever
// *

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