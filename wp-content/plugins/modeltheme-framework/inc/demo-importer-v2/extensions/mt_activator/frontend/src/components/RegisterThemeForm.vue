<script setup lang="ts">
import {
  reactive,
  ref,
  UnwrapRef,
} from "vue";
import { Rule } from "ant-design-vue/es/form/interface";
import {FormState, PluginDataF, UserDataF} from "../types";
import {errorMessage, forceReRender, isError, isLoading} from "../composables/baseStates";
import submitCode from "../composables/submitCode";
import {QuestionCircleOutlined} from "@ant-design/icons-vue"
import localInstance from "../localInstance";
import reloadPage from "../composables/reloadPage";

const formState: UnwrapRef<FormState> = reactive({
  code: "",
  acceptTerms: false,
});
const formRef = ref();

const rules = {
  code: [
    {
      validator: (rule: Rule, value: boolean) => {
        if (!value) {
          return Promise.reject("You must enter your purchase code.");
        }
        return Promise.resolve();
      },
    },
    {
      validator: (rule: Rule, value: string) => {
        const valueAsNumber: number = value.length;
        if (valueAsNumber !== 36) {
          return Promise.reject("Length should be 36 characters including '-'");
        }
        return Promise.resolve();
      },
    },
    {
      validator: (rule: Rule, value: string) => {
        if (
          !(
            /^[0-9A-F]{8}-[0-9A-F]{4}-[1][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i.test(
              value
            ) ||
            /^[0-9A-F]{8}-[0-9A-F]{4}-[2][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i.test(
              value
            ) ||
            /^[0-9A-F]{8}-[0-9A-F]{4}-[3][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i.test(
              value
            ) ||
            /^[0-9A-F]{8}-[0-9A-F]{4}-[4][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i.test(
              value
            ) ||
            /^[0-9A-F]{8}-[0-9A-F]{4}-[5][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i.test(
              value
            )
          )
        ) {
          return Promise.reject("Invalid code format");
        }
        return Promise.resolve();
      },
    },
  ],
  acceptTerms: [
    {
      type: "boolean",
      validator: (rule: Rule, value: boolean) => {
        if (!value) {
          return Promise.reject(
            "You must accept our Terms And Conditions in order to activate"
          );
        }
        return Promise.resolve();
      },
    },
  ],
};

const props = defineProps<{
  userData: UserDataF;
  pluginData: PluginDataF;
}>();

const onSubmit = () => {
    formRef.value.validate().then(() => {
        submitCode(formState, props.pluginData, props.userData)
  });
};

const checkForActive = () => {
    isLoading.value = true;
    formRef.value.validate().then(() => {
        localInstance()
            .post("save-api", {code: formState.code})
            .then(() => {
                isLoading.value = false;
                reloadPage()
            }).catch((error) => {
            isError.value = !error.response.data.success;
            forceReRender.value = true;
            errorMessage.value = error.response.data.message;
            isLoading.value = false;
        });
    });
}
</script>

<template>
  <a-card title="Registration">
    <p>
      Please input the purchase code you received with the theme in order to
      activate your copy of the theme.
    </p>
    <a-alert
      v-if="!isLoading && forceReRender"
      :message="
        !isError ? 'License activated!' : 'Invalid license key!'
      "
      :description="errorMessage"
      :type="!isError ? 'success' : 'error'"
      show-icon
    />
      <a-form ref="formRef" :rules="rules" :model="formState">
        <a-form-item
          :labelCol="{ span: 24 }"
          label="Purchase Code"
          has-feedback
          ref="codeRef"
          name="code"
        >
          <a-input
            v-model:value="formState.code"
            autocomplete="off"
            placeholder="XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX"
          />
        </a-form-item>

        <a-form-item name="acceptTerms" ref="acceptTermsRef">
          <a-checkbox v-model:checked="formState.acceptTerms">
            I Agree to the
            <a target="_blank" href="https://modeltheme.com/terms-conditions/">
              Terms and Condition
            </a>
            and
            <a target="_blank" href="https://modeltheme.com/privacy-policy/">
              Privacy Policy
            </a>
          </a-checkbox>
        </a-form-item>

        <a-form-item>
            <a-space>
                <a-button type="primary" @click="onSubmit">Activate</a-button>
                <a-button type="dashed" @click="checkForActive">Check for active license</a-button>
                <a-tooltip title="If you already activated your license on this website and in the meantime you uninstalled wordpress click the 'Check for active license' button. ">
                    <QuestionCircleOutlined/>
                </a-tooltip>
            </a-space>
        </a-form-item>
      </a-form>
  </a-card>
</template>

<style></style>
