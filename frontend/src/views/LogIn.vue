<script setup>
  import {ref,reactive} from 'vue';
  import axios from 'axios';
  import router from '../router';
  import {useCounterStore} from '../stores/counter';

  const user_data = reactive({});
  const invalid = ref(false);
  const loading = ref(false);
  const store = useCounterStore();
  const logo = ref("../../public/logosm.png");
  const logIn = async()=>{
    loading.value = true;
 
    try{
      const{data} = await axios.post("login",user_data);
     
      store.setName(data.name);
      store.setEmail(data.email);
      store.setApiToken(data.token);
      invalid.value = false;
      router.push("/DashBoard");

    }catch(error){
      invalid.value = true;
      console.log(error);
    }
    loading.value = false;
   
  }
</script>

<template>
  <q-layout>
    <q-page-container>
    <q-page padding>
    <div class="absolute-center" style="width: 450px;margin-bottom: 300px!important;">
      <q-card padding="50px;">
        <q-card-section>
          <div class="q-pa-md">
            <div class="q-gutter-md">
              <q-avatar style="display: block;
                                                    margin-left: auto;
                                                    margin-right: auto;">
                                            <img :src="logo">
                                        </q-avatar>
              <h5 class="text-center">MMS Reference Table</h5>
              <div class="alert-message">
                <q-banner dense inline-actions class="text-white bg-red" v-if="invalid">
                  Invalid Username or Password
                </q-banner>
              </div>
              <q-inner-loading
                label="Logging In..."
                label-class="text-blue"
                label-style="font-size: 1.1em"
                :showing="loading"
              />

              <q-input dense rounded outlined type="email" label="Email/Username" v-model="user_data.email">
                <template v-slot:prepend>
                  <q-icon name="perm_identity" />
                </template>
              </q-input>
              <q-input dense rounded outlined type="password" label="Password"  v-model="user_data.password">
                <template v-slot:prepend>
                  <q-icon name="lock" />
                </template>
              </q-input>
              <q-btn color="primary" icon-right="check" @click="logIn">Login</q-btn>

              <p class="text-center">
                Copyright 2022 - SM Retail, Inc. <br />System Version 1.0.0
              </p>
            </div>
          </div>
        </q-card-section>
      </q-card>
    </div>
  </q-page>
    </q-page-container>
  </q-layout>
    
  
</template>
