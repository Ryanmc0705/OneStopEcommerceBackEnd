import { createRouter, createWebHistory } from 'vue-router'
import LogIn from '../views/LogIn.vue'
import SideBar from '../Sidebar/SideBar.vue'

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
      name: 'admin',
      component: SideBar
    },
    
  ]
})

export default router
