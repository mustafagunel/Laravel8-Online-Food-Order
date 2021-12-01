 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products List</h1>
</div>

<!-- Content Row -->

<div class="row">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>İmage</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Detail</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @php
                                        foreach($products as $product){
                                            print_r('
                                                <tr>
                                                    <td>'.$product->id.'</td>
                                                    <td>
                                                        <img src="/images/products/'.$product->image.'" style="width:50px;height:50px">
                                                    </td>
                                                    <td>'.$product->title.'</td>
                                                    <td>'.$product->category_name.'</td>
                                                    <td>'.$product->detail.'</td>
                                                    <td>'.$product->price.'</td>
                                                    <td>'.$product->status.'</td>
                                                    <td>                                                        
                                                        <button type="button" class="btn btn-warning">Düzenle</button>
                                                        <button type="button" class="btn btn-danger">Sil</button>
                                                    </td>
                                                </tr>
                                            ');
                                        }

                                    @endphp
                                   
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>