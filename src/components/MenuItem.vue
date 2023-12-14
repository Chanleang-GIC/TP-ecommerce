<template>
    <div v-if="type === 'header'" class="flex items-center justify-center gap-2">     
        <fa :icon="icon" class="h-[20px]" ></fa>
        <p class="font-semibold">{{title}}</p>
    </div>
    <div v-else class="flex flex-row-reverse items-center justify-center gap-2">     
        <fa :icon="icon" class="text-sm text-gray-300" ></fa>
        <p class="font-semibold">{{title}}</p>
    </div>
</template>

<script>
    export default{
        name:"MenuItem",
        props: {
            title: String,
            icon: String,
            type: String
        }
    }

</script>