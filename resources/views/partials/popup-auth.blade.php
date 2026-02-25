<div id="auth-popup"
    class="fixed inset-0 z-[9999] hidden flex items-center justify-center bg-black/80 backdrop-blur-sm">
    <div class="bg-white p-8 max-w-md w-full relative">
        <button class="absolute top-4 right-4 js-close-popup text-2xl">&times;</button>
        <h2 class="font-forum text-2xl mb-4">Contenu Réservé</h2>
        <p class="mb-6 text-sm">Cet article est privé. Entrez votre email pour recevoir un lien d'accès immédiat.</p>

        <form id="auth-form" class="space-y-4">
            <input type="email" name="email" placeholder="votre@email.com" required
                class="w-full border-b border-black py-2 outline-none">
            <button type="submit"
                class="w-full bg-black text-white py-3 uppercase text-xs tracking-widest hover:bg-gray-800 transition-colors">
                Recevoir l'accès
            </button>
            <div class="js-message text-xs mt-2"></div>
        </form>
    </div>
</div>