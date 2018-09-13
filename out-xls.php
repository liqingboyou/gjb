<?php 
header("content-type:text/html; charset=gbk");
$DB_Server = "localhost:13306"; 
$DB_Username = "111"; 
$DB_Password = "222m"; 
$DB_DBName = "222"; 

$DB_TBLName = "member"; 
$savename = date("Ymj-Hi");
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect.");
mysql_query("Set Names gbk");
$file_type = "vnd.ms-excel";
$file_ending = "xls";

header("Content-Type: application/$file_type;charset=gbk");
header("Content-Disposition: attachment; filename=登记表-".$savename.".$file_ending");
header("Pragma: no-cache");


$sql = "Select * from $DB_TBLName";
$ALT_Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database");
$result = @mysql_query($sql,$Connect) or die(mysql_error());


$sep = "\t";
//for ($i = 0; $i < mysql_num_fields($result); $i++) {    echo mysql_field_name($result,$i) . "\t";}

print("账号	加密密码	姓名	提交日期	性别	QQ号码	联系电话	电子邮箱	出生年月	身份证号	民族	有效地址	投资金额	比例	用途	备注");

print("\r\n");

$i = 0;
while($row = mysql_fetch_row($result)) {
    $schema_insert = "";
    for($j=0; $j<mysql_num_fields($result);$j++) {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert=@mb_convert_encoding($schema_insert,'GBK','utf-8');
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\r\n";
    $i++;
}return (true);

?>
