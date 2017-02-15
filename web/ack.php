<?php
/**
 * Usage: 
 *
 * File Name: ack.php
 * Author: annhe  
 * Mail: i@annhe.net
 * Created Time: 2017-02-14 17:03:33
 **/

require dirname(__FILE__).'/../etc/config.php';
require dirname(__FILE__).'/../lib/function.php';
require dirname(__FILE__).'/../composer/vendor/autoload.php';
require dirname(__FILE__).'/../composer/vendor/confirm-it-solutions/php-zabbix-api/build/ZabbixApi.class.php';


if(isset($_GET['type']) && isset($_GET['eventids']) && isset($_GET['sign']))
{
	$type = $_GET['type'];
	$eventids = $_GET['eventids'];
	$sign = genSign($eventids, $config['sk']);
	if($sign != $_GET['sign'])
	{
		die("sign error");
	}
	$msg = "";
	if(isset($_GET['deal']))
		$msg = $msg . "[" .  $_GET['deal'] . "]";
	if(isset($_GET['note']))
		$msg = $msg . $_GET['note'];
	if(isset($_GET['user']))
		$msg = $msg . "(" . $_GET['user'] . ")";
	if($msg == "")
		$msg = "REMOTE ACK";
}elseif(isset($argv[1]) && isset($argv[2]))
{
	$type = $argv[1];
	$eventids = $argv[2];
	$msg = $argv[3];
}else
{
	die("nothing to do");
}

if(!array_key_exists($type, $config['zabbix']))
{
	die("type ".$type." error");
}

define('ZBXURL', $config['zabbix'][$type]['url']);
define('ZBXUSER', $config['zabbix'][$type]['user']);
define('ZBXPWD', $config['zabbix'][$type]['password']);

$zbxAPI = new \ZabbixApi\ZabbixApi(ZBXURL, ZBXUSER, ZBXPWD);

$eventids = explode(",", $eventids);
$param = array("eventids"=>$eventids, "message"=>$msg, "action"=>1);
try {
	$data = $zbxAPI->eventAcknowledge($param);
} catch (Exception $e) {
	die(explode("'", $e)[3]);
}
die(json_encode($data));
