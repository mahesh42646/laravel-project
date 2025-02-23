export default {
    ckeditor: () => {
        const observation = document.querySelector('[name="observation"]');

        ClassicEditor
            .create(observation, { 
                removePlugins: ['Title'], placeholder: '' 
            })
            .then(editor => { 
                window.editor = editor; 
            })
            .catch(error => { 
                console.error( error ); 
            });
    }
}
