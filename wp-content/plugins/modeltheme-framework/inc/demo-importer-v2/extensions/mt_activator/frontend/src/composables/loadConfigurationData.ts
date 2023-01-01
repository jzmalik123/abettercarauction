import { ref } from "vue";
import instance from "../localInstance";

interface ConfigurationData {
  name: string;
  author: string;
  version: string;
  textDomain: string;
  description: string;
  active: boolean;
}

export default () => {
  const configurationDataSource = ref<ConfigurationData[]>();
  const configurationDataSourceIsLoading = ref(true);

  const loadConfigurationData = () => {
    const instanceObject = instance();

    instanceObject
      .get<ConfigurationData[]>("getSystemData")
      .then(({ data }) => {
        configurationDataSource.value = data;
        configurationDataSourceIsLoading.value = false;
      });
  };

  loadConfigurationData();

  const configurationColumns = [
    {
      title: "Config Name",
      dataIndex: "title",
      key: "title",
    },
    {
      title: "Current",
      dataIndex: "value",
      key: "value",
      align: "center",
    },
    {
      title: "Recommended",
      dataIndex: "required",
      key: "required",
      align: "center",
    },
    {
      title: "Passed",
      dataIndex: "pass",
      key: "pass",
      slots: { customRender: "pass" },
      align: "center",
    },
  ];

  return {
    configurationDataSource,
    configurationDataSourceIsLoading,
    loadConfigurationData,
    configurationColumns
  };
};
