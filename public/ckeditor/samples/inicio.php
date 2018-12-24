<!DOCTYPE html>
<!--
Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>CKEditor Sample</title>
	<script src="../ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
</head>
<body id="main">

<header class="header-a">
	<div class="grid-container">
		<h1 class="header-a-logo grid-width-30">
			<a href="index.html"><img src="img/logo.png" alt="CKEditor Sample"></a>
		</h1>

		<nav class="navigation-b grid-width-70">
			<ul>
				<li><a href="index.html" class="button-a button-a-background">Start</a></li>
				<li><a href="toolbarconfigurator/index.html" class="button-a">Toolbar configurator <span class="balloon-a balloon-a-nw">Edit your toolbar now!</span></a></li>
			</ul>
		</nav>
	</div>
</header>

<main>
	<div class="adjoined-bottom">
		<div class="grid-container">
			<div class="grid-width-100">
				<div id="editor">
					<h1>Hello world!</h1>
					<p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
				</div>
			</div>
		</div>
	</div>
</main>

<footer class="footer-a grid-container">
	<div class="grid-container">
		<p class="grid-width-100">
			CKEditor &ndash; The text editor for the Internet &ndash; <a class="samples" href="http://ckeditor.com/">http://ckeditor.com</a>
		</p>
		<p class="grid-width-100" id="copy">
			Copyright &copy; 2003-2017, <a class="samples" href="http://cksource.com/">CKSource</a> &ndash; Frederico Knabben. All rights reserved.
		</p>
	</div>
</footer>
<script>
//CKEDITOR.replace("editor");
CKEDITOR.replace( 'editor', {
    /*filebrowserBrowseUrl: '/browser/browse.php',
    filebrowserUploadUrl: '/uploader/upload.php',*/
	filebrowserUploadUrl: '../plugins/imageuploader/filesUpload.php?type=Files',
    filebrowserImageUploadUrl: '../plugins/imageuploader/imgupload.php?type=Images',
});
//alert("david Jane");
	//initSample();
</script>

</body>
</html>
