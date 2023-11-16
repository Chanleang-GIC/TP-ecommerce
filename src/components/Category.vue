<template>
        <div class="flex flex-col ml-[23px] w-[136px] h-[177px] rounded-lg justify-center items-center">
            <img class="w-full h-[120px]" :src="image" :alt="image">
            <h3 class="text-2xl">{{name}}</h3>
            <h4 class="opacity-50 mb-5 ">{{description}}</h4>
        </div>   
        
</template>

<script>
    export default{
        name: "Category",
        props: {
            image: String,
            name: String,
            description: String,
        }
    }
</script>