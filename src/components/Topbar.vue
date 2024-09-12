<template>
    <div class="flex flex-col">
         <div class=" flex h-[97px] pb-[17px] w-full items-center justify-between border-b border-gray-300">
             <div class="w-fit h-fit flex gap-6 items-center">
                 <img src="../assets/MeloneLogo.png" class="w-[215px] h-[66px]" >
                 <Searchbar class=" translate-y-[4px]"></Searchbar>
             </div>
             <div class="flex gap-4">
                 <MenuItem v-for="menu in Menuitems" :title="menu.title" :icon="menu.icon" :type="menu.type" ></MenuItem>
             </div>
     
         </div>
         <div class="flex flex-row  items-center justify-between mb-1 border-b border-gray-300 py-2">
             <div class="flex gap-8 w-fit h-fit">
                 <div class="w-[250px] h-[54px] text-white bg-green-300 flex gap-2 justify-center items-center rounded-md">
                     <fa icon="border-all" class="text-2xl" ></fa>
                     <p class="text-lg font-semibold">Border all category</p>
                     <fa icon="chevron-down" class="text-xl" ></fa>
                 </div>
                 <div class="flex gap-10">
                     <div @click="nextRoute('/categories/category')" class="flex items-center h-full gap-3 ">
                         <fa icon="fire" class="text-2xl text-green-300" ></fa>
                         <p class="font-semibold">Hot Deals</p>  
                     </div>
                     <MenuItem @click="nextRoute('/')" v-for="item in ListItem" :title="item.title" :icon="item.icon"></MenuItem>
                 </div>
             </div>
             <div class="flex flex-row gap-3" >
                 <fa icon="headset" class="text-4xl translate-y-1" ></fa>
                 <div class="flex flex-col">
                     <p class="text-green-400 text-xl font-semibold">099 777 888</p>
                     <p class="text-gray-400 text-sm">24/7 support center</p>
                 </div>
             </div>
         </div>
    </div>
 
 </template>
 
 <script>
     import {useEStore} from '../stores/eStore';
     import {mapState} from 'pinia';
 
     import Searchbar from './Searchbar.vue'
     import MenuItem from './MenuItem.vue';
     export default{
         name: "Topbar",
         components: {
             Searchbar,
             MenuItem
         },
         computed: {
             ...mapState(useEStore,['Menuitems']),
             ...mapState(useEStore,['ListItem'])
         },
         methods: {
         nextRoute(route) {
           this.$router.push(route)
         }
       }
     }
 
 </script>