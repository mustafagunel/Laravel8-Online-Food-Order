 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Settings</h1>
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
                            <form class="user" action="/admin/update/settings" method="POST">
                                @csrf   
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="tittle" id=""
                                        placeholder="Title" value="{{ $settings['tittle'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="keywords" id=""
                                        placeholder="Keywords" value="{{ $settings['keywords'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="description" id=""
                                        placeholder="Description" value="{{ $settings['description'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="company" id=""
                                        placeholder="Company" value="{{ $settings['company'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="address" id=""
                                        placeholder="Address" value="{{ $settings['address'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="phone" id=""
                                        placeholder="Phone" value="{{ $settings['phone'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="fax" id=""
                                        placeholder="Fax" value="{{ $settings['fax'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="email" id=""
                                        placeholder="Email" value="{{ $settings['email'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="smtpserver" id=""
                                        placeholder="Smtpserver" value="{{ $settings['smtpserver'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="smtpemail" id=""
                                        placeholder="Smtpemail" value="{{ $settings['smtpemail'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="smtppassword" id=""
                                        placeholder="Smtppassword" value="{{ $settings['smtppassword'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="smtpport" id=""
                                        placeholder="Smtpport" value="{{ $settings['smtpport'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="facebook" id=""
                                        placeholder="Facebook" value="{{ $settings['facebook'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="instagram" id=""
                                        placeholder="Instagram" value="{{ $settings['instagram'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="twitter" id=""
                                        placeholder="Twitter" value="{{ $settings['twitter'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="aboutus" id=""
                                        placeholder="About Us" value="{{ $settings['aboutus'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="contact" id=""
                                        placeholder="Contact" value="{{ $settings['contact'] }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="references" id=""
                                        placeholder="References" value="{{ $settings['references'] }}">
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