<div class="row gallery-wrapper">
    @foreach($data as $dt)
        <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
            data-category="designing development">
            <div class="gallery-box card">
                <div class="gallery-container">
                    <a class="image-popup" href="{{ asset('storage/'.$dt->value) }}" title="">
                        @if($dt->content_type == 'photos')
                            <img class="photo_design"
                                src="{{ asset('/storage/'.$dt->value) }}" alt="" />
                        @else
                            <div class="embed-youtube">
                                <iframe src="//www.youtube.com/embed/{{ $dt->value }}" width="750" height="210" allowfullscreen></iframe>
                            </div>
                        @endif
                    </a>
                </div>

                @component('partials.box')
                    @slot('name')
                        {{ $dt->name }}
                    @endslot
                    @slot('edit_route')
                        {{ route('specific-detail.edit',$dt->id) }}
                    @endslot
                    @slot('show_route')
                        {{ route('specific-detail.show',$dt->id) }}
                    @endslot
                    @slot('delete_route')
                        {{ route('specific-detail.destroy',$dt->id) }}
                    @endslot
                    @slot('id')
                        {{ $dt->id }}
                    @endslot
                @endcomponent
            </div>
        </div>
        <!-- end col -->
    @endforeach
</div>