<?php
// 次特店商務代號
$storeUid = "A1549439770001";
// 次特店金鑰
$key = "6p794d8BAyygJFc76frDNx6LofxY0BAg";

// 商品資料
$payment = array();
$payment['store_uid'] = "A1549439770001";
$payment['item'] = 1;
$payment['i_0_id'] = '0886449';
$payment['i_0_name'] = '商品名稱';
$payment['i_0_cost'] = '10';
$payment['i_0_amount'] = '1';
$payment['i_0_total'] = '10';
$payment['cost'] = 10;
$payment['user_id'] = "phper";
$payment['order_id'] = "1234567890";
$payment['ip'] = "192.168.0.1"; // 此為消費者IP，會做為驗證用
$payment['pfn'] = "ALL";

// 加密方法
function encrypt($fields, $key)
{
    $data = json_encode($fields);

    $size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($size, MCRYPT_DEV_URANDOM);
    $padding = 16 - (strlen($data) % 16);
    $data .= str_repeat(chr($padding), $padding);
    $data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);
    $data = base64_encode($iv . $data);
    return $data;
}

// 送出欄位
$postData = array();
$postData['store_uid'] = $storeUid;
$postData['service'] = encrypt(array(
    'service_name' => 'api',
    'cmd' => 'api/orders'
), $key);
$postData['encry_data'] = encrypt($payment, $key);

// 資料送出
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "https://pay.usecase.cc/api/init");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
$result = curl_exec($ch);
curl_close($ch);

// 回傳 JSON 內容
print_R($result);

?>
