# Live Currency Converter using Google Finance

This is the simple script which creates the API to use currency conversion directly from your web app.

### requires jquery 1.9.1 or higher and php 5.4


Send the requests from AJAX to PHP

<pre>
function requestConversion(amount,fromcurrency,tocurrency) 
{
  $.ajax({
               url: 'convertCurrency.php',
               data: 'amount='+amount+'&from='+fromcurrency+'&to='+tocurrency,
               type: 'POST',
               success:function(response) {
                         return response.replace('<span class=bld>','');
               }
     });
}
</pre>


Process the requests from PHP

<pre>
			function cconvert($amount2,$from2,$to2){
    		$results = converCurrency($amount2,"$from2","$to2");
    		$regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
    		preg_match($regularExpression, $results, $finalData);
    		$famt = explode(" $to2", $finalData[0]);
    		$famt1 = $famt[0];
    		echo $famt1;
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
		cconvert($_POST['amount'],$_POST['from'],$_POST['to']);
</pre>


###contribute
Contributions to live-currency-converter are welcome. Here is how you can contribute to live-currency-converter:

<a href='https://github.com/arunkumarpalaniappan/live-currency-converter/issues'> Submit bugs</a> and verify issues.

<a href='https://github.com/arunkumarpalaniappan/live-currency-converter/pulls'> Submit pull requests</a>  for bug fixes and features and discuss existing proposals.
