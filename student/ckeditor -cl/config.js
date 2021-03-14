/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {

	config.filebrowserBrowseUrl = '../browse/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '../browse/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '../browse/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '../browse/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '../browse/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '../browse/upload.php?opener=ckeditor&type=flash';

	
config.toolbarGroups = [
			//{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			//{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] },

		];

		config.removeButtons = 'Styles,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Radio,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Strike,Subscript,Superscript,Blockquote,CreateDiv,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About,Link,Unlink,Anchor,BidiLtr,BidiRtl,Language';

};
