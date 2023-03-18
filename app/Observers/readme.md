//untuk register ditabel log
 Log::create([
        'module'=>'register',
        'action'=>'registrasi akun',
        'useraccess'=>$user->email
    ]);
