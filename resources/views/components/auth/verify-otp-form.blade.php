<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90  p-4">
                <div class="card-body">
                    <h4>ENTER OTP CODE</h4>
                    <br/>
                    <label>4 Digit Code Here</label>
                    <input id="otp" placeholder="Code" class="form-control" type="text"/>
                    <br/>
                    <button onclick="VerifyOtp()"  class="btn w-100 float-end bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function VerifyOtp()
    {
        let otp= document.getElementById('otp').value;


        let obj={
            "email": sessionStorage.getItem('email'),
            "otp":otp
        }

        if(otp.length===0)
        {
            errorToast('OTP field is required')
        }
        else if(otp.length!==4)
        {
            errorToast('OTP should be 4 digits');
        }
        else
        {
            showLoader();
            let res= await axios.post('/verifyOtp',obj);
            hideLoader();

            if(res.data['status']==='success')
            {
                successToast(res.data['message']);

                setTimeout(
                    function ()
                    {
                        window.location.href='/reset';
                    },1000
                );
                sessionStorage.clear();

            }
            else {
                errorToast(res.data['message']);
            }

        }

    }

</script>
