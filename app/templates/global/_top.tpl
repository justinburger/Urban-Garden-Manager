<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Urban Garden Manager</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/reset/reset-min.css">
		<link rel="stylesheet" type="text/css" href="{$BASE_URL}main.css" /> 
		<link rel="stylesheet" type="text/css" href="{$BASE_URL}js/modalbox/modalbox.css" /> 
		<link rel="stylesheet" type="text/css" href="{$BASE_URL}css/prototip.css" />
		<link rel="stylesheet" type="text/css" href="{$BASE_URL}css/calendarview.css" />



		<script src="{$BASE_URL}js/prototype.js" type="text/javascript"></script>
		
		<script src="{$BASE_URL}js/scriptaculous/src/scriptaculous.js" type="text/javascript"></script>
		<script src="{$BASE_URL}js/modalbox/modalbox.js" type="text/javascript"></script>
		<script type='text/javascript' src='js/prototip/prototip.js'></script>
		<script src="{$BASE_URL}js/main.js" type="text/javascript"></script>
		<script src="{$BASE_URL}js/garden.js" type="text/javascript"></script>
		<script src="{$BASE_URL}js/calendarview.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="header">
		<table style="width:100%; padding:0px; margin:0px;" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:442px;"><div id="header-left">&nbsp;</div></td>
				<td><div id="header-right">
					<div id="header-toolbar">
					   <a href="/home" {if $page == 'home'}class="selected_menu"{/if}>Home</a>	&nbsp;&nbsp;&nbsp;&nbsp;					
					   <a href="/veggies" {if $page == 'veggies'}class="selected_menu"{/if}>Veggies</a>	&nbsp;&nbsp;&nbsp;&nbsp;					
					   <a href="/garden" {if $page == 'garden'}class="selected_menu"{/if}>Garden</a>	&nbsp;&nbsp;&nbsp;&nbsp;					
					   <a href="/categories" {if $page == 'categories'}class="selected_menu"{/if}>Categories</a>	&nbsp;&nbsp;&nbsp;&nbsp;					
					   <a href="/settings" {if $page == 'settings'}class="selected_menu"{/if}>Settings</a>	&nbsp;&nbsp;&nbsp;&nbsp;					
					</div>
					<div id="user_info_pane">Logged In As: <strong>Justin Burger</strong><br/>
						<a href="#">Sign Out</a>
					</div>
				</div></td>				
			</tr>
		</table>
			
			

		</div>
		
		<div id="garden">