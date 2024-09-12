<template>
    <div class="w-[1584px] h-[538px] rounded-md relative">
        <img  src="../assets/figure.png" alt="">
        <h1 class="absolute top-28 left-28 text-7xl w-[700px] font-semibold">Dont' miss amazing grocery deals</h1>
        <h4 class="absolute left-28 bottom-52 text-3xl w-[600px] text-gray-400">Sign up for the daily newsletter</h4>
        <div class="w-[442px] h-[50px] absolute bg-white left-28 bottom-32 rounded-full flex items-center">
            <fa icon="paper-plane" class=" px-3 text-gray-300 text-xl" ></fa>
            <input type="text" placeholder="Your email address" class="h-full w-full outline-none rounded-r-full">
            <input type="submit" value="Subscibe" class="h-[50px] min-w-[150px] bg-green-300 text-white font-medium rounded-full">
        </div>
    </div>

</template>


<script>
    export default {
        name: "ShowCase"
    }
</script>