<policy>
    <div class="container">
    	{{ $slot ?? null }}

        <div class="row wow slideInLeft" data-wow-duration="2s" data-wow-delay="0.5s">
            <div class="item ">
                <div class="ic">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="if">
                    <p>free shipping</p>
                    {{ $freeShipContent }}
                </div>
            </div>
            <div class="item">
                <div class="ic">
                    <i class="fas fa-sync"></i>
                </div>
                <div class="if">
                    <p>FREE RETURNS</p>
                    {{ $freeReturnContent }}
                </div>
            </div>
            <div class="item">
                <div class="ic">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="if">
                    <p>SECURE SHOPPING</p>
                    {{ $secureContent }}
                </div>
            </div>
            <div class="item">
                <div class="ic">
                    <i class="fas fa-tag"></i>
                </div>
                <div class="if">
                    <p>OVER 10,000 STYLES</p>
                    We have everything you need
                </div>
            </div>
        </div>
    </div>
</policy>
