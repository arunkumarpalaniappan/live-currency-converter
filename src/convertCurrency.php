<?php
if(isset($_POST['amount']))
    {
      $amount = $_POST['amount'];
			$from = $_POST['from'];
			$to = $_POST['to'];
			function cconvert($amount2,$from2,$to2){
    		$results = converCurrency($amount2,"$from2","$to2");
    		$regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
    		preg_match($regularExpression, $results, $finalData);
    		$famt = explode(" $to2", $finalData[0]);
    		$famt1 = $famt[0];
				$famt2 = (int)"echo $famt1";
   			//$famt1=sprintf('%0.2f', $famt1);
    		echo $famt1;
				//echo $famt2;
 		}
		function converCurrency($amount1,$from1,$to1){
			$url = "https://www.google.com/finance/converter?a=$amount1&from=$from1&to=$to1";
			$request = curl_init();
			$timeOut = 0;
			curl_setopt ($request, CURLOPT_URL, $url);
			curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
			curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
			$response = curl_exec($request);
			curl_close($request);
			return $response;
		}
		cconvert($amount,"$from","$to");
}
?>
