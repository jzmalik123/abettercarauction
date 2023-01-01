import { ref } from "vue";
import instance from "../localInstance";

export interface UserData {
  key: string;
  value: string;
}

export default () => {
  const instanceObject = instance();

  const userDataSource = ref();
  const userDataSourceIsLoading = ref(true);
  const loadUserData = () => {
    instanceObject.get<UserData[]>("userContactData").then(({ data }) => {
      userDataSource.value = data;
      userDataSourceIsLoading.value = false;
    });
  };

  loadUserData();

  const userColumns = [
    {
      title: "Name",
      dataIndex: "key",
      key: "key",
    },
    {
      title: "Value",
      dataIndex: "value",
      key: "value",
    },
  ];

  return {
    userDataSource,
    userDataSourceIsLoading,
    loadUserData,
    userColumns
  };
};
