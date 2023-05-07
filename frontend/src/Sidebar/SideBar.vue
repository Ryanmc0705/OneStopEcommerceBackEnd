<template>
    <div class="q-pa-md">
      <q-layout view="hHh Lpr lff" class="shadow-2 rounded-borders">
        <q-header elevated class="bg-#027BE3">
          <q-toolbar>
            <q-btn flat @click="drawer = !drawer" round dense icon="menu" />
            <q-avatar>
             
            </q-avatar>
            <q-toolbar-title>Foreign Purchase Order System</q-toolbar-title>
          </q-toolbar>
        </q-header>
  
        <q-drawer
          v-model="drawer"
          show-if-above
          :width="200"
          :breakpoint="500"
          
          class="bg-grey-3"
        >
          <q-scroll-area class="fit">
            <q-list>
  
              <template v-for="(menuItem, index) in menuList" :key="index">
                <q-item clickable  :active="menuItem.label === 'Outbox'" v-ripple>
                  <q-item-section avatar>
                    <q-icon :name="menuItem.icon" />
                  </q-item-section>
                 
                  <q-item-section >
                    <router-link :to=menuItem.route style="text-decoration:none;color:black">{{ menuItem.label }}</router-link>
                  </q-item-section>
                 
                </q-item>
                <q-separator :key="'sep' + index"  v-if="menuItem.separator" />
               </template>
  
            </q-list>
          </q-scroll-area>
        </q-drawer>
  
        <q-page-container>
          <q-page padding>
             <h1>aaaaaaaaaaaaaaaaaaa</h1>
          </q-page>
        </q-page-container>
      </q-layout>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue'
  
  const menuList = [
     {
      icon: 'local_shipping',
      label: 'Supplier Files',
      separator: true,
      route:"/supplierlist"
    },
    
    
  ]
  
  export default {
    setup () {
      return {
        drawer: ref(false),
        menuList
      }
    }
  }
  </script>
  