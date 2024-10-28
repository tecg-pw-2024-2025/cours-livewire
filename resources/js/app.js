import './bootstrap';


document.addEventListener('alpine:init', () => {
    Alpine.data('modal', () => ({
        init() {
            setTimeout(()=>this.$el.classList.add('active'),10);
        }
    }))
})
