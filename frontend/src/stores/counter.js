import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useCounterStore = defineStore('counter', () => {
  const count = ref(0)
  const user_name = ref("");
  const user_email = ref("");
  const api_token = ref("");
  const doubleCount = computed(() => count.value * 2);
  
  function increment() {
    count.value++
  }
  const setName = (name)=>{
    user_name.value = name;
  }
  const setEmail = (email)=>{
    user_email.value = email;
  }
  const setApiToken = (token)=>{
    api_token.value = token;
  }


  return { count, doubleCount, increment,setName,user_name,user_email,setEmail,api_token,setApiToken }
})
