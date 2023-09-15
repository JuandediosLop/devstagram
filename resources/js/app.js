import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar imagen',
    maxFiles: 1,
    uploadMultiple: false
});

dropzone.on('sending', function (file, xhr, formData) {
    console.log(formData);

});

dropzone.on('success', function (file, response) {
    console.log(response);

});

dropzone.on('error', function (file, response) {
    console.log(response);
});

dropzone.on('removedfile', function (file, response) {
    console.log('file removed');
});