 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
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
                            <form class="user" action="/profile/restaurant/add/product" enctype="multipart/form-data" method="POST">
                                @csrf   
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="title" id="title"
                                        placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="keywords" id="keywords"
                                        placeholder="Keywords">
                                </div>

                                <div class="form-group">
                                    <span>Upload Product İmage</span>
                                    <input type="file" class="form-control form-control-user" name="image" id="image"
                                        placeholder="image" >
                                </div>
                               
                                <!-- kategori id-name çekilecek-->
                                <div class="form-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                                        <select class="form-select" name="category" id="category">
                                                <option selected>Seç</option>
                                                @php
                                                    foreach($categories as $category){
                                                        print_r('<option value="'.$category->id.'">'.$category->title.'</option>');
                                                    }
                                                @endphp
                                            
                                        </select>
                                </div>
                                <!-- detay-->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="description" id="description"
                                        placeholder="Description">
                                </div>
                                <!-- price -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="price" id="price"
                                        placeholder="Price">
                                </div>

                                <a>
                                <button class="btn btn-primary btn-user btn-block" type="submit"> Ekle</button>
                                </a>
                            
                            </form>
                            <hr>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>