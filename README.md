# CKeditor Plugin

This QCubed plugin lets you work with the CKEditor javascript text editor, which creates a full HTML editor in a web page. 

This plugin is just for the PHP interface to CKEditor. You must also install the CKEditor library, which fortunately is
installable via Composer. The directions below show you how to install both.

To install, add the following to the corresponding sections of your composer.json root file and execute ```composer update```:
```
	"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/qcubed/plugin_ckeditor"
        }

    ],
```    
and
```
	"require": {
		"qcubed/plugin_ckeditor": "dev-master"
        "ckeditor/ckeditor": "4.*"
	},

```
