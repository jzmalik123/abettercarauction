import axios from "axios";
import store from "./store"


export default () => {
  return axios.create({
    // @ts-ignore
    baseURL: store.value.apiLocation + "mt-activator/",
    timeout: 100000000,
    headers: { "X-WP-Nonce": store.value.nonce },
  });
};

