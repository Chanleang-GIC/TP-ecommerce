<div>
    @foreach($products as $product)
    <div class="product-card">
        <div class="tag">tag</div>
        <img class="custom-image" src="{{ asset('storage/' . $product->images) }}" />
        <div class="product-details">
            <p class="brand">Fudo food</p>
            <p class="product-name">Seeds of Change Organic Quinoa, Brown, & Red Rice</p>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9734;</span>
            </div>
            <p class="description">500gram</p>
        </div>
        <div class="pricing">
            <div class="prices">
                <p class="discount-price">$2.51</p>
                <p class="cost">$2.00</p>
            </div>
            <div class="quantity-selector">
                <div class="quantity">1</div>
                <div class="arrows">
                    <span class="up">&#9650;</span>
                    <span class="down">&#9660;</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<style>
.product-card {
    display: flex;
    flex-direction: column;
    width: 300px;
    height: 400px;
    background-color: white;
    border: 1px solid #D1D5DB;
    border-radius: 8px;
    margin-left: 2px;
    margin-top: 2px;
}

.tag {
    display: flex;
    background: red;
    color: white;
    justify-content: center;
    align-items: center;
    position: relative;
    top: 20px;
    width: 58px;
    height: 32px;
    text-align: center;
    line-height: 32px;
    border-radius: 0 8px 8px 0;
}

.product-image {
    position: relative;
    top: 35px;
    left: 42px;
    width: 201px;
    height: 144px;
}

.product-details {
    margin-top: 28px;
    margin-left: 15px;
}

.brand {
    font-size: 12px;
}

.product-name {
    font-weight: bold;
    font-size: 14px;
    width: 261px;
    height: 49px;
}

.rating {
    display: flex;
    flex-direction: row;
    width: 14px;
    height: 11px;
}

.star {
    color: #e2c718;
}

.rate {
    position: relative;
    bottom: 1px;
    opacity: 0.5;
    margin-left: 1px;
}

.description {
    margin-top: 5px;
    font-size: 12px;
    color: #ccc;
}

.pricing {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.prices {
    display: flex;
    justify-content: center;
    align-items: center;
}

.discount-price {
    color: #0F9D58;
    font-size: 20px;
    text-decoration: line-through;
}

.cost {
    margin-left: 2px;
    font-size: 20px;
}

.quantity-selector {
    width: 67px;
    height: 29px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 3px;
    border-radius: 8px;
    border: 1px solid #0F9D58;
    justify-content: space-evenly;
}

.quantity {
    color: #0F9D58;
}

.arrows {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    margin-top: 1px;
}

.up,
.down {
    color: #0F9D58;
    font-size: 12px;
}

</style>