import { createRouter, createWebHistory } from 'vue-router'
// import homepage from '../views/homepage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: ()=> import('../views/homepage.vue')
    },
    {
      path: '/categories/category',
      name: 'category',
      component: ()=> import('../views/CategoriesPage.vue')
    },
    {
      path: '/product/:productId',
      name: 'product',
      component: ()=> import('../views/ProductViews.vue')
    },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   // component: () => import('../views/AboutView.vue')
    // }
  ]
})

export default router
