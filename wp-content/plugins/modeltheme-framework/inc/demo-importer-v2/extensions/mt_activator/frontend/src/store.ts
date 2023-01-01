import {ref} from "vue";

const store = ref({} as {
    nonce: string;
    install: string;
    code: string;
    tid: string;
    apiLocation: string;
});

export default store ;
