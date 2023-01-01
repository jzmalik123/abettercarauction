import { ref } from "vue";
import instance from "../localInstance";
import {PluginData} from "../types";

export default () => {
  const instanceObject = instance();
  const pluginDataSource = ref<PluginData[]>();
  const pluginDataSourceIsLoading = ref(true);

  const loadPluginData = () => {
    instanceObject.get<PluginData[]>("plugins").then(({ data }) => {
      pluginDataSource.value = data;
      pluginDataSourceIsLoading.value = false;
    });
  };

  const pluginColumns = [
    {
      title: "Name",
      dataIndex: "name",
      key: "name",
      width: "150px",
    },
    {
      title: "Installed",
      dataIndex: "active",
      key: "active",
      slots: { customRender: "status" },
      width: "100px",
      align: "center",
    },
    {
      title: "Version",
      dataIndex: "version",
      key: "version",
      width: "100px",
      align: "center",
    },
  ];

  loadPluginData();

  return {
      pluginDataSource,
      pluginDataSourceIsLoading,
      loadPluginData,
      pluginColumns
  }
};
