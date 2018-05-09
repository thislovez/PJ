 {{ csrf_field() }}

To verify email <a href = "{{ route('sendEmailDone' ,['email' => $user->email , 'vertifyToken' => $user->vertifyToken])}}" >Click here</a>