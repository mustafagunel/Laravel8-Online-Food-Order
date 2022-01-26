 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Settings</h1>
</div>

<!-- Content Row -->

<div class="row">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active border border-success rounded-pill p-2"><a data-toggle="tab" href="#home">Main Settings</a></li>
            <li class="border border-success rounded-pill p-2 ml-2"><a data-toggle="tab" href="#other">SSS</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active show">
                
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
                                            <span>Hakkımızda</span>
                                            <textarea id="aboutus" name="aboutus" >
                                            </textarea>
                                            <!--
                                            <input type="text" class="form-control form-control-user" name="aboutus" id="aboutus"
                                                placeholder="About Us" value="{{ $settings['aboutus'] }}">-->
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="contact" id=""
                                                placeholder="Contact" value="{{ $settings['contact'] }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="references" id=""
                                                placeholder="References" value="{{ $settings['references'] }}">
                                        </div>
                                        <div class="form-group">
                                            <span>Kullanıcı Kayıt Sözleşmesi</span>
                                            <textarea id="ksozlesmesi" name="ksozlesmesi" >
                                            </textarea>
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
            <div id="other" class="tab-pane fade" style="position: relative;">
                
                <ul class="nav nav-tabs p-2">
                    <li class="active border border-success rounded-pill p-2"><a data-toggle="tab" href="#list">List</a></li>
                    <li class="border border-success rounded-pill p-2 ml-2"><a data-toggle="tab" href="#add">Add</a></li>
                </ul>
                <div id="list" class="tab-pane fade in active show">
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
                                                <th>Title</th>
                                                <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($settings2 as $r2)
                                                    <tr>
                                                        <td>{{ $r2->title }}</td>
                                                        <td>
                                                            <a class="btn btn-danger btn-sm " href="/admin/delete/settings2/{{ $r2->id }}" role="button">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="add" class="tab-pane fade">

                    <div class="card o-hidden border-0 shadow-lg my-5" style="position:absolute; top:50px;">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <form class="user" action="/admin/update/settings2" method="POST">
                                            @csrf   
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="title" id=""
                                                    placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <textarea id="description" name="description" >
                                                </textarea>
                                            </div>

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
        </div>

    <script>
      $('#description').summernote({
        placeholder: 'Cevap giriniz..',
        name:"test",
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      
      $('#ksozlesmesi').summernote({
        placeholder: 'Kullanıcı Sözleşme Metni..',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });


      $('#aboutus').summernote({
        placeholder: 'Hakkımızda Metni..',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

    var markupStr = '{{ $settings["ksozlesmesi"] }}';
    $('#ksozlesmesi').summernote('code', markupStr);

    var markupStr = '{{ $settings["aboutus"] }}';
    $('#aboutus').summernote('code', markupStr);




    </script>
        

    </div>
</div>