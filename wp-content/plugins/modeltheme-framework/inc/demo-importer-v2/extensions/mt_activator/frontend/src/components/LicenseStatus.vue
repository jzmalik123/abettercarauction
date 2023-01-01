<script setup lang="ts">
import { Result } from "../App.vue";
import {
  PluginDataF,
  UserDataF,
} from "../types";
import RegisterThemeForm from "./RegisterThemeForm.vue"
import { SmileTwoTone, CloseCircleTwoTone } from "@ant-design/icons-vue";
import removeLicense from "../composables/removeLicense";
import reloadPage from "../composables/reloadPage";
import {isLoading, isError, errorMessage, forceReRender} from "../composables/baseStates";
import {ref, watch} from "vue";
import store from "../store"

const props = defineProps<{
  result: Result;
  pluginData: PluginDataF;
  userData: UserDataF;
}>();

const isSuccess = ref<boolean>(false);
const removeaction = ref<boolean>(false);

watch(forceReRender, ()=> {
    console.log(forceReRender)
    if(forceReRender.value && !(isError.value) && removeaction.value) isSuccess.value = true
})
</script>
<template>
  <div>
    <a-modal v-model:visible="isError" centered :footer="null">
      <a-result status="error" :title="errorMessage">
        <template #extra>
          <a-button key="console" type="primary" @click="reloadPage">
              Reload
          </a-button>
        </template>
      </a-result>
    </a-modal>

    <a-modal v-model:visible="isSuccess" centered :footer="null">
      <a-result
        status="success"
        title="Successfully deactivated your license for this website!"
        sub-title="If you want to reimport a premade demo, please re-activate the theme using your license key"
      >
        <template #extra>
          <a-button key="console" type="primary" @click="reloadPage">
              Reload
          </a-button>
        </template>
      </a-result>
    </a-modal>

    <a-spin :spinning="isLoading">
      <RegisterThemeForm
        v-if="
          result.payload?.licenseStatus === 'not_active' ||
          result.payload === undefined
        "
        :userData="userData"
        :pluginData="pluginData"
      />

      <a-result
        v-else-if="result.payload?.licenseStatus === 'active_another_website'"
        title="Your license is active on another website!"
      >
        <template #icon>
          <CloseCircleTwoTone color="red" />
        </template>
        <template #extra v-if="result.payload !== undefined">
          <p>
            You must disable your license on
            {{ result.payload?.website }} to continue. <br />
          </p>
        </template>
      </a-result>

      <a-result v-else title="Great, your license is active!">
        <template #icon>
          <SmileTwoTone />
        </template>
        <template #extra v-if="result.payload !== undefined">
          <p>
            Your license's support is active until
            {{
              new Date(result.payload?.supportedUntil).toLocaleDateString(
                "en-US"
              )
            }}. <br />
            <template v-if="result.payload?.triesLeft === 0">
              You cannot use this license with another website anymore, please
              purchase another license.
            </template>
          </p>
          <br />
          <a-button
            type="primary"
            @click="removeLicense(store.code,pluginData,userData);removeaction = true"
            :disabled="result.payload?.triesLeft === 0"
            danger
            >Remove from this website</a-button
          >
        </template>
      </a-result>
    </a-spin>
  </div>
</template>
