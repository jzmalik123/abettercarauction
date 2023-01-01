import axios from "axios";

export default axios.create({
  baseURL: "//api.modeltheme.com/activator/",
  timeout: 10000,
});
