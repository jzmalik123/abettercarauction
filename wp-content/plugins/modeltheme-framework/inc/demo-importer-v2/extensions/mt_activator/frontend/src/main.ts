import { createApp } from 'vue'
import App from './App.vue'

const elems = document.getElementById("app");
// @ts-ignore
const el = elems?.dataset;
console.log(el);

const app = createApp(App, {dataset: el})
app.mount("#app")
