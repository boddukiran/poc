Hello <i>{{ $user->fname }} {{ $user->lname }}</i>,
 
Please click on the following link to reset your password. 

<a href="{{ url('/resetpassword/') }}/{{ $user->code }}">click here</a>

<br/><br/> 
Thank You,
<br/>
<i>www.demoapp.com</i>