{{-- @props(['title', 'old_price', 'new_price','product']) --}}
<div>
    <div class="product-card d-flex flex-column">
        <div class="text-center mb-3">
            <img src="https://placehold.co/200x200" class="img-fluid" alt="Product">
        </div>
        <a href="product.html" class="product-title text-dark">{{ $product->name }}</a>
        <div class="rating mb-2">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                class="fas fa-star-half-alt"></i>
            <span class="text-muted ms-1">({{ $product->price }})</span>
        </div>
        <div class="mt-auto">
            <div class="product-price mb-2"><sup>$</sup>({{ $product->price }}) - ({{ $product->createdBy->name }})</div>
            {{-- <div class="product-price mb-2"><sup>$</sup>({{ $product->price }}) - ({{ App\Models\User::find($product->created_by)->name }})</div> --}}
            <button class="btn btn-amazon w-100">Add to Cart</button>
        </div>
    </div>
</div>
