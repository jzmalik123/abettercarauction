<script setup lang="ts">
import { inject, Ref, ref } from "vue";
import {
  CheckCircleFilled,
  InfoCircleFilled,
  CloseCircleFilled,
} from "@ant-design/icons-vue";
import loadConfigurationData from "../composables/loadConfigurationData";
import { PluginData } from "../types";
import { UserData } from "../composables/loadUserData";
import store from "../store";
const props = defineProps<{
  userData: {
    userDataSource: Ref<UserData| undefined>;
    userDataSourceIsLoading:  Ref<boolean>;
    loadUserData:  () => void;
    userColumns: Object[];
  };
  pluginData: {
    pluginDataSource: Ref<PluginData[] | undefined>;
    pluginDataSourceIsLoading: Ref<boolean>;
    loadPluginData: () => void;
    pluginColumns: Object[];
  };
}>();
const activeKey = ref("1");
const isCopied = ref(false);
const nonce: string = store.value.nonce;
const install: string = store.value.install;
const apiLocation: string = store.value.apiLocation;

const {
  configurationDataSource,
  configurationDataSourceIsLoading,
  configurationColumns,
} = loadConfigurationData();

const copyURL  = async (mytext: Object) =>{
  try {
    isCopied.value =true;
    await navigator.clipboard.writeText(JSON.stringify(mytext));
  } catch ($e) {
    isCopied.value = false;
  }
}
const showCopy = location.protocol === 'https:';
</script>

<template>
  <a-card title="Settings Overview">
    <template #extra><a v-if="showCopy" @click="copyURL([configurationDataSource, pluginData])" href="#">{{ isCopied ? "Copied" : "Copy"}}</a></template>

    <a-tabs v-model:activeKey="activeKey">
      <a-tab-pane key="1" tab="Configuration">
        <p>Here is an overview of your current server configuration info. Learn how to optimize your server for our themes <a href="https://modeltheme.com/how-to-optimize-server-requirements-for-modeltheme-wordpress-themes/">here.</a></p>
        <br/>
        <a-table
          :x="4"
          :loading="configurationDataSourceIsLoading"
          :dataSource="configurationDataSource"
          :columns="configurationColumns"
          :pagination="false"
        >
          <template #pass="{ text: pass, record }">
            <template v-if="pass === true">
              <CheckCircleFilled :style="{ color: '#52C41A' }" />
            </template>
            <a-tooltip placement="left" v-else :title="record.notice">
              <CloseCircleFilled :style="{ color: '#FF4D4F' }" />
            </a-tooltip>
          </template>
        </a-table>
      </a-tab-pane>
      <a-tab-pane key="2" tab="Installed Plugins">
        <a-table
          :loading="pluginData.pluginDataSourceIsLoading.value"
          :dataSource="pluginData.pluginDataSource.value"
          :columns="pluginData.pluginColumns"
        >
          <template #status="{ text: status }">
            <template v-if="status === true">
              <a-tooltip placement="top" title="Installed">
                <CheckCircleFilled :style="{ color: '#52C41A' }" />
              </a-tooltip>
            </template>
            <template v-else>
              <a-tooltip placement="top" title="Not installed">
                <InfoCircleFilled :style="{ color: '#1890FF' }" />
              </a-tooltip>
            </template>
          </template>
        </a-table>
      </a-tab-pane>
      <a-tab-pane key="3" tab="User data">
        <a-table
          :loading="userData.userDataSourceIsLoading.value"
          :dataSource="userData.userDataSource.value"
          :columns="userData.userColumns"
          :pagination="false"
        />
      </a-tab-pane>
    </a-tabs>
  </a-card>
</template>

<style scoped>
:deep(.ant-table-tbody > tr > td) {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 110px;
}
</style>
