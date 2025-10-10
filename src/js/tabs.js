document.addEventListener('DOMContentLoaded', function() {
    class DynamicTabs {
        constructor(container) {
            this.container = container;
            if (!this.container) {
                console.error('DynamicTabs: Container element not found.');
                return;
            }
            
            this.buttons = this.container.querySelectorAll('button[data-target]');
            this.allContent = this.container.querySelectorAll('[data-content="tab"]');

            this.init();
        }

        init() {
            this.container.addEventListener('click', (e) => {
                const button = e.target.closest('button[data-target]');
                if (!button) return;

                this.activateTab(button);
            });
        }
        
        activateTab(clickedButton) {
            const targetId = clickedButton.dataset.target;
            const targetContent = this.container.querySelector('.' + targetId);

            this.buttons.forEach(btn => {
                btn.classList.remove('bg-purple-700', 'text-white', 'border-purple-600');
                btn.classList.add('bg-white', 'text-slate-700', 'border-gray-200');
            });
            
            this.allContent.forEach(content => {
                content.classList.add('hidden');
            });

            clickedButton.classList.add('bg-purple-700', 'text-white', 'border-purple-600');
            clickedButton.classList.remove('bg-white', 'text-slate-700', 'border-gray-200');

            if (targetContent) {
                targetContent.classList.remove('hidden');
            }
        }
    }

    const tabComponents = document.querySelectorAll('.dynamic-posts');
    tabComponents.forEach(component => {
        new DynamicTabs(component);
    });
});