<template>
    <div class=" flex flex-col gap-4 m-auto w-[1600px]">
        <Topbar></Topbar>
        <div class="h-screen flex flex-col items-center">
            <div class="h-[235px] w-[1584px] bg-green-100 rounded-xl relative">
                <h1 class="absolute text-5xl font-semibold left-20 top-16">Coke & Milk</h1>
                <p class="absolute bottom-20 font-medium text-gray-400 left-20">Home > Categories > Coke & Milk</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Topbar from '../components/Topbar.vue';

    export default{
        name: "CategoriesPage",
        components: {
            Topbar,
        }
    }
</script>