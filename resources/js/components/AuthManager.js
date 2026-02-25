export default {
    init() {
        this.container = document.querySelector('#auth-popup');
        console.log(this.container);
        console.log("Cookie ? " + document.cookie.includes('mode_access='));
        if (!this.container) return;

        this.form = this.container.querySelector('#auth-form');
        this.links = document.querySelectorAll('.js-open-auth-popup');

        this.bindEvents();
    },

    bindEvents() {
        // Intercepter le clic sur les articles privés
        // Utilisation de la délégation d'événements
        document.addEventListener('click', (e) => {
            // On vérifie si l'élément cliqué (ou l'un de ses parents) a la classe
            const target = e.target.closest('.js-open-auth-popup');

            if (target) {
                console.log("Clic détecté sur un article privé");
                // On vérifie le cookie
                if (!document.cookie.includes('mode_access=')) {
                    e.preventDefault();
                    this.openPopup();
                }
            }
        });

        // Fermeture
        this.container.querySelector('.js-close-popup').addEventListener('click', () => this.closePopup());

        // Envoi AJAX
        this.form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = this.form.querySelector('input[name="email"]').value;
            const msgZone = this.form.querySelector('.js-message');

            const formData = new FormData();
            formData.append('action', 'send_magic_link');
            formData.append('email', email);

            try {
                const response = await fetch(window.location.origin + '/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                msgZone.innerText = result.data.message;
                if (result.success) this.form.reset();
            } catch (err) {
                msgZone.innerText = "Erreur de connexion.";
            }
        });
    },

    openPopup() { this.container.classList.remove('hidden'); },
    closePopup() { this.container.classList.add('hidden'); }

};
