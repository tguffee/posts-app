<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Posts App</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font: 20px normal Helvetica, Arial, sans-serif;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	
	#refresh{
		margin: 10px;
	}	
	</style>
	
    <script src="https://npmcdn.com/react@15.3.1/dist/react.js"></script>
    <script src="https://npmcdn.com/react-dom@15.3.1/dist/react-dom.js"></script>
    <script src="https://npmcdn.com/babel-core@5.8.38/browser.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/babel" src="<?php echo base_url().'src/javascript/post-view.js';?>"></script>

</head>
<body>
<div id="body"></div>

</body>
</html>