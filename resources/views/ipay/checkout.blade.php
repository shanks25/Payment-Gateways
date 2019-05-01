<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ipay</title>
</head>
<body>
	<form method=POST action="https://community.ipaygh.com/gateway">
		@csrf
		<input type=hidden name=merchant_key value="tk_e36f5f54-61c0-11e9-865e-f23c9170642f" />
		<input type=hidden name=success_url value="{{ url('ipay/callbackurl') }}" />
		<input type=hidden name=cancelled_url value="{{ url('ipay/callbackurl') }}" />
		<input type=hidden name=deferred_url value="" />
		Invoice ID <input type=text name=invoice_id value="{{$invoiceid}}"/>
		Invoice ID <input type=text name=ipn_url value="https://localhost:8000/ipay/callbackurl"/>
		<table cellspacing=0px cellpadding=0px border=0>
			<tr >
				<td align=right><b>GH&cent;</b><input name=total type=text size=10 /><input type=submit /></td>
			</tr>
		</table>
	</form>
</body>
</html>