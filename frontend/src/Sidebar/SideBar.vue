<template>
  <div class="q-pa-md">
    <q-layout view="lHh Lpr lff" style="width: 100%;" class="full-height">
      <q-header elevated class="primary">
        <q-toolbar>
          <q-toolbar-title>MMS Reference Table</q-toolbar-title>
          <q-btn flat @click="drawer = !drawer" round dense icon="menu" />
        </q-toolbar>
      </q-header>

      <q-drawer
        v-model="drawer"
        show-if-above
        :width="200"
        :breakpoint="400"
      >
        <q-scroll-area style="height: calc(100% - 150px); margin-top: 150px; border-right: 1px solid #ddd">
          <q-list padding>
            <q-item clickable v-ripple v-for="menu in menuList">
              
              <q-item-section avatar>
                <q-icon :name="menu.icon" />
              </q-item-section>

              <q-item-section>
              
              <router-link :to="menu.route" class="link">{{menu.label}} </router-link> 
              </q-item-section>
             
            </q-item>
            

          </q-list>
        </q-scroll-area>

        <q-img class="absolute-top" src="https://cdn.quasar.dev/img/material.png" style="height: 150px">
          <div class="absolute-bottom bg-transparent">
            <q-avatar size="56px" class="q-mb-sm">
              <img src="https://cdn.quasar.dev/img/boy-avatar.png">
            </q-avatar>
            <div class="text-weight-bold">{{store.user_name}}</div>
            <div><small>{{store.api_token}}</small></div>
          </div>
        </q-img>
      </q-drawer>
      
      <q-page-container class="fit" >
        <q-page padding >
            <router-view></router-view>
            
        </q-page>
      </q-page-container>
    </q-layout>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import {useCounterStore} from '../stores/counter';

const store = useCounterStore();

const menuList = [
{
    icon: 'dashboard',
    label: 'Dashboard',
    separator: true,
    route:"/dashboard"
  },
   {
    icon: 'category',
    label: 'Categories',
    separator: true,
    route:"/Category"
  },
  {
    icon: 'inventory',
    label: 'Sub Categories',
    separator: true,
    route:"/SubCategory"
  },
  {
    icon: 'local_shipping',
    label: 'Brands',
    separator: true,
    route:"/Brand"
  },
  {
    icon: 'inventory_2',
    label: 'Products',
    separator: true,
    route:"/Product"
  },
  {
    icon: 'paid',
    label: 'Orders',
    separator: true,
    route:"/supplierlist"
  },
  {
    icon: 'people',
    label: 'Users',
    separator: true,
    route:"/supplierlist"
  },
  {
    icon: 'logout',
    label: 'Log Out',
    separator: true,
    route:"/supplierlist"
  },
  
]

</script>
<style scoped>
  .link{
    text-decoration: none;
    color: black;
  }
</style>