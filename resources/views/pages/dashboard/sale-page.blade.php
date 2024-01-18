@extends('layout.sidenav-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <div class="row">
                        <div class="col-8">
                            <span class="text-bold text-dark">BILLED TO </span>
                            <p class="text-xs mx-0 my-1">Name: <span id="CName"></span></p>
                            <p class="text-xs mx-0 my-1">Email: <span id="CEmail"></span></p>
                            <p class="text-xs mx-0 my-1">User ID: <span id="CId"></span></p>
                        </div>
                        <div class="col-4">
                            <img class="w-50" src="{{"images/logo.png"}}">
                            <p class="text-bold mx-0 my-1 text-dark">Invoice </p>
                            <p class="text-xs mx-0 my-1">Date: {{ date('Y-m-d') }} </p>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary"/>
                    <div class="row">
                        <div class="col-12">
                            <table class="table w-100" id="invoiceTable">
                                <thead class="w-100">
                                <tr class="text-xs">
                                    <td>Name</td>
                                    <td>Qty</td>
                                    <td>Total</td>
                                    <td>Remove</td>
                                </tr>
                                </thead>
                                <tbody class="w-100" id="invoiceList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary"/>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-bold text-xs my-1 text-dark"> TOTAL: <i class="bi bi-currency-dollar"></i>
                                <span id="total"></span></p>
                            <p class="text-bold text-xs my-2 text-dark"> PAYABLE: <i class="bi bi-currency-dollar"></i>
                                <span id="payable"></span></p>
                            <p class="text-bold text-xs my-1 text-dark"> VAT(5%): <i class="bi bi-currency-dollar"></i>
                                <span id="vat"></span></p>
                            <p class="text-bold text-xs my-1 text-dark"> Discount: <i class="bi bi-currency-dollar"></i>
                                <span id="discount"></span></p>
                            <span class="text-xxs">Discount(%):</span>
                            <input onkeydown="return false" value="0" min="0" type="number" step="0.25"
                                   onchange="DiscountChange()" class="form-control w-40 " id="discountP"/>
                            <p>
                                <button onclick="createInvoice()" class="btn  my-3 bg-gradient-primary w-40">Confirm
                                </button>
                            </p>
                        </div>
                        <div class="col-12 p-2">

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <table class="table  w-100" id="productTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Product</td>
                            <td>Pick</td>
                        </tr>
                        </thead>
                        <tbody class="w-100" id="productList">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <table class="table table-sm w-100" id="customerTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Customer</td>
                            <td>Pick</td>
                        </tr>
                        </thead>
                        <tbody class="w-100" id="customerList">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>




    <div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Product</h6>
                </div>
                <div class="modal-body">
                    <form id="add-form">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Product ID *</label>
                                    <input type="text" class="form-control" id="PId">
                                    <label class="form-label mt-2">Product Name *</label>
                                    <input type="text" class="form-control" id="PName">
                                    <label class="form-label mt-2">Product Price *</label>
                                    <input type="text" class="form-control" id="PPrice">
                                    <label class="form-label mt-2">Product Qty *</label>
                                    <input type="text" class="form-control" id="PQty">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                    <button onclick="add()" id="save-btn" class="btn bg-gradient-success">Add</button>
                </div>
            </div>
        </div>
    </div>






    <script>

        (async () => {
            showLoader();
            await customerList();
            await productList();
            hideLoader();
        })()


        let invoiceItemList = [];

        function DiscountChange() {
            calculateGrandTotal()
        }

        function calculateGrandTotal() {
            let Total = 0;
            let Vat = 0;
            let Payable = 0;
            let Discount = 0;
            let discountPercentage = (parseFloat(document.getElementById('discountP').value));

            invoiceItemList.forEach(function (item, index) {
                Total = Total + parseFloat(item['sale_price'])
            })

            if (discountPercentage === 0) {
                Vat = ((Total * 5) / 100).toFixed(2);
            } else {
                Discount = ((Total * discountPercentage) / 100).toFixed(2);
                Total = (Total - ((Total * discountPercentage) / 100)).toFixed(2);
                Vat = ((Total * 5) / 100).toFixed(2);
            }

            Payable = (parseFloat(Total) + parseFloat(Vat)).toFixed(2);


            $('#total').text(Total)
            $('#payable').text(Payable)
            $('#vat').text(Vat)
            $('#discount').text(Discount)


        }

        function removeItem(index) {

            invoiceItemList.splice(index, 1)
            ShowInvoiceItem()
        }

        function ShowInvoiceItem() {
            let invoiceList = $('#invoiceList')

            invoiceList.empty()
            invoiceItemList.forEach(function (item, index) {
                let r = `<tr> <td> ${item['product_name']} </td>
                        <td> ${item['qty']} </td>
                        <td> ${item['sale_price']} </td>
                        <td><button data-index="${index}" class="btn remove text-xxs px-2 py-1  btn-sm m-0"> remove</button> </td>
                        </tr>  `
                invoiceList.append(r)
            })
            calculateGrandTotal()

            $('.remove').on('click', function () {
                let index = $(this).data('index');

                removeItem(index)
            })
        }

        function add() {
            let pId = $('#PId').val()
            let pName = $('#PName').val()
            let pPrice = $('#PPrice').val()
            let pQty = $('#PQty').val()
            let PTotalPrice = (parseFloat(pPrice) * parseFloat(pQty)).toFixed(2);

            if (pId.length === 0 || pName.length === 0 || pPrice.length === 0 || pQty.length === 0) {
                errorToast("Fill up all the input field")
            } else {
                let item = {product_name: pName, product_id: pId, qty: pQty, sale_price: PTotalPrice};
                invoiceItemList.push(item);
                console.log(invoiceItemList);
                $('#create-modal').modal('hide')
                ShowInvoiceItem();
            }

        }

        function addModal(id, name, price) {
            // document.getElementById('PId').value=id;
            // document.getElementById('PName').value=name;
            // document.getElementById('PPrice').value=price;

            $('#PId').val(id)
            $('#PName').val(name)
            $('#PPrice').val(price)

            $('#create-modal').modal('show')
        }

        async function productList() {
            showLoader()
            let res = await axios.get('/products');
            hideLoader()
            let productTable = $('#productTable')
            let productList = $('#productList')
            res.data.forEach(function (item, index) {
                let r = `<tr><td> ${item['name']} </td>
                        <td> <button data-name="${item['name']}" data-price="${item['price']}" data-id="${item['id']}" class="btn btn-outline-dark addProduct  text-xxs px-2 py-1  btn-sm m-0"> add </button></td>   </tr>`

                productList.append(r)
            })

            $('.addProduct').on('click', function () {
                let id = $(this).data('id')
                let name = $(this).data('name')
                let price = $(this).data('price')

                addModal(id, name, price)
                //


            })

            productTable.DataTable({

                    order: [[0, 'desc']],
                    scrollCollapse: false,
                    info: false,
                    lengthChange: false
                }
            )
        }


        async function customerList() {

            showLoader()
            let res = await axios.get('/get-customer');
            hideLoader()
            let customerTable = $('#customerTable')
            let customerList = $('#customerList')
            res.data.forEach(function (item, index) {
                let r = `<tr><td> ${item['name']} </td>
                        <td> <button data-name="${item['name']}" data-email="${item['email']}" data-id="${item['id']}" class="btn btn-outline-dark addCustomer  text-xxs px-2 py-1  btn-sm m-0"> add </button></td>   </tr>`

                customerList.append(r)
            })

            $('.addCustomer').on('click', function () {
                let name = $(this).data('name')
                $('#CName').text(name)

                let email = $(this).data('email')
                $('#CEmail').text(email)
                let id = $(this).data('id')
                $('#CId').text(id)

            })

            customerTable.DataTable({

                    order: [[0, 'desc']],
                    scrollCollapse: false,
                    info: false,
                    lengthChange: false
                }
            )

        }

        async function createInvoice() {
            let total = $('#total').text()
            let discount = $('#discount').text()
            let vat = $('#vat').text()
            let payable = $('#payable').text()
            let customer_id = $('#CId').text()


            console.log(total,discount,vat,payable,customer_id,invoiceItemList)
            // let data=
            //     {
            //         "total":total,
            //         "discount":discount,
            //         "vat":vat,
            //         "payable":payable,
            //         "customer_id":customer_id,
            //         "products": invoiceItemList
            //
            //     }
                if(customer_id.length===0)
                {
                    errorToast('Enter Customer details');
                }
                else if(invoiceItemList.length===0)
                {
                    errorToast('Enter product details')
                }
                else {


                    showLoader()
                    let res = await axios.post('/create-invoice', {
                        total:total,
                        discount:discount,
                        vat:vat,
                        payable:payable,
                        customer_id:customer_id,
                        products: invoiceItemList
                    })
                    hideLoader()

                    if (res.data['status']==='success') {
                        successToast(res.data['message'])
                    } else {
                        errorToast(res.data['message'])
                    }
                }

        }

    </script>

@endsection
