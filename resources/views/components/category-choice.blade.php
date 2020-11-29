@if(!empty($categoriesChoice))
<category>
    <div class="row wow slideInRight" data-wow-duration="1.5s" data-wow-delay="0.4s">
        @foreach($categoriesChoice as $categoryChoice)
        <div class="item">
            <div class="info">
                <p>{{ $categoryChoice->name }}</p>
                <a href="{{ url($categoryChoice->slug) }}">
                    shop {{ $categoryChoice->name }}
                    <i class="fas fa-long-arrow-alt-right"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</category>
@endif
