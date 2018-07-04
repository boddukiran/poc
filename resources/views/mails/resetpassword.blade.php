Hello <i>{{ $user->fname }} {{ $user->lname }}</i>,
<br/><br/>
Please click on the following link to reset your password. 
<br/><br/>
<a href="{{ url('/resetpassword/') }}/{{ $user->code }}">click here</a>
<br/><br/> 
Thank You,
<br/>
<i>www.demoapp.com</i>