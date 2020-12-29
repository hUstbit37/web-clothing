@if(!empty($categoriesChoice))
<category>
    <div class="row">
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
