<template>
    <div class="w-[700px] h-[50px] border-2 border-green-500 rounded-md items-center flex gap-2">
        <div class="flex  items-center gap-3 h-full pl-3">
            <p class=" text-center  font-medium text-lg">All categories</p>
            <img src="../assets/downarrow.png" class="h-[7px] w-[12px] translate-y-[2px]" alt="">
        </div>
        <div class="w- h-fit ">
            <input type="text" placeholder="Search" class=" w-[500px] outline-none border-l pl-3">
        </div>
        <fa icon="search" class="text-lg" ></fa>
        
    </div>
   

</template>

<script>
    export default{
        name: 'Searchbar'
    }

</script>