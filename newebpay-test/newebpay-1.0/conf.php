<?php
$merchantID = "MS132051906"; 																					//商店代號
$hashKey    = "o7pTiJz6KGA9Jt9aIFuAVir5jDshf92A"; 																					//HashKey
$hashIV     = "WrigNvyze7Rsb6jt"; 																					//HashIV
$url        = "https://core.spgateway.com/MPG/mpg_gateway"; //測試環境URL
$ver        = "1.5";

$ReturnURL       = "http://demo.axcell28.idv.tw/newebpay-test/thanks.html"; 			//支付完成 返回商店網址
$NotifyURL_atm   = "http://demo.axcell28.idv.tw/newebpay-test/atm_notify.php"; 		//支付通知網址
$NotifyURL_ccard = ""; 	//支付通知網址
$ClientBackURL   = "http://demo.axcell28.idv.tw/newebpay-test/cancel.html"; 									//支付取消 返回商店網址

$NTD = 100;											//商品價格
$Order_Title = "梅壞掉紅茶包";		//商品名稱
$ATM_ExpireDate = 1;						//ATM付款到期日
?>
