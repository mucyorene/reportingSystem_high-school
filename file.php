<div class=pagemenu>
		<a href="./" <?= !@$_GET['login']?"class='active'":"" ?> >Home</a><a <?= @$_GET['login']=="user"?"class='active'":"" ?>  href="./?login=user">Login</a><a href="register.php">Register</a>
	
	</div>

================
css
====

<style type="text/css">
.pagemenu{
	background-color: #fff;
	background-color:url(q.jpg); 
}
.pagemenu a{
	background-color:#06a454;
	

	color:#fff;
	padding:0 10px;
	font-size: 20px;
	font-weight: bold;
	font-family: sans-serif;
	text-decoration: none;
	width: 900px;
	height: 90%px;
}

.pagemenu a:hover, .pagemenu a.active{
	background-color:#fff ;
	color:#06a454 ;

}
</style>