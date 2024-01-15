<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerName">
                                <label class="form-label">Customer Email *</label>
                                <input type="email" class="form-control" id="customerEmail">
                                <label class="form-label">Customer Mobile *</label>
                                <input type="text" class="form-control" id="customerMobile">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


 <script>

     async function Save()
     {

        let name= document.getElementById('customerName').value
         let email= document.getElementById('customerEmail').value

         let mobile= document.getElementById('customerMobile').value

         if(name.length===0 || email.length===0 || mobile.length===0 )
         {
             errorToast('Field Cannot be Empty')
         }

         else {

             showLoader()
             let res= await axios.post('/create-customer',{
                 name:name,email:email,mobile:mobile}
             )
             hideLoader()

             if(res.data['status']==='success')
             {
                 successToast(res.data['message'])
                 document.getElementById('modal-close').click()
               await  getList();
                 document.getElementById('save-form').reset()
             }

             else {
                 errorToast(res.data['message']);
             }
         }



     }

 </script>
