@include('partials.main_header')

<style type="text/css">
/*
 * Specific styles of signin component
 */
/*
 * General styles
 */


.card-container.card {
    max-width: 390px;
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    /*width: 96px;*/
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    /*-moz-border-radius: 50%;
   -webkit-border-radius: 50%;
    border-radius: 50%;*/
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
    color: rgb(104, 145, 162);
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-login #usr_name,
.form-login #usr_password {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-login input[type=email],
.form-login input[type=password],
.form-login input[type=text],
.form-login button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-login .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: rgb(104, 145, 162);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(12, 97, 33);
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{ 
    color: rgb(12, 97, 33);
}


</style>

<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="{{asset('public/main/images/neep.png')}}" />
        <p id="profile-name" class="profile-name-card">Administrator Login</p>
        @if(isset(Auth::user()->email))
            <script>window.location="{{ url('admin/dashboard') }}";</script>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if (count($errors) > 0) 
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="form-login" name="form-login" id="form-login" action="{{ url('login/checklogin') }}" >
        {{ csrf_field() }}
            <div class="input-group mb-3">       
                <input type="text" name="email" id="email" placeholder="Email Address"  class="form-control"  >      
            </div>

            <div class="input-group mb-3">
                
                <input type="password" name="password" id="password" placeholder="Password"  class="form-control" >

      
            </div>
        
            <button  class="btn btn-success" id="login" name="login" value="login"> LOGIN</button>

            <!-- <div class="form-group mb-3">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember_me" value="1">
            </div> -->
            
            <a href="#" class="forgot-password">Forgot the password?</a>
        </form><!-- /form -->
      
       
    </div><!-- /card-container -->
</div><!-- /container -->






    </body>

</html>
