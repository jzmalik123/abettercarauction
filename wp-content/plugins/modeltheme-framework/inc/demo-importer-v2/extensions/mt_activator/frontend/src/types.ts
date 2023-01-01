import {Ref} from "vue";

export interface UserDataF {
    userDataSource: Ref<Object>;
    userDataSourceIsLoading: Object;
    loadUserData: Object;
    userColumns: Object[];
}
export interface PluginDataF {
    pluginDataSource: Ref<PluginData[] | undefined>;
    pluginDataSourceIsLoading: Ref<boolean>;
    loadPluginData: () => void;
    pluginColumns: Object[];
}
export interface FormState {
    code: string;
    acceptTerms: boolean;
}
export interface PluginData {
    name: string;
    author: string;
    version: string;
    textDomain: string;
    description: string;
    active: boolean;
}
