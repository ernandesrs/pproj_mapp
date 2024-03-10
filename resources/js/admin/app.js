import Chart from 'chart.js/auto'

const admTheme = {
    themeKeyOnStorage: 'admin_theme',
    currentTheme: null,

    start() {
        this.setTheme(this.getTheme());
    },
    toggle() {
        this.setTheme(this.currentTheme == 'light' ? 'dark' : 'light');
        dispatchEvent((new Event('admin_theme_has_change')));
        return this.currentTheme;
    },
    getTheme() {
        return localStorage.getItem(this.themeKeyOnStorage) ?? 'light';
    },
    setTheme(theme = 'light') {
        this.currentTheme = theme;
        document.documentElement.setAttribute('data-mode', this.currentTheme);
        localStorage.setItem(this.themeKeyOnStorage, this.currentTheme);
    }

};

admTheme.start();

window.Chart = Chart;
window['adminTheme'] = admTheme;
