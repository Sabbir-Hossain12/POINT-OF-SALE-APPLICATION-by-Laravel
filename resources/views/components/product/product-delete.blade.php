<div class="modal animated zoomIn" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="" id="deleteID"/>
                <input class="" id="deleteFilePath"/>

            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn bg-gradient-success mx-2" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn bg-gradient-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

     function fillDeleteForm(id,file_path){

         document.getElementById('deleteID').value= id
         document.getElementById('deleteFilePath').value= file_path
    }

 async function itemDelete()
 {
      let id=document.getElementById('deleteID').value
     let file_path= document.getElementById('deleteFilePath').value


     showLoader()
     let res= await axios.post('/delete-product',{id:id,file_path:file_path})
     hideLoader()

     if(res.data['status']==='success')
     {
         await productList()
         document.getElementById('delete-modal-close').click()
         successToast(res.data['message'])

     }
 }

</script>

