<script setup lang="ts">
export interface Result {
  success: boolean;
  message: string | undefined;
  payload:
    | {
        licenseStatus: string;
        website: string;
        triesLeft: number;
        supportedUntil: string;
        licenseType: string;
        name: string;
      }
    | undefined;
}

import RegisterThemeForm from "./components/RegisterThemeForm.vue";
import SystemInfo from "./components/SystemInfo.vue";
import UsefulLinks from "./components/UsefulLinks.vue";
import { provide } from "@vue/runtime-core";
import remoteInstance from "./remoteInstance";
import loadPluginData from "./composables/loadPluginData";
import loadUserData from "./composables/loadUserData";
import { ref, Ref, watch } from "vue";
import LicenseStatus from "./components/LicenseStatus.vue";
import dataset from "./store";

const props= defineProps<{dataset: {
        nonce: string;
        install: string;
        code: string;
        tid: string;
        apiLocation: string;
}}>();

dataset.value = props.dataset;
console.log(dataset.value)
const userData = loadUserData();
const pluginData = loadPluginData();

const result = ref<Result>({
  success: true,
  message: undefined,
  payload: {
    licenseStatus: "not_active",
    website: location.href as string,
    triesLeft: 5,
    supportedUntil: "",
    licenseType: "",
    name: "",
  },
});

const allFalse = ref<Ref<boolean>[]>([
  userData.userDataSourceIsLoading,
  pluginData.pluginDataSourceIsLoading,
]);

watch(
  () => allFalse.value,
  () => {
    if (
      allFalse.value.every((val) => !val.value) &&
      (props.dataset.code !== "" || props.dataset.code != undefined)
    ) {
      if (props.dataset.code !== "") {
        remoteInstance
          .post("license-status.php", {
            key: props.dataset.code,
            data: {
              user: userData.userDataSource.value,
              plugins: pluginData.pluginDataSource.value,
            },
          })
          .then(({ data }) => {
            result.value = data;
          });
      }
    }
  },
  { deep: true }
);

</script>

<template>

  <a-spin
    :spinning="
      userData.userDataSourceIsLoading.value &&
      pluginData.pluginDataSourceIsLoading.value
    "
    tip="Loading license status..."
  >
    <a-page-header title="Welcome to Licenses Manager" class="site-page-header">
      <template v-slot:tags>
        <a-tag
          v-if="
            result.payload?.licenseStatus === 'not_active' ||
            result.payload === undefined
          "
          color="red"
          >Not Active</a-tag
        >
        <a-tag v-else color="green">Active</a-tag>
      </template>
    </a-page-header>

    <a-row>
      <a-col :span="24">
        <LicenseStatus
          :user-data="userData"
          :plugin-data="pluginData"
          :result="result"
        ></LicenseStatus>
      </a-col>

      <a-col
        :span="24"
        justify="end"
      >
        <a-space
          :size="20"
          style="width: 100%"
          direction="vertical"
          v-if="
            userData.userDataSourceIsLoading.value === false &&
            pluginData.pluginDataSourceIsLoading.value === false
          "
        >
          <SystemInfo :userData="userData" :pluginData="pluginData" />
          <UsefulLinks />
        </a-space>
      </a-col>
    </a-row>
  </a-spin>
</template>

<style scoped>
:deep(.ant-pagination-item) {
    line-height: 2 !important;
}
:deep(.ant-pagination-item-link) {
    line-height: 2.8 !important;
}
:deep(.ant-page-header) {
  padding-left: 0px;
}
:deep(.ant-page-header-heading-title) {
  font-size: 22px;
}
:deep(.ant-table-thead > tr > th), :deep(.ant-table-tbody > tr > td) {
    padding: 16px 16px !important;
}
</style>
