<div class="col-12" >
    <div class="accordion accordion-flush" id="accordionFlushExample">
        
        @foreach($settings2 as $s)
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading{{ $s->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $s->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $s->id }}">
                {{ $s->title }}
                </button>
                </h2>
                <div id="flush-collapse{{ $s->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $s->id }}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{ $s->description }}
                    </div>
                </div>
            </div>

        @endforeach
    
    
        
    </div> 
</div>