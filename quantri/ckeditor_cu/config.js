/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.language = 'vi';
	config.height = 300;
	config.toolbarCanCollapse = true;
	config.filebrowserBrowseUrl = '/filemanage/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '/filemanage/ckfinder/ckfinder.html';
    config.filebrowserFlashBrowseUrl = '/filemanage/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = '/filemanage/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/filemanage/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/filemanage/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};