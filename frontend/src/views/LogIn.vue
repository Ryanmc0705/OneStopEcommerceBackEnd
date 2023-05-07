<script setup>
  import {ref,reactive} from 'vue';
  import axios from 'axios';

  const user_data = reactive({});
  const invalid = ref(false);
  const loading = ref(false)

  const logIn = async()=>{
    loading.value = true;
    try{
      const{data} = await axios.post("login",user_data);
      invalid.value = false;
      //alert("success");
    }catch(error){
      invalid.value = true;
    }
    loading.value = false;
   
  }
</script>

<template>
    <q-page-container>
        <q-page padding>
    <div class="absolute-center" style="width: 450px;margin-bottom: 300px!important;">
      <q-card padding="50px;">
        <q-card-section>
          <div class="q-pa-md">
            <div class="q-gutter-md">
              <h5 class="text-center">One Stop E-Commerce</h5>
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

              <q-input type="email" label="Email/Username" v-model="user_data.email">
                <template v-slot:prepend>
                  <q-icon name="perm_identity" />
                </template>
              </q-input>
              <q-input type="password" label="Password"  v-model="user_data.password">
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
  
</template>
