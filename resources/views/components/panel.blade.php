<div>
    @foreach($products as $product)
    <div class="container">
    <img class="custom-image" src="{{ asset('storage/' . $product->images) }}" />
        <div class="content">
            <div class="title">
                Everyday Fresh & Clean with our Product
            </div>
            <div class="button-container">
                <p>Sign up</p>
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                </svg>
            </div>
        </div>
    </div>
    @endforeach
</div>
<style>
.container {
    width: 512px;
    height: 300px;
    position: relative;
    border-radius: 0.375rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05), 0 1px 3px 1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background: #F0E8D5;
}

.container img {
    position: absolute;
    bottom: 0;
    right: 0;
}

.content {
    width: 271px;
    height: 141px;
    position: absolute;
    top: 14px;
    left: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 0.75rem;
}

.title {
    font-weight: 600;
    font-size: 1.5rem;
}

.button-container {
    width: 110px;
    height: 31px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-right: 0.75rem;
    border-radius: 0.375rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05), 0 1px 3px 1px rgba(0, 0, 0, 0.1);
    background: #6EE7B7;
}

.button-container p {
    transform: translateX(3px) translateY(-1px);
    font-weight: 600;
    color: black;
}

.button-container img {
    width: 1.25rem;
    height: 1.25rem;
    font-size: 1rem;
}

</style>