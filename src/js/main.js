document.addEventListener('DOMContentLoaded', function() {
    const backToTopButton = document.getElementById('back-to-top');

    // Mostra/Esconde o botão com base na posição do scroll
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) { // Mostra o botão após 300px de scroll
            backToTopButton.classList.remove('hidden');
            backToTopButton.classList.add('flex'); // ou 'block' se preferir
        } else {
            backToTopButton.classList.add('hidden');
            backToTopButton.classList.remove('flex');
        }
    });

    // Animação de scroll suave ao clicar no botão
    backToTopButton.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Esconde o botão por padrão quando a página carrega
    backToTopButton.classList.add('hidden');
    
    // --- Variáveis dos Elementos ---
    const body = document.body;
    
    // Pesquisa
    const searchToggle = document.getElementById('search-toggle');
    const searchOverlay = document.getElementById('search-overlay');
    const searchClose = document.getElementById('search-close');

    // Menu
    const menuToggle = document.getElementById('menu-toggle');
    const menuOverlay = document.getElementById('menu-overlay');
    const menuClose = document.getElementById('menu-close');
    const menuSidebar = document.getElementById('menu-sidebar');


    // --- FUNÇÕES DE CONTROLE ---

    // Função para abrir/fechar o Overlay
    function toggleOverlay(overlay, sidebar = null, isActive) {
        if (isActive) {
            // Abre: torna visível e bloqueia o scroll do body
            overlay.classList.remove('invisible', 'pointer-events-none', 'opacity-0');
            overlay.classList.add('opacity-100');
            body.classList.add('overflow-hidden'); // Bloqueia o scroll

            if (sidebar) {
                // Remove o transform para deslizar o menu
                sidebar.classList.remove('translate-x-full');
            }
        } else {
            // Fecha: reverte a visibilidade e libera o scroll
            overlay.classList.add('opacity-0');
            
            // Adiciona a classe 'invisible' após o término da transição
            setTimeout(() => {
                overlay.classList.add('invisible', 'pointer-events-none');
                body.classList.remove('overflow-hidden');
            }, 300); // 300ms = duração da transição no Tailwind

            if (sidebar) {
                sidebar.classList.add('translate-x-full');
            }
        }
    }


    // --- LISTENERS DE PESQUISA ---
    if (searchToggle && searchOverlay) {
        searchToggle.addEventListener('click', () => toggleOverlay(searchOverlay, null, true));
        searchClose.addEventListener('click', () => toggleOverlay(searchOverlay, null, false));
        
        // Fechar ao clicar no fundo
        searchOverlay.addEventListener('click', function(e) {
            if (e.target.id === 'search-overlay') {
                toggleOverlay(searchOverlay, null, false);
            }
        });
    }

    // --- LISTENERS DE MENU ---
    if (menuToggle && menuOverlay) {
        menuToggle.addEventListener('click', () => toggleOverlay(menuOverlay, menuSidebar, true));
        menuClose.addEventListener('click', () => toggleOverlay(menuOverlay, menuSidebar, false));

        // Fechar ao clicar no fundo preto/sombra
        menuOverlay.addEventListener('click', function(e) {
            if (e.target.id === 'menu-overlay') {
                toggleOverlay(menuOverlay, menuSidebar, false);
            }
        });
    }

});