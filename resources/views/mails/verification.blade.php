Hello <i>{{ $user->fname }} {{ $user->lname }}</i>,
<p>You have successfully registered.</p>
 
Please click on the following link to complete the registration process 

<a href="{{ url('/verify/') }}/{{ $user->code }}">click here</a>

<br/><br/> 
Thank You,
<br/>
<i>www.demoapp.com</i>