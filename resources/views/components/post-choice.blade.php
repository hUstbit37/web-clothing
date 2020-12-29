@if(!empty($postsChoice))
<high-lights>
    <div class="container">
        <div class="titlePrimary">
            Tạp chí thời trang 2020
            <p>Những bộ sưu tập hot nhất trong năm 2020.</p>
        </div>
        <div class="row rowWrap">
            @foreach($postsChoice as $postChoice)
            <div class="item">
                <p>
                    <a href="{{ $postChoice->slug }}/post">
                        {{ $postChoice->title }}
                    </a>
                </p>
            </div>
            @endforeach
        </div>
    </div>
</high-lights>
@endif
