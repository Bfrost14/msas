@extends('back.layouts.layout')

@section('tab')
<link rel="stylesheet" href="{{ asset('css/form2.css') }}" media="screen" type="text/css" />
        <div id="container">

            @if(session('ok'))
                    <x-back.alert 
                        type='success'
                        title="{!! session('ok') !!}">
                    </x-back.alert>
                @endif
            <h1>Add user</h1>
            <form action="{{ route('users.indexstore') }}" method="POST">
                @csrf 
             <label><b>Name</b></label>
             <input type="text" placeholder="Enter the name(s)" name="name" required class=" @error('email') is-invalid @enderror" autocomplete="name" autofocus>
             @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
             @enderror
             <label><b>Email</b></label>
             <input type="email" placeholder="Enter email" name="email" required autocomplete="email">
             
             <label><b>Password</b></label>
             <input type="password" placeholder="Enter password" name="password" required class="@error('password') is-invalid @enderror" id="password" autocomplete="new-password">
             @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

             <label><b>Confirmation Password</b></label>
             <input type="password" placeholder="Confirm password" name="password_confirmation" required id="password-confirm" autocomplete="new-password">
            
             <label><b>Role</b></label>
             <select name="role" id="">
                 <option value="user">user</option>
                 <option value="admin">admin</option>
             </select>
               <input type="submit" id='submit' value="Enregistrer">
            
         </form>
        

</div>
@endsection