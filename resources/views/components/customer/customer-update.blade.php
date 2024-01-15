<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerNameUpdate">

                                <label class="form-label mt-3">Customer Email *</label>
                                <input type="text" class="form-control" id="customerEmailUpdate" readonly>

                                <label class="form-label mt-3">Customer Mobile *</label>
                                <input type="text" class="form-control" id="customerMobileUpdate">

                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal"
                        aria-label="Close">Close
                </button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>


<script>


    async function fillUpData(id) {
        document.getElementById('updateID').value = id

        showLoader()
        let res = await axios.post('/customer-by-id', {id: id})

        document.getElementById('customerNameUpdate').value = res.data['name']
        document.getElementById('customerEmailUpdate').value = res.data['email']
        document.getElementById('customerMobileUpdate').value = res.data['mobile']
        hideLoader()
    }


    async function Update() {

        let updateID = document.getElementById('updateID').value;

        let customerName = document.getElementById('customerNameUpdate').value;
        let customerEmail = document.getElementById('customerEmailUpdate').value;
        let customerMobile = document.getElementById('customerMobileUpdate').value;


        if (customerName.length === 0 || customerEmail.length === 0 || customerMobile.length === 0) {
            errorToast('All Field Required')
        } else {

            document.getElementById('update-modal-close').click();

            showLoader();

            let res = await axios.post("/update-customer", {
                name: customerName,
                mobile: customerMobile,
                id: updateID
            })

            hideLoader();

            if (res.data['status'] === 'success') {

                successToast(res.data['message']);

                document.getElementById("update-form").reset();

                await getList();
            } else {
                errorToast(res.data['message'])
            }
        }
    }

</script>
