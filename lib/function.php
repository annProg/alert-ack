<?php
/**
 * Usage:
 * File Name: function.php
 * Author: annhe  
 * Mail: i@annhe.net
 * Created Time: 2017-02-15 10:17:47
 **/

function genSign($eventids, $sk)
{
	return(sha1(md5($eventids . $sk)));
}
