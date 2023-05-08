import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import { Quasar } from 'quasar'
import quasarUserOptions from './quasar-user-options'
import "quasar/dist/quasar.sass"
import {useCounterStore} from '../src/stores/counter'
import axios from 'axios'
const app = createApp(App).use(Quasar, quasarUserOptions)



axios.defaults.baseURL = 'http://localhost/TPBInterface/public/api/';
app.use(createPinia())
app.use(router)
app.mount('#app')
const store = useCounterStore();
    axios.defaults.headers =  {
        'Content-Type': 'application/json',
        'Accept' : "application/json",
        'Authorization': `Bearer 58|bhdIb2QmdecVp1MPtWzCohryw6FydbDnZnNFfwB6`
    }
    


