<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div style="width:865px;margin: 0 auto;padding: padding:100px;">
	<div>
		<h2 style="color:#222">Sign Up Email - <span style="color:orange">Mart9294</span></h2>
	</div>
	<div style="border: 1px solid #ddd;">
		<div style="background:#222;width: 700px;padding: 25px 15px;margin: 0 auto;overflow: hidden;">
		    <div style="width:40%;float:left">
			<h1 style="color:white;">Welcome To</h1>
			</div>
			<div style="width: 15%;float: left;">
                    <img style="height:70px; width: 70px; display: block;" src="https://www.mart9294.com/public/frontEnd/images/mail-logo.png"  style="margin-left: 10px;margin-top: 5px;" alt="">
			</div>
			<div style="width:30%;float:left">
			    <h1 style="color:orange;">MART9294</h1>
			</div>
		</div>
		<div style="padding: 0 30px;width: 700px;margin: 0 auto;">
			<div class="basic-info">
				<p style="color:#222;font-size: 16px;"> Hello ({{$shopname}})</p>
				<p style="color:#222;font-size: 16px;line-height:1.8"> Thank you for joining with <strong style="color:orange">Mart9294</strong> as Selling Partner.  <span>Please Verify Your <br> Email</span> <a href="{{url('seller/email/verify/'.$slug.'/'.$sellerid.'/'.$verifyToken)}}" style="text-decoration: none;border: 2px solid blue;padding: 5px;
"><strong>CLICK HERE</strong></a></p>
				<p style="color:#222;font-size: 16px;">Your useremail and password are :</p>
				<p style="color:#222;font-size: 16px;text-decoration: none"> User Email : <span style="text-decoration: none;color:#222 !important">{{$email}}</span></p>
				<p style="color:#222;font-size: 16px;"> Password : <span >{{$password}}</span></p>

				<p style="color:#222;font-size: 16px;">Enjoy business with us.We look forward to seeing you soon.</p>
				<p style="color:#222;font-size: 16px;">If you need any help, please do not hesitate to contact with us at:</p>
				<p style="color:#222;font-size: 16px;"><a href="mailto:support@mart9294.com" style="color:black">support@mart9294.com</a> or call us on 017xxxx.</p>
			</div>
	         <div class="footer-top" style="background:#222;height:50px;width:80%">
			</div>
			
			<div class="footer-description">
				<p style="font-size: 16px;"><strong>Disclaimer:</strong></p>
				<p style="font-size: 16px;">This is system generated information and does not require any signature. Please do not reply to this message. This e-mail is confidential and may also be privileged. If you are not the intended recipient, please notify us immediately and do not disclose its contents to any other person, nor copy or use it for any purpose.</p>
			</div>
		</div>
	</div>
</div>
