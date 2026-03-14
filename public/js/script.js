// * <=======================>
// *  Define Class & Function
// * <=======================>

class FloatingMenu {
    constructor(config) {
        this.buttons = document.querySelectorAll(config.buttonSelector);
        this.menu = document.querySelector(config.menuSelector);

        this.detailLink = this.menu?.querySelector(config.detailSelector);
        this.editLink = this.menu?.querySelector(config.editSelector);
        this.deleteForm = this.menu?.querySelector(config.deleteFormSelector);
        this.deleteBtn = this.menu?.querySelector(config.deleteBtnSelector);

        this.routes = config.routes;

        this.activeBtn = null;

        this.init();
    }

    init() {
        this.buttons.forEach(btn => {
            btn.addEventListener('click', (e) => this.handleClick(e, btn));
        });

        document.addEventListener('click', () => this.closeMenu());
        this.menu.addEventListener('click', e => e.stopPropagation());

        window.addEventListener('scroll', () => {
            if (this.activeBtn) this.updateMenuPosition(this.activeBtn);
        });

        window.addEventListener('resize', () => {
            if (this.activeBtn) this.updateMenuPosition(this.activeBtn);
        });
    }

    handleClick(e, btn) {
        e.stopPropagation();

        const data = btn.dataset;

        // set link dinamis
        if (this.detailLink) this.detailLink.href = this.routes.detail(data.id);
        if (this.editLink) this.editLink.href = this.routes.edit(data.id);
        if (this.deleteForm) this.deleteForm.action = this.routes.delete(data.id);
        if (this.deleteBtn) this.deleteBtn.onclick = () =>
            confirm(`Apakah anda yakin menghapus ${data.name}?`);

        this.activeBtn = btn;
        this.updateMenuPosition(btn);
        this.openMenu();
    }

    updateMenuPosition(btn) {
        const rect = btn.getBoundingClientRect();

        if (rect.bottom < 0 || rect.top > window.innerHeight) {
            this.closeMenu();
            return;
        }

        this.menu.style.top = rect.bottom + "px";
        this.menu.style.left = rect.left + "px";
    }

    openMenu() {
        this.menu.classList.remove('invisible', 'opacity-0', 'scale-95');
        this.menu.classList.add('opacity-100', 'scale-100');
    }

    closeMenu() {
        this.menu.classList.add('invisible', 'opacity-0', 'scale-95');
        this.menu.classList.remove('opacity-100', 'scale-100');
        this.activeBtn = null;
    }
}

// * <==========================>
// *  Activate Nav Functionality
// * <==========================>

const currentPath = window.location.pathname.replace(/\/$/, "");

document.querySelectorAll('#navbar a.nav-item').forEach(link => {
    const linkPath = new URL(link.href).pathname.replace(/\/$/, "");

    if (linkPath === currentPath) {
        link.classList.add('active');
    }
})

// * <====================>
// *  Navbar Functionality
// * <====================>

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

const sidebarState = localStorage.getItem("sidebar");

function openSidebar() {
    localStorage.setItem("sidebar", "expand");
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
}

function closeSidebar() {
    localStorage.setItem("sidebar", "collapsed");
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

if (sidebarState === "expand") {
    openSidebar();
} else if (sidebarState === "collapsed") {
    closeSidebar();
}

navSidebarCollapseBtn.addEventListener('click', () => {
    navbar.classList.toggle('expand');
    if (navbar.classList.contains('expand')) {
        openSidebar();
    } else {
        closeSidebar();
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

// * <====================>
// *  Data Option Functionality
// * <====================>

const currentUrl = window.location.pathname;

if (currentUrl === '/students') {
    const studentMenu = new FloatingMenu({
        buttonSelector: '.data-option-btn',
        menuSelector: '#floating-menu',

        detailSelector: '#menu-detail',
        editSelector: '#menu-edit',
        deleteFormSelector: '#menu-delete-form',
        deleteBtnSelector: '#menu-delete-btn',

        routes: {
            detail: (id) => `/students/detail/${id}`,
            edit: (id) => `/students/edit/${id}`,
            delete: (id) => `/students/delete/${id}`,
        }
    });
} else if (currentUrl === '/teachers') {
    const teacherMenu = new FloatingMenu({
        buttonSelector: '.data-option-btn',
        menuSelector: '#floating-menu',

        detailSelector: '#menu-detail',
        editSelector: '#menu-edit',
        deleteFormSelector: '#menu-delete-form',
        deleteBtnSelector: '#menu-delete-btn',

        routes: {
            detail: (id) => `/teachers/detail/${id}`,
            edit: (id) => `/teachers/edit/${id}`,
            delete: (id) => `/teachers/delete/${id}`,
        }
    })
} else if (currentUrl === '/violations') {
    const violationMenu = new FloatingMenu({
        buttonSelector: '.data-option-btn',
        menuSelector: '#floating-menu',

        detailSelector: '#menu-detail',
        editSelector: '#menu-edit',
        deleteFormSelector: '#menu-delete-form',
        deleteBtnSelector: '#menu-delete-btn',

        routes: {
            detail: (id) => `/violations/detail/${id}`,
            edit: (id) => `/violations/edit/${id}`,
            delete: (id) => `/violations/delete/${id}`,
        }
    })
} else if (currentUrl === '/violation-types') {
    const violationTypesMenu = new FloatingMenu({
        buttonSelector: '.data-option-btn',
        menuSelector: '#floating-menu',

        detailSelector: '#menu-detail',
        editSelector: '#menu-edit',
        deleteFormSelector: '#menu-delete-form',
        deleteBtnSelector: '#menu-delete-btn',

        routes: {
            detail: (id) => `/violation-types/detail/${id}`,
            edit: (id) => `/violation-types/edit/${id}`,
            delete: (id) => `/violation-types/delete/${id}`,
        }
    })
} else if (currentUrl === '/guardians') {
    const guardiansMenu = new FloatingMenu({
        buttonSelector: '.data-option-btn',
        menuSelector: '#floating-menu',

        detailSelector: '#menu-detail',
        editSelector: '#menu-edit',
        deleteFormSelector: '#menu-delete-form',
        deleteBtnSelector: '#menu-delete-btn',

        routes: {
            detail: (id) => `/guardians/detail/${id}`,
            edit: (id) => `/guardians/edit/${id}`,
            delete: (id) => `/guardians/delete/${id}`,
        }
    })
}

// * <===================>
// *  Flash Functionality
// * <===================>

const flashes = document.querySelectorAll('.flash');

flashes.forEach((flash, i) => {
    const closeBtn = flash.querySelector('.close-flash-btn');

    setTimeout(() => flash.remove(), 5000);

    closeBtn.addEventListener('click', () => {
        flash.remove();
    });
})

// * <======================>
// *  Whatever Functionality
// * <======================>

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

// * <Connect Guardian Functionality>

const createConnectionBtn = document.getElementById('createConnectionBtn');
const createGuardianDataBtn = document.getElementById('createGuardianDataBtn');
const createConnection = document.getElementById('createConnection');
const createGuardianData = document.getElementById('createGuardianData');

createConnectionBtn?.addEventListener('click', () => {
    console.log('Create Connection');
    createConnection.classList.remove('hidden');
    createGuardianData.classList.add('hidden');
})

createGuardianDataBtn?.addEventListener('click', () => {
    console.log('Create Guardian Data');
    createConnection.classList.add('hidden');
    createGuardianData.classList.remove('hidden');
})