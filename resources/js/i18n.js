import { createI18n } from "vue-i18n";

const i18n = createI18n({
    legacy: false,
    locale: window?.appLocale || "en", // Fallback to English
    messages: window?.translations || {}, // Load translations from Inertia
});

export default i18n;
