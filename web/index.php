<html>
<head>
<title>Alert-ACK</title>
</head>
<body>
<form action="ack.php" method="GET">

	<p>type:  <input type="text" name="type" value="<?php if(isset($_GET['type'])) echo $_GET['type'];?>" readonly="true"/></p>
	<p>eventids:  <input type="text" name="eventids" value="<?php if(isset($_GET['eventids'])) echo $_GET['eventids'];?>" readonly="true"/></p>
	<p>你是谁?  <input type="text" name="user"/></p>
	<p>处理方式: 
	<select name="deal">
		<option value=""></option>
		<option value="低优先级暂时不需要处理">低优先级暂时不需要处理</option>
		<option value="报警静默">报警静默</option>
	</select>
	<p>
	<p>备注信息:  <input type="text" name="note"/></p>
	<input type="hidden" name="sign" value="<?php if(isset($_GET['sign'])) echo $_GET['sign'];?>" readonly="true"/>
	<input type="submit" value="Submit" />
</form>
</body>
</html>
