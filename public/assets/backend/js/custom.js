CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl = '../../elfinder-2.0-rc1/elfinder.html';
    config.filebrowserImageBrowseUrl = '../../elfinder-2.0-rc1/elfinder.html';
    config.filebrowserFlashBrowseUrl = '../../elfinder-2.0-rc1/elfinder.html';
    config.filebrowserUploadUrl = '../../elfinder-2.0-rc1/elfinder.html';
    config.filebrowserImageUploadUrl = '../../elfinder-2.0-rc1/elfinder.html';
    config.filebrowserFlashUploadUrl = '../../elfinder-2.0-rc1/elfinder.html';
    // ALLOW <i></i>
    config.protectedSource.push(/<i[^>]*><\/i>/g);
    config.protectedSource.push(/<span[^>]*><\/span>/g);
    config.allowedContent = true;
    // Define changes to default configuration here. For example:
    config.language = 'en';
    config.enterMode = CKEDITOR.ENTER_BR;
    // config.uiColor = '#AADC6E';
};