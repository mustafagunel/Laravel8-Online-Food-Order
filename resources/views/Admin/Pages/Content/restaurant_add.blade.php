 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Restaurant</h1>
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
                            <form class="user" action="/admin/add/restaurant" enctype="multipart/form-data" method="POST">
                                @csrf   
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="title" id="title"
                                        placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="keywords" id=""
                                        placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="description" id=""
                                        placeholder="Description">
                                </div>

                                <div class="form-group">
                                    <span>Upload Restaurant Logo</span>
                                    <input type="file" class="form-control form-control-user" name="image" id="image"
                                        placeholder="image" >
                                </div>
                                <!--
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="type" id=""
                                        placeholder="type" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="detail" id=""
                                        placeholder="detail">
                                </div>
                                -->
                                <div class="form-group">
                                        <label class="input-group-text" for="inputGroupSelect01">City</label>
                                        <select class="form-select" name="city" id="city" onchange="changeTown()">
                                                <option selected>Seç</option>
                                                @php
                                                    foreach($cities as $city){
                                                        print_r('<option value="'.$city->id.'">'.$city->name.'</option>');
                                                    }
                                                @endphp
                                            
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Town</label>
                                    <select class="form-select" id="town" name="town">
                                        <option selected>Seç</option>
                                    </select>
                                </div>                                

                                <a>
                                <button class="btn btn-primary btn-user btn-block" type="submit"> Kaydet</button>
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