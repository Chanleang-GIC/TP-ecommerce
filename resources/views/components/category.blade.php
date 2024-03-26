<div>
    @foreach($products as $product)
        <div class="outer-div">
            <div class="custom-div">
                <img class="custom-image" src="{{ asset('storage/' . $product->images) }}" />
                <h3 class="custom-heading">{{ $product->name }}</h3>
                <p class="custom-paragraph">{{ $product->description }}</p>
            </div>
        </div>
    @endforeach

</div>


<style>
.outer-div {
    width: 200px;
    height: auto;
    background-color: #F2FCE4;
    border: 2px solid transparent;
    transition: border-color 0.3s;
}

.outer-div:hover {
    border-color: #81B13D;
}

.custom-div {
    display: flex;
    flex-direction: column;
    height: auto;
    width: auto;
    border-radius: 0.375rem;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    overflow: hidden;
}

.custom-image {
    height: 120px;
    width: 100%;
}

.custom-heading {
    text-align: center;
    font-weight: 600;
}

.custom-paragraph {
    text-align: center;
    font-size: 0.75rem;
    color: #B6B6B6;
}



</style>
