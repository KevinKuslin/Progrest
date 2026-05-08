document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('mobile-menu-btn');
    const dropdownMenu = document.getElementById('mobile-dropdown-menu');
    const profileBtn = document.getElementById('mobile-profile-btn');
    const profileDropdown = document.getElementById('mobile-profile-dropdown');
    const mobileLogo = document.getElementById('mobile-logo');

    menuBtn.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
        dropdownMenu.classList.toggle('flex');
        profileDropdown.classList.add('hidden');
    });

    profileBtn.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
        dropdownMenu.classList.add('hidden');
        dropdownMenu.classList.remove('flex');
    });

    const themeBtn = document.getElementById('mobile-theme-btn');

    themeBtn?.addEventListener('click', () => {

        const current = localStorage.getItem('theme') || 'system';

        let next;

        if (current === 'light') {
            next = 'dark';
        } else if (current === 'dark') {
            next = 'system';
        } else {
            next = 'light';
        }

        window.setTheme(next);

        updateMobileThemeUI(next);
    });

    window.updateMobileThemeUI = function(theme) {
        const themeText = document.getElementById('mobile-theme-text');

        const iconLight = document.getElementById('mobile-icon-light');
        const iconDark = document.getElementById('mobile-icon-dark');
        const iconSystem = document.getElementById('mobile-icon-system');

        if (!themeText) return;

        iconLight.classList.add('hidden');
        iconDark.classList.add('hidden');
        iconSystem.classList.add('hidden');

        themeText.textContent = theme;

        if (theme === 'light') {
            iconLight.classList.remove('hidden');
        }

        if (theme === 'dark') {
            iconDark.classList.remove('hidden');
        }

        if (theme === 'system') {
            iconSystem.classList.remove('hidden');
        }
    }

    const savedTheme = localStorage.getItem('theme') || 'system';
    updateMobileThemeUI(savedTheme);
});