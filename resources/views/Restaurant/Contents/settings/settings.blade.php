 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Restaurant Settings</h1>
</div>

<!-- Content Row -->

<div class="row">
    <div class="container">
        <div class="col-12">
        <form class="user" action="/profile/restaurant/update/settings" method="POST">
                @csrf   
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"  id=""
                        placeholder="Title" value="{{ $settings->title }}" disabled>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="keywords" id=""
                        placeholder="Keywords" value="{{ $settings->keywords }}">
                </div>
                <div class="form-group">
                        <textarea id="description" name="description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="points">Min Cart Price:</label>
                    <input type="number" id="points" name="min_cart" value="{{ $settings->min_cart }}" step="5" min="0" max="100" style="width:60px">
                </div>
                <div class="form-group">
                    <label for="points">Min Delivery Price:</label>
                    <input type="number" id="points" name="serve_price" value="{{ $settings->serve_price }}" step="5" min="0" max="10" style="width:60px">
                </div>
                <div class="form-group">
                    <label for="points">Delivery Time:</label>
                    <input type="number" id="points" name="serve_time" value="{{ $settings->serve_time }}" step="5" min="0" max="60" style="width:60px">
                </div>

                <a>
                <button class="btn btn-primary btn-user btn-block" type="submit"> Güncelle</button>
                </a>
            
            </form>
        </div>

    </div>
</div>



<script>
      $('#description').summernote({
        placeholder: 'Restaurant description',
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

    var markupStr = '{{ $settings->description }}';
    $('#description').summernote('code', markupStr);
</script>