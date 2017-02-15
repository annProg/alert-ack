<!DOCTYPE HTML>
<html>
<head>
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
<style type="text/css">
body { 
	width:90%; 
	margin:auto;
	font-size: large;
}
#content {
	box-shadow: 0 0 5px #BBB;
	background: #F7F7F7;
	border: 1px solid #ccc; 
	padding: 30px 100px 60px 10px;
	margin-top: 50px;
}
</style>
<title>Alert-ACK</title>
</head>
<body>
<div id="content">
<form action="ack.php" method="GET" role="form" class="form-horizontal">
<div class="form-group">
	<label for="inputType" class="col-sm-2 control-label">Type</label>
	<div class="col-sm-10">
		<input type="text" name="type" class="form-control" value="<?php if(isset($_GET['type'])) echo $_GET['type'];?>" readonly="true"/>
	</div>
</div>

<div class="form-group">	
	<label for="inputEventids" class="col-sm-2 control-label">EventIDs</label>
	<div class="col-sm-10">	
		<input type="text" name="eventids" class="form-control" value="<?php if(isset($_GET['eventids'])) echo $_GET['eventids'];?>" readonly="true"/>
	</div>
</div>

<div class="form-group">
	<label for="inputUser" class="col-sm-2 control-label">你是谁</label>
	<div class="col-sm-10">
		<input type="text" name="user" class="form-control" placeholder="请输入您的名字"/>
	</div>
</div>

<div class="form-group">
	<label for="inputDeal" class="col-sm-2 control-label">处理方式</label>
	<div class="col-sm-10">
		<select name="deal" class="form-control">
			<option value=""></option>
			<option value="低优先级暂时不需要处理">低优先级暂时不需要处理</option>
			<option value="报警静默">报警静默</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label for="inputNote" class="col-sm-2 control-label">备注信息</label>
	<div class="col-sm-10">
		<input type="text" name="note" class="form-control" placeholder="请输入备注"/>
	</div>
</div>
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-primary btn-lg btn-block">提交</button>
	</div>
	<input type="hidden" name="sign" value="<?php if(isset($_GET['sign'])) echo $_GET['sign'];?>" readonly="true"/>
</div>
</form>
</body>
</html>
