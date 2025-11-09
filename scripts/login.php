<?php
include"../Share/vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\KEY;
//  jwt inshlis
$issuer="login.php";
$audience="index.html";
$username="osman";
$password="123";
$hashpass=password_hash($password,PASSWORD_DEFAULT);
//print_r($_POST);
$gitusername=$_POST["userName"]??"";
$getpassword=$_POST["password"]??"";
$getpasswordHash=password_hash($getpassword,PASSWORD_DEFAULT);
if ($gitusername !== $username){
    print_r($_POST);
}
if(password_verify($getpassword,$hashpass)){
   // creat_jwt_token($issuer,$audience,$gitusername);
}else{
    echo"$issuer\n";
    echo"$hashpass";
    
}
//function creat_jwt_token($issuer,$audience,$gitusername){
    $secret_key="TZeTMSkmPjNHL4TPA3sVHZkljiVsywraAUZiAF3zrr4";
    $issued_at=time();
    $expert=$issued_at+300;//تاريخ الصلاحيه 5 دقائق
    $payload=array(
    "iss" => $issuer,
    "aud" => $audience,
    "iat" => $issued_at, 
    "exp" => $expert,
    "data"=>array(
    "user_id"=>"16384",
    "username"=>"$gitusername"
    )
    );
    
$jwt=JWT::encode($payload,$secret_key,'HS256');
    
echo "$jwt";


//}
    //توليد رمز الjwt









/*


echo "### 🌐 رؤوس الطلب (Headers)\n";
echo "<pre>";
if (function_exists('getallheaders')) {
    print_r(getallheaders());
} else {
    // حل بديل لرؤوس الطلب (أقل دقة في بعض الأحيان)
    $headers = [];
    foreach ($_SERVER as $name => $value) {
        if (substr($name, 0, 5) == 'HTTP_') {
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
        }
    }
    if (!empty($headers)) {
        print_r($headers);
    } else {
         echo "غير قادر على استرداد الرؤوس بالدالة getallheaders.\n";
    }
}
echo "</pre>\n";


// 4. متغيرات الخادم والبيئة الأساسية (كطريقة طلب، مسار، IP)
echo "### ⚙️ متغيرات الخادم والطلب الأساسية\n";
echo "<pre>";
$basic_info = [
    'REQUEST_METHOD' => $_SERVER['REQUEST_METHOD'] ?? 'N/A',
    'REQUEST_URI' => $_SERVER['REQUEST_URI'] ?? 'N/A',
    'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'] ?? 'N/A',
    'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'] ?? 'N/A',
    'SERVER_PROTOCOL' => $_SERVER['SERVER_PROTOCOL'] ?? 'N/A',
];
print_r($basic_info);
echo "</pre>\n";

// 5. محتوى إدخال HTTP الخام (لطلبات JSON أو XML أو غيرها)
// هذا مهم لطلبات الـ API التي لا تستخدم ترميز form-urlencoded
echo "### 📄 محتوى الإدخال الخام (Raw Input Body)\n";
echo "<pre>";
$raw_input = file_get_contents('php://input');
if (!empty($raw_input)) {
    echo htmlspecialchars($raw_input);
} else {
    echo "لا يوجد محتوى خام (عادةً في POST/GET القياسي).\n";
}
echo "</pre>";

echo "\n========================================\n";

// ملاحظة: هذا الكود مخصص لأغراض التصحيح (Debugging).
// يجب إزالته أو تأمينه في بيئة الإنتاج (Production).
*/
?>
