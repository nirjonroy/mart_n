<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div style="width:865px;margin: 0 auto;padding: padding:100px;">
	<div>
		<h2 style="color:#222">Forget Password Email- <span style="color:orange">Mart9294</span></h2>
	</div>
	<div style="border: 1px solid #ddd;">
		<div style="background:#222;width: 700px;padding: 25px 15px;margin: 0 auto;overflow: hidden;">
			<h1 style="color:#fff;float:left;margin-left: 25px;">Welcome To <span style="color:orange">Mart9294</span></h1>
			<div style="float:left;">
				@foreach($mainlogo as $key=>$value)
             	 <img src="{{asset($value->logo)}}" style="margin-left: 23px;margin-top: 10px;" alt="">
                 @endforeach
			</div>
		</div>
		<div style="padding: 0 30px;width: 700px;margin: 0 auto;">
			<div class="basic-info">
				<p style="color:#222;font-size: 16px;"> Your Forget Password  Token Is <strong>{{$passResetToken}}</strong> . Please copy your token and Verify your account </p>
				<p style="color:#222;font-size: 16px;">After verify your account, you can access your account to place orders, change your password and many more</p>
			</div>
<p style="color:#222;font-size: 16px;">We looking forward to seeing you soon.If you need any help, please do not hesitate to contact at</p>
				<p style="color:#222;font-size: 16px;"><a href="mailto:support@mart9294.com" style="color:black">support@mart9294.com</a></p>
			</div>
           <div class="footer-top" style="background:#222;height:20px;width:100%">
			</div>
			<div class="footer-description">
				<p><strong>Disclaimer:</strong></p>
				<p style="font-size: 16px;">This is system generated information and does not require any signature. Please do not reply to this message. This e-mail is confidential and may also be privileged. If you are not the intended recipient, please notify us immediately and do not disclose its contents to any other person, nor copy or use it for any purpose.</p>
			</div>
		</div>
	</div>
</div>