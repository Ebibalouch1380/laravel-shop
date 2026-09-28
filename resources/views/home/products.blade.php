<section class="food_section layout_padding-bottom">
    <div class="container" x-data="{ tab: 1 }">
        <div class="heading_container heading_center">
            <h2>
                دسته بندی محصولات
            </h2>
        </div>

        <ul class="filters_menu">
            <li :class="tab === 1 ? 'active' : ''" @click="tab = 1">لپتاپ</li>
            <li :class="tab === 2 ? 'active' : ''" @click="tab = 2">موبایل</li>
            <li :class="tab === 3 ? 'active' : ''" @click="tab = 3">ایرپاد</li>
        </ul>

        @php
            $laptops = App\Models\Product::where('category_id', 1)
                ->where('quantity', '>', 0)
                ->where('status', 1)
                ->take(3)
                ->get();

            $phones = App\Models\Product::where('category_id', 2)
                ->where('quantity', '>', 0)
                ->where('status', 1)
                ->take(3)
                ->get();

            $earbuds = App\Models\Product::where('category_id', 3)
                ->where('quantity', '>', 0)
                ->where('status', 1)
                ->take(3)
                ->get();
        @endphp

        <div class="filters-content">
            <div x-show="tab === 1">
                <div class="row grid">
                    @foreach ($laptops as $product)
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="{{ imageUrl($product->primary_image) }}"
                                            alt="">
                                    </div>

                                    <div class="detail-box">
                                        <h5>
                                            <a href="{{ route('product.show', ['product' => $product->slug]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h5>
                                        <p>
                                            {{ $product->description }}
                                        </p>

                                        <div class="options">
                                            @if ($product->is_sale)
                                                <h6>
                                                    <del>{{ number_format($product->price) }}</del>
                                                    <span>
                                                        <span
                                                            class="text-danger">({{ salePercent($product->price, $product->sale_price) }}%)</span>
                                                        {{ number_format($product->sale_price) }}
                                                        <span>تومان</span>
                                                    </span>
                                                </h6>
                                            @else
                                                <h6>
                                                    {{ number_format($product->price) }}
                                                    <span>تومان</span>
                                                </h6>
                                            @endif

                                            <div class="d-flex">
                                                <a class="me-2"
                                                    href="{{ route('cart.increment', ['product_id' => $product->id, 'qty' => 1]) }}">
                                                    <i class="bi bi-cart-fill text-white fs-6"></i>
                                                </a>
                                                <a
                                                    href="{{ route('profile.wishlist.add', ['product_id' => $product->id]) }}">
                                                    <i class="bi bi-heart-fill text-white fs-6"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div x-show="tab === 2">
                <div class="row grid">
                    @foreach ($phones as $product)
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="{{ imageUrl($product->primary_image) }}"
                                            alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            <a href="{{ route('product.show', ['product' => $product->slug]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h5>
                                        <p>
                                            {{ $product->description }}
                                        </p>

                                        <div class="options">
                                            @if ($product->is_sale)
                                                <h6>
                                                    <del>{{ number_format($product->price) }}</del>
                                                    <span>
                                                        <span
                                                            class="text-danger">({{ salePercent($product->price, $product->sale_price) }}%)</span>
                                                        {{ number_format($product->sale_price) }}
                                                        <span>تومان</span>
                                                    </span>
                                                </h6>
                                            @else
                                                <h6>
                                                    {{ number_format($product->price) }}
                                                    <span>تومان</span>
                                                </h6>
                                            @endif

                                            <div class="d-flex">
                                                <a class="me-2"
                                                    href="{{ route('cart.increment', ['product_id' => $product->id, 'qty' => 1]) }}">
                                                    <i class="bi bi-cart-fill text-white fs-6"></i>
                                                </a>
                                                <a
                                                    href="{{ route('profile.wishlist.add', ['product_id' => $product->id]) }}">
                                                    <i class="bi bi-heart-fill text-white fs-6"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div x-show="tab === 3">
                <div class="row grid">
                    @foreach ($earbuds as $product)
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="{{ imageUrl($product->primary_image) }}"
                                            alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            <a href="{{ route('product.show', ['product' => $product->slug]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h5>
                                        <p>
                                            {{ $product->description }}
                                        </p>

                                        <div class="options">
                                            @if ($product->is_sale)
                                                <h6>
                                                    <del>{{ number_format($product->price) }}</del>
                                                    <span>
                                                        <span
                                                            class="text-danger">({{ salePercent($product->price, $product->sale_price) }}%)</span>
                                                        {{ number_format($product->sale_price) }}
                                                        <span>تومان</span>
                                                    </span>
                                                </h6>
                                            @else
                                                <h6>
                                                    {{ number_format($product->price) }}
                                                    <span>تومان</span>
                                                </h6>
                                            @endif

                                            <div class="d-flex">
                                                <a class="me-2"
                                                    href="{{ route('cart.increment', ['product_id' => $product->id, 'qty' => 1]) }}">
                                                    <i class="bi bi-cart-fill text-white fs-6"></i>
                                                </a>
                                                <a
                                                    href="{{ route('profile.wishlist.add', ['product_id' => $product->id]) }}">
                                                    <i class="bi bi-heart-fill text-white fs-6"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="btn-box">
            <a href="">
                مشاهده بیشتر
            </a>
        </div>
    </div>
</section>
