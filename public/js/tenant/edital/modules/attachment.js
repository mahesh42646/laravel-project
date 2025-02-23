export default {
    prepareUpload: () => {
        const buttonAttachment = document.querySelector('[data-button-attachment]');

        buttonAttachment.addEventListener('click', () => {
            const fileName = document.querySelector('[data-file-name]');

            if (fileName.value === '') {
                fileName.focus();

                return Swal.fire({
                    iconColor: 'var(--blue)',
                    icon:  'info',
                    title: 'Informe o nome do arquivo!',
                    html: 'Antes de carregar o anexo, é necessário informar o nome do arquivo.',
                    showConfirmButton: false,
                    timer: 6000,
                    customClass: { htmlContainer: 'mt-1' }
                });
            }
    
            const container = document.querySelector('[data-container-attachments]');
            const div = document.createElement('div');
    
            div.classList.add('col-md-3', 'mb-1', 'p-2');
            div.innerHTML = (
                `<div class="d-flex justify-content-between align-items-center bg-light border rounded-lg p-3">
                    <div class="text-dark font-weight-medium">${fileName.value.toUpperCase()}.PDF</div>
                    <div type="button" title="Excluir anexo" onclick="this.parentElement.parentElement.remove()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#e10909" viewBox="0 0 256 256">
                            <path d="M200,56V208a8,8,0,0,1-8,8H64a8,8,0,0,1-8-8V56Z" opacity="0.2"></path><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                        </svg>
                    </div>
                </div>
                <input type="hidden" name="attachment_names[]" value="${fileName.value.toUpperCase()}">
                <input type="file" class="d-none" accept=".pdf" name="attachment_files[]" required>`
            );
    
            container.appendChild(div);
            container.lastChild.lastChild.click();
            fileName.value = '';

            const attachments = document.querySelectorAll('[name="attachment_files[]"]');
            attachments.forEach(element => {
                element.addEventListener('cancel', () => {
                    if (!element.files[0]) {
                        element.parentElement.remove();

                        Swal.fire({
                            iconColor: 'var(--blue)',
                            icon:  'info',
                            title: 'Informe o nome do arquivo!',
                            html: 'Selecione o arquivo!',
                            showConfirmButton: false,
                            timer: 6000,
                            customClass: { htmlContainer: 'mt-1' }
                        });
                    }
                })
            });

        });
    }
}
