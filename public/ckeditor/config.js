/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    config.allowedContent = true;
    config.language = 'es';
    //config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;
    //config.removeButtons = '[Paste],[some plugin]';
    // Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
    config.toolbar = [
        {name: 'document', groups: [/*'mode', 'document', 'doctools'*/], items: ['Source', 'Save', '-', /*'NewPage' 'Preview'*/, '-', 'Templates']},
        {name: 'clipboard', groups: ['clipboard', 'undo'], items: ['NewPage', 'Preview', '-', 'Templates', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
        {name: 'editing', groups: ['find', 'selection', 'spellchecker'], items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt', 'BidiLtr', 'BidiRtl']},
        //{name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
        //{name: 'colors', items: ['TextColor', 'BGColor', 'ShowBlocks']},
        // {name: 'about', items: ['About']},
        //{name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField']},
        '/',
        {name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat']},
        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language']},
        //{name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', ]},
        {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
        {name: 'insert', items: ['uploadfile','Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe', 'btgrid']},
        '/',
        {name: 'tools', items: ['Maximize', 'ShowBlocks'/*, '-', 'Attachments'*/]},
                //{name: 'others', items: ['-']},
    ];
	//config.extraPlugins = 'attach';
    config.extraPlugins = 'widgetselection,lineutils,widget,btgrid';
    //config.extraPlugins = 'imageuploader,widgetselection,lineutils,widget,btgrid,uploadfile';

    config.skin = 'office2013';
    //config.extraAllowedContent: 'data-toggle[*]{*}';
    // config.skin = 'kama';


    /*config.filebrowserBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=flash';*/



};