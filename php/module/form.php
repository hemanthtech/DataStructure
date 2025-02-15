<?php
// 定义变量并默认设置为空值
$name = $email = $gender = $comment = $website = "";

//error
$nameErr = $emailErr = $genderErr = $websiteErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if (empty($_POST["name"])){
  	$nameErr = "Name is required";
  	echo "{$nameErr}";
  }
  else
    {$name = test_input($_POST["name"]);}

  if (empty($_POST["email"]))
    {$emailErr = "Email is required";}
  else
    {$email = test_input($_POST["email"]);}

  if (empty($_POST["website"]))
    {$website = "URL is required";}
  else
    {$website = test_input($_POST["website"]);}

  if (empty($_POST["comment"]))
    {$comment = "comment is required";}
  else
    {$comment = test_input($_POST["comment"]);}

  if (empty($_POST["gender"]))
    {$genderErr = "Gender is required";}
  else
    {$gender = test_input($_POST["gender"]);}
}

// if ($_SERVER["REQUEST_METHOD"] == "POST"){
// 	$name = test_input($_POST["name"]);
// 	$email = test_input($_POST["email"]);
// 	$website = test_input($_POST["website"]);
// 	$comment = test_input($_POST["comment"]);
// 	$gender = test_input($_POST["gender"]);
// }

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


$show = <<<EOD
        name = {$name}<br/>
        email = {$email}<br/>
        website = {$website}<br/>
        comment = {$comment }<br/>
        gender = {$gender}<br/>
EOD;

	echo "<mark>{$name}</mark>输入的内容是:<br/>{$show}";
	

/**
  * 1.通过 PHP 的 htmlspecialchars() 函数处理: XSS又叫 CSS (Cross-Site Script) ,跨站脚本攻击。
  * 
  * 2.使用 PHP trim() 函数去除用户输入数据中不必要的字符 (如：空格，tab，换行)。
  * 
  * 3.使用PHP stripslashes()函数去除用户输入数据中的反斜杠 (\)
  * 
  * 
  * 
  * 
  */
?>