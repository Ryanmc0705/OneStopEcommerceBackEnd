import { createRouter, createWebHistory } from 'vue-router'
import LogIn from '../views/LogIn.vue'
import SideBar from '../Sidebar/SideBar.vue'
import DashBoard from '../views/DashBoard.vue';
import Category from '../views/Category.vue';
import SubCategory from '../views/SubCategory.vue';
import Brand from '../views/Brand.vue';
import Product from '../views/Product.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'LogIn',
      component: LogIn
    },
    {
      path: '/admin',
      component: SideBar,
      children:[
        {
        path: '/DashBoard',
        name: 'DashBoard',
        component: DashBoard
       } ,
       {
        path: '/Category',
        name: 'Category',
        component: Category
       } ,
       {
        path: '/SubCategory',
        name: 'SubCategory',
        component: SubCategory
       } ,
       {
        path: '/Brand',
        name: 'Brand',
        component: Brand
       } ,
       {
        path: '/Product',
        name: 'Product',
        component: Product
       } ,
    
    ]
    },
    
  ]
})

export default router
