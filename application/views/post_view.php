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

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font: 20px normal Helvetica, Arial, sans-serif;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
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

</head>
<body>

<div>
	<h1>Posts</h1>	
	<div id="refresh">
	 	<?php echo form_open('post_controller/refreshPosts'); ?>		
			  <?php
			  $data = array(
			  		'name' => 'refresh',
			  		'id' => 'refresh',
			  		'type' => 'submit',
			  		'content' => 'Refresh Posts'
			  );
			  
			  echo form_button($data);
			  ?>
		<?php echo form_close(); ?>
	</div>
	<div id="container">
		 <?php echo form_open('post_controller/deletePost'); ?>
				<div >
			      <?php 
			      	$tmpl = array ( 'table_open'  => '<table width="100%" border="1" cellpadding="4" cellspacing="4">' );
			      	$this->table->set_template($tmpl);
			      	
			      	$this->table->set_heading('ID', 'Platform', 'Date', 'Title', 'Description', '');
			      	
			      	foreach ($posts as $post) { 
			      		$delButtonData = array(
			      				'name' => 'delete',
			      				'id' => 'delete',
			      				'value' => $post->id,
			      				'type' => 'submit',
			      				'content' => 'Delete'
			      		);
			      			
			      		$postArray = array($post->id, $post->platform, $post->date, $post->title, $post->description, form_button($delButtonData));
						$this->table->add_row($postArray);
			      	} 
					echo $this->table->generate();
				   ?>
			    </div>
					
		<?php echo form_close(); ?>		
	</div>

</div>

</body>
</html>