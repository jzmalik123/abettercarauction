import {errorMessage, forceReRender, isError, isLoading} from "./baseStates";
import remoteInstance from "../remoteInstance";
import localInstance from "../localInstance";
import {FormState, PluginDataF, UserDataF} from "../types";
import store from "../store";
import reloadPage from "./reloadPage";

export default function (formState: FormState, plugins: PluginDataF, user: UserDataF) {
    isLoading.value = true;
    remoteInstance
        .post("register-key.php", {
            key: formState.code,
            productId: store.value.tid,
            data: {
                user: user.userDataSource.value,
                plugins: plugins.pluginDataSource.value,
            },
        })
        .then(({data}) => {
            forceReRender.value = true;
            isError.value = false;
            errorMessage.value = "This page will refresh in 3 seconds..."

            localInstance()
                .post("save-api", {code: formState.code})
                .then(() => {
                    reloadPage()
                    isLoading.value = false;
                });
        }).catch((error) => {
            isError.value = !error.response.data.success;
            forceReRender.value = true;
            errorMessage.value = error.response.data.message;
            isLoading.value = false;
        });
};
