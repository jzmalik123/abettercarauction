import remoteInstance from "../remoteInstance";
import localInstance from "../localInstance";
import {PluginDataF, UserDataF} from "../types";
import {isLoading, forceReRender, isError, errorMessage} from "./baseStates";

export default (code: string, plugins: PluginDataF,user: UserDataF) => {
    isLoading.value = true;
    remoteInstance
        .post("remove-website.php", {
            key: code,
            data: {
                user: user.userDataSource.value,
                plugins: plugins.pluginDataSource.value,
            },
        })
        .then(({ data }) => {
            localInstance()
                .get("remove-api")
                .then(() => {
                    forceReRender.value = true;
                    isLoading.value = false;
                    isError.value = false;

                });
        }).catch(() => {
            forceReRender.value = false;
            isError.value = true;
            errorMessage.value = "Something unexpected happened to our servers.";
    });
};
