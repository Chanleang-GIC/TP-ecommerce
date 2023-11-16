<template>
    <div class="relative top-[20px] w-[512px] h-[310px]  ml-2 rounded-lg mt-2 overflow-hidden">
        <img :src="image" :alt="image" class="absolute right-0 bottom-0" >
        <h2 class="absolute top-20 left-10 text-3xl w-[270px]">{{ description }}</h2>
        <div class="absolute bottom-10 left-10"><Button :class="bg1">Shop Now</Button></div>
        
    </div>
</template>


<script>
    import Button from "./Button.vue";
    export default{
        name: "Promotion",
        props: {
            image: String,
            name: String,
            description: String,
            bg1: String,
        },
        components:{Button,}
    }
</script>