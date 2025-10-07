document.addEventListener('DOMContentLoaded', function() {
    const tabsContainer = document.querySelector('#dynamic-posts');
    if (!tabsContainer) return; // Sai se o componente não estiver na página

    tabsContainer.addEventListener('click', function(e) {
        const button = e.target.closest('button[data-target]');
        if (!button) return;

        const targetId = button.dataset.target;
        const allButtons = tabsContainer.querySelectorAll('button[data-target]');
        const allContent = tabsContainer.querySelectorAll('[data-content="tab"]');

        // 1. Oculta todos os conteúdos e desativa todos os botões
        allContent.forEach(content => content.classList.add('hidden'));
        allButtons.forEach(btn => {
            btn.classList.remove('bg-purple-700', 'text-white', 'border-purple-600');
            btn.classList.add('bg-white', 'text-slate-700', 'border-gray-200');
        });

        // 2. Mostra o conteúdo alvo e ativa o botão clicado
        const targetContent = document.getElementById(targetId);
        if (targetContent) {
            targetContent.classList.remove('hidden');
        }
        
        button.classList.remove('bg-white', 'text-slate-700', 'border-gray-200');
        button.classList.add('bg-purple-700', 'text-white', 'border-purple-600');
    });
});