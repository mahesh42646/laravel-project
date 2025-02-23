export default {
    selectLogo: (selector) => {
        const image = document.querySelector(selector);

        image.addEventListener('click', () => { 
            const fileLogo = document.querySelector('[data-file-logo]');
            fileLogo.click();
        });
    },
    showLogo: (selector) => {
        const element = document.querySelector(selector);
        const logo = document.querySelector('[name="logo"]');

        element.addEventListener('change', () => {
            if (element.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
        
                    let size = event.total;
                    let i = 0;
                    const unit = ['B', 'KB', 'MB', 'GB'];
        
                    while(size > 900){
                        size /= 1024;
                        i++;
                    }
        
                    const exactSize = Math.round(size*100)/100;
                    const typeSize = unit[i];
        
                    if (typeSize === 'MB' || typeSize === 'GB') {
                        logo.value = '';

                        return Swal.fire({
                            iconColor: 'var(--blue)',
                            icon:  'info',
                            title: `<span style="color: var(--blue)">Imagem muito grande: ${exactSize} ${typeSize}</span>`,
                            html: 'A imagem a ser carregada não pode ser superior a 100 KB',
                            showConfirmButton: false,
                            timer: 6000,
                            customClass: {htmlContainer: 'mt-1'}
                        });
                    }
        
                    if (size > 100) {
                        logo.value = '';
        
                        return Swal.fire({
                            iconColor: 'var(--blue)',
                            icon:  'info',
                            title: `<span style="color: var(--blue)">Imagem grande: ${exactSize} ${typeSize}</span>`,
                            html: 'A imagem a ser carregada não pode ser superior a 100 KB',
                            showConfirmButton: false,
                            timer: 6000,
                            customClass: {htmlContainer: 'mt-1'}
                        });
                    }
        
                    const logoDisplay = document.querySelector('[data-image-logo]');
                    logoDisplay.setAttribute('src', event.target.result);
                }
        
                reader.readAsDataURL(element.files[0]);
            }
        });
    },
    selectBanner: (selector) => {
        const imageBanner = document.querySelector(selector);

        imageBanner.addEventListener('click', () => { 
            const fileBanner = document.querySelector('[data-file-banner]');
            fileBanner.click();
        });
    },
    showBanner: (selector) => {
        const element = document.querySelector(selector);
        const banner = document.querySelector('[name="banner"]');

        element.addEventListener('change', () => {
            if (element.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
        
                    let size = event.total;
                    let i = 0;
                    const unit = ['B', 'KB', 'MB', 'GB'];
        
                    while(size > 900){
                        size /= 1024;
                        i++;
                    }
        
                    const exactSize = Math.round(size*100)/100;
                    const typeSize = unit[i];
        
                    if (typeSize === 'MB' || typeSize === 'GB') {
                        banner.value = '';

                        return Swal.fire({
                            iconColor: 'var(--blue)',
                            icon:  'info',
                            title: `<span style="color: var(--blue)">Imagem muito grande: ${exactSize} ${typeSize}</span>`,
                            html: 'A imagem a ser carregada não pode ser superior a 100 KB',
                            showConfirmButton: false,
                            timer: 6000,
                            customClass: { htmlContainer: 'mt-1' }
                        });
                    }
        
                    if (size > 100) {
                        banner.value = '';
        
                        return Swal.fire({
                            iconColor: 'var(--blue)',
                            icon:  'info',
                            title: `<span style="color: var(--blue)">Imagem grande: ${exactSize} ${typeSize}</span>`,
                            html: 'A imagem a ser carregada não pode ser superior a 100 KB',
                            showConfirmButton: false,
                            timer: 6000,
                            customClass: { htmlContainer: 'mt-1' }
                        });
                    }
        
                    const bannerDisplay = document.querySelector('[data-image-banner]');
                    bannerDisplay.setAttribute('src', event.target.result);
                }
        
                reader.readAsDataURL(element.files[0]);
            }
        });
    }
}
