export default {
    show: (title, options = {}) => {
        Swal.fire({
            iconColor: 'var(--blue)',
            icon:  'info',
            title: `<span style="color: var(--blue)">${title}</span>`,
            html: 'Este campo é de preenchinmento obrigatório!',
            showConfirmButton: false,
            timer: 3000,
            customClass: {htmlContainer: 'mt-1'},
            ...options
        });
    }
}