<!-- Fucking simple pptpd server accounting :| -->
<!-- github.com/sinaxhpm -->
<?php 
if(isset($_POST['lpass'])){
	if($_POST['lpass']=="smoking nirvana"){
		setcookie('pptp', 'y',time()+7200);
		echo "Done";
	}else{
		echo "go to hell...";
	}
}elseif(!isset($_COOKIE['pptp'])) {
echo "please Login First ...";
echo "<form method='post'><input type='password' name='lpass'/><input value='login'type='submit'name='submit1'/></form>";
exit;
}
?>
<html>
	<head>
		<style>
		body{
			margin:0;
			
		}
		#left{
			float:left;
			background:lightgreen;
		}
		#right{
			float:right;
			background:lightblue;
		}
		.box{
			height:100%;
			width:50%;
			border-radius:25px;
		}
		td{
			border:1px solid black;
		}
		table, th, td {
		  border: 2px solid black;
		  padding:5px;
		}
		</style>
	</head>
<body>
<?php
if(isset($_POST['submit'])){
	$users=file_get_contents("/etc/ppp/chap-secrets");
	file_put_contents("/etc/ppp/chap-secrets",$users."\n".$_POST['user']." * ".$_POST['password']." *");
	echo "<div><h2> User ".$_POST['user']." Successfully Added!</h2></div>";
}elseif(isset($_GET['user'])){
    $f = "/etc/ppp/chap-secrets";
    $term = "this";
    $arr = file($f);
    foreach ($arr as $key=> $line) {
        if(preg_match("/^(".$_GET['user'].")/m",$line)){unset($arr[$key]);break;}
    }
    $arr = array_values($arr);
    file_put_contents($f, implode($arr));
	header("location:http://$_SERVER[HTTP_HOST]");
}
?>
		<div class="box" id="left">
			<center>
				<img src="./online.png" width="50" height="50" /><h3>Online Users</h3>
				<table>
					<tr>
						<th>User</th>
						<th>IP</th>
						<th>Date/Time</th>
					</tr>
					<?php
						preg_match_all('~(\S+)~ms',shell_exec("last -w | grep ppp | grep still"),$list);
						foreach(array_chunk($list[0],10) as $part){
						echo "<tr><td>$part[0]</td><td>$part[2]</td><td>$part[3]/$part[4]/$part[5]/$part[6]</td>";
						}
						?>
				</table>
			</center>
		</div>
		<div class="box" id="right">
			<center>
				<img src="./list.png" width="50" height="50" /><h3>Users</h3>
				<br/>
				<table>
					<tr>
						<th>User</th>
						<th>Password</th>
						<th>X</th>
					</tr>
					<?php
					$re=preg_replace("/^\s*(\/\/|#).*$/m","",file_get_contents("/etc/ppp/chap-secrets"));
					preg_match_all('(\S+)', $re,$re);					
					foreach(array_chunk($re[0],4) as $part){
						echo "<tr><td>$part[0]</td><td>$part[2]</td><td><a href='?user=$part[0]'><img width='15' height='15' src='./deletered.png'/></td>";
						}
						?>
				</table>
				<form method="post">
					<h4>Add User</h4>
					<input type="text" placeholder="Username" name="user" />
					<input type="text" placeholder="Password"  name="password" />
					<input type="submit" name="submit" value="Add" />
				</form>
			</center>
		</div>
	</body>
</html>
