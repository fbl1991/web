<?php
require_once("./inc/train_mysqli.inc");
$user = $_REQUEST['user'];
$passwd = $_REQUEST['passwd'];
$train_mysqli = new train_mysqli();
$query = $train_mysqli->prepare("SELECT id FROM user WHERE user=? AND passwd=?");
if (!$query) {
	die('���ݿ��������ϵ����Ա��ȡ������Ϣ');
}
$query->bind_param("ss",$user, md5($passwd));
$query->execute();
$query->bind_result($id);
$query->fetch();
$query->close();
echo $id;
?>