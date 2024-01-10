<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Category</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="categoryName">
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

     let   CategoryName= document.getElementById('categoryName').value;

     if(CategoryName.length===0)
     {
         errorToast('value Cannot be empty')
     }
     else
     {
         document.getElementById('modal-close').click();

         let res= await axios.post('createCategory',{name:CategoryName })

         if(res.data['status']==='success')
         {
             successToast(res.data['message'])

             await getList();

             document.getElementById('save-form').reset();

         }
         else
         {
             errorToast(res.data['message']);
         }

     }


    }




</script>

