<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>User Profile</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input readonly id="email" placeholder="User Email" class="form-control" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>First Name</label>
                                <input id="firstName" placeholder="First Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Last Name</label>
                                <input id="lastName" placeholder="Last Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="mobile"/>
                            </div>

                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onUpdate()" class="btn mt-3 w-100  bg-gradient-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    showProfile();

    async function showProfile() {
        showLoader()
        let res = await axios.get('/getProfile')
        hideLoader()


        let data = res.data['user'];
        if (res.data['status'] === 'success') {

            document.getElementById('email').value = data['email'];
            document.getElementById('firstName').value = data['firstName'];
            document.getElementById('lastName').value = data['lastName'];
            document.getElementById('mobile').value = data['mobile'];
        } else {
            errorToast(res.data['message']);
        }

    }

    async function onUpdate() {

        let firstName = document.getElementById('firstName').value
        let lastName = document.getElementById('lastName').value
        let mobile = document.getElementById('mobile').value



        let obj={
            "firstName": firstName,
            "lastName": lastName,
            "mobile": mobile,

        }

        showLoader()
        let res= await axios.post('/updateProfile',obj)
        hideLoader()

        if(res.data['status']==='success')
        {
            successToast(res.data['message'])
        }
        else{
            errorToast(res.data['message'])
        }

    }

</script>
