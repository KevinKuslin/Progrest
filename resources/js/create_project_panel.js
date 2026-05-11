document.addEventListener('DOMContentLoaded', () => {

    const panel = document.getElementById('panel');
    const overlay = document.getElementById('overlay');
    
    window.openPanel = function () {
        panel.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
    }
    
    window.closePanel = function () {
        panel.classList.add('translate-x-full');
        overlay.classList.add('hidden');
    }
    
    overlay.addEventListener('click', closePanel); 

    window.selectTheme = function (theme, element) {

        document.getElementById('selectedTheme').value = theme;

        document.querySelectorAll('.theme-option').forEach(option => {
            option.classList.remove('ring-4', 'ring-offset-2');
        });

        element.classList.add('ring-4', 'ring-offset-2');
    }
});