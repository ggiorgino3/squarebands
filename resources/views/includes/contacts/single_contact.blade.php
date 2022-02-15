<div class="col-4">
    <div class="card {{ Request::segment(1) != 'administration' ? 'bg-dark' : '' }} mx-3 my-2">
        <img src="https://codingyaar.com/wp-content/uploads/bootstrap-profile-card-image.jpg" class="rounded-circle mt-3" alt="Contact image">
        <div class="card-body">
            @if(Request::segment(1) == 'administration')
                <a href="{{ route('contacts.edit', $contact->id) }}">
                    <h5 class="card-title text-center">{{ $contact->name }} {{ $contact->surname }}</h5>
                </a>
            @else
                <h5 class="card-title text-center">{{ $contact->name }} {{ $contact->surname }}</h5>
            @endif
            <p class="card-text">
                <div class="row px-0">
                    <div class="col-12 mb-1">
                        <i class="fas fa-at pe-2 "></i>{{ $contact->email }}
                    </div>
                    <div class="col-12 mb-1">
                        <i class="fas fa-phone-alt pe-2 "></i>{{ $contact->phone }}       
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <i class="fas fa-map-marker-alt pe-2"></i>{{ $contact->address }}        
                    </div>
                    <div class="col-6">
                        <i class="fas fa-briefcase pe-2"></i>{{ $contact->business_title }}        
                    </div>
                </div>
            </p>
        </div>
      </div>
</div>