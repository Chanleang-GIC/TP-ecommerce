<template>
    <div class=" flex flex-col gap-4 m-auto">
      <Topbar></Topbar>
      <ShowCase></ShowCase>
      <Menu title="Featured Categories"></Menu>
      <div className="flex gap-[23px] mt-3">
        <!-- <Category :class="fruit.bg" v-for="(fruit, index) in fruits" :key="index" :image="fruit.imageUrl" :name="fruit.name" :description="fruit.description" /> -->
        <Category @click="nextRoute('/categories/category')" :class="category.bg" v-for="category in categories"  :image="category.imageUrl" :name="category.name" :description="category.description" />
      </div>
      <div class="flex gap-4 mb-3">
        <Promotion @click="nextRoute('/product/:productId')"  :class="promotion.color" v-for="promotion in prom" :image="promotion.image" :description="promotion.title" :bg="promotion.bg"></Promotion>
      </div>
      <Menu title="Popular Products"></Menu>
      <div class="grid gap-3 grid-cols-5 grid-rows-2 mt-3  ">
        <Product @click="nextRoute('/product/:productId')" v-for="product in products" :image= "product.image" :name="product.name" :tag="product.tag" 
                :rate="product.rate" :description="product.description" :discountPrice="product.discountPrice"
                :cost="product.sellPrice" :buy="product.buy" :color="product.color"
        ></Product>
      </div>
    </div>
  </template>
  
  
  
  
  
  
  <script>
    import {useEStore} from '../stores/eStore';
    import {mapState} from 'pinia';
    import { RouterLink } from 'vue-router';
  
    import Product from '../components/product.vue';
    import Category from '../components/Category.vue';
    import Promotion from '../components/Promotion.vue';
    import Menu from '../components/menu.vue';
    import Topbar from '../components/Topbar.vue'
    import ShowCase from '../components/ShowCase.vue';
  
    export default {
      name: "app",
      components: {
        Promotion,
        Menu,
        Category,
        Product,
        Topbar,
        RouterLink,
        ShowCase,
      },
      computed: {
        ...mapState(useEStore,['prom']),
        ...mapState(useEStore,['categories']),
        ...mapState(useEStore,['products'])
      },
      methods: {
        nextRoute(route) {
          this.$router.push(route)
        }
      }
    }
     
  </script>