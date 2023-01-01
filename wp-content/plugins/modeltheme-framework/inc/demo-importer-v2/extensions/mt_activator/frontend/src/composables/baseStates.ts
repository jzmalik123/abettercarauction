import {inject, ref} from "vue";
export const forceReRender = ref<boolean>(false);

export const isLoading = ref<boolean>(false);
export const loadingMessage = ref<string>("Loading...");

export const isError = ref<boolean>(false);
export const errorMessage = ref<string>("An unexpected error has occurred");

