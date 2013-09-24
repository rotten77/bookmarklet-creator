<!DOCTYPE html>
<html lang="cs">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bookmarklet Creator</title>
		<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style>
#bm-btn {cursor:move;}
		</style>
	</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Bookmarklet Creator</h1>
			<hr />
			<form class="form-vertical">
				<div class="control-group col-md-12">
					<label for="url">URL</label>
					<input type="text" class="form-control input-lg" id="url" placeholder="http://&hellip;" />
				</div>

				<div class="control-group col-md-12">
					<label for="name">Name</label>
					<input type="text" class="form-control input-lg" id="name" placeholder="Bookmarklet name" />
					<p class="text-info">&hellip;or use <a href="javascript:void(function(){ wLeft = window.screenLeft ? window.screenLeft : window.screenX; wTop = window.screenTop ? window.screenTop : window.screenY; var w = 960; var h = 500; var t = wTop + (window.innerHeight / 2) - (h / 2); var l = wLeft + (window.innerWidth / 2) - (w / 2); var win = window.open('http://copypastecharacter.com/','eTgLn','width='+w+',height='+h+',top='+t+',left='+l+',location=no,personalbar=no,menubar=no,status=no,resizable=yes,scrollbars=yes');})();﻿"><strong>special character</strong></a></p>
					
				</div>

				<div class="control-group col-md-6">
					<label for="width">Width</label>
					<input type="text" size="10" class="form-control input-lg" id="width" value="200" />
				</div>

				<div class="control-grou col-md-6">
					<label for="height">Height</label>
					<input type="text" size="10" class="form-control input-lg" id="height" value="400" />
				</div>
			</form>
		</div>
	</div>
	
	<div class="row" id="result">
		<div class="col-md-6 col-md-offset-3">
			<hr />
			<div class="text-center">
				
				
				<p>
					<a href="#" id="bm-btn" class="btn btn-danger btn-lg">&hellip;</a>
				</p>
				
				<textarea cols="2" rows="10" class="form-control" id="bm-js"></textarea>
			</div>
		</div>

	</div>
</div>

<script src="./bootstrap/js/jquery.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script>
$(function(){

	function makeid() {
		// http://stackoverflow.com/questions/1349404/generate-a-string-of-5-random-characters-in-javascript
		var text = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		for( var i=0; i < 5; i++ ) text += possible.charAt(Math.floor(Math.random() * possible.length));
	    return text;
	}

	$('input').change(function(){
		var url = $('#url').val();
		var width = $('#width').val()*1;
		var height = $('#height').val()*1;
		var name = $('#name').val();

		if(width>1 && height>1 && url!="" && name!="") $('#result').show();
		else $('#result').hide();

		var bookmarklet = "javascript:void(function(){ wLeft = window.screenLeft ? window.screenLeft : window.screenX; wTop = window.screenTop ? window.screenTop : window.screenY; var w = "+width+"; var h = "+height+"; var t = wTop + (window.innerHeight / 2) - (h / 2); var l = wLeft + (window.innerWidth / 2) - (w / 2); var win = window.open('"+url+"','"+makeid()+"','width='+w+',height='+h+',top='+t+',left='+l+',location=no,personalbar=no,menubar=no,status=no,resizable=yes,scrollbars=yes');})();﻿";

		$('#bm-btn').text(name);
		$('#bm-btn').attr("href", bookmarklet);
		$('#bm-js').val(bookmarklet);
	});

	$('input').change();
});
</script>
</body>
</html>

