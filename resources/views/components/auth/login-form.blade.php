<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    <h4>SIGN IN</h4>
                    <br/>
                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                    <br/>
                    <input id="password" placeholder="User Password" class="form-control" type="password"/>
                    <br/>
                    <button onclick="SubmitLogin()" class="btn w-100 bg-gradient-primary">Next</button>
                    <hr/>
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="{{url('/registration')}}">Sign Up </a>
                            <span class="ms-1">|</span>
                            <a class="text-center ms-3 h6" href="{{url('/sendOtp')}}">Forget Password</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


    async function SubmitLogin() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        let obj =
            {

                "email": email,
                "password": password
            }


        showLoader();
        let res = await axios.post('/userLogin', obj);
        hideLoader();

        if(email.length===0)
        {
            errorToast('Email Field is required');
        }
       else if(password.length===0)
        {
            errorToast('Password Field is required');
        }


       else if(res.data['status']==='failed')
        {
            errorToast(res.data['message']);
        }
        else
        {
            successToast(res.data['message']);
            setTimeout(function ()
            {
            window.location.href="/dashboard";

            },1000);
        }
    }


</script>


