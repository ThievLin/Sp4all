/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
var bas_url = "http://kasp.finance/";
CKEDITOR.editorConfig = function( config ) {
	config.filebrowserBrowseUrl = bas_url+'kcfinder/browse.php?opener=ckeditor&type=files';
   	config.filebrowserImageBrowseUrl = bas_url+'kcfinder/browse.php?opener=ckeditor&type=images';
   	config.filebrowserFlashBrowseUrl = bas_url+'kcfinder/browse.php?opener=ckeditor&type=flash';
   	config.filebrowserUploadUrl = bas_url+'kcfinder/upload.php?opener=ckeditor&type=files';
   	config.filebrowserImageUploadUrl = bas_url+'kcfinder/upload.php?opener=ckeditor&type=images';
   	config.filebrowserFlashUploadUrl = bas_url+'kcfinder/upload.php?opener=ckeditor&type=flash';
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,div,resize,toolbar,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,smiley,justify,link,indentlist,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,menubutton,scayt,stylescombo,tab,table,tabletools,undo,wsc';
	config.skin = 'bootstrapck';
	// %REMOVE_END%

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
