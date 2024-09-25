<template>
    <div class="card flex justify-content-center">
        <Dialog
            :visible="visible"
            modal
            :pt="{
                root: 'border-none',
                mask: {
                    style: 'backdrop-filter: blur(2px)'
                }
            }"
        >
            <template #container="{ closeCallback }">
                <Form @submit="onSubmit">
                    <div class="d-flex flex-column px-5 py-5 gap-4 bg-success" style="border-radius: 12px;">
                        <div class="d-inline-flex flex-column gap-2">
                            <label for="username" class="text-light fw-semibold">Username</label>
                            <InputText
                                id="username"
                                class="bg-white border-none text-muted w-20rem"
                                @change="(e) => setFieldValue('email', e.target.value)"
                            ></InputText>
                        </div>
                        <div class="d-inline-flex flex-column gap-2">
                            <label for="password" class="text-light fw-semibold">Password</label>
                            <InputText
                                id="password"
                                class="bg-white border-none text-muted w-20rem"
                                type="password"
                                @change="(e) => setFieldValue('password', e.target.value)"
                            ></InputText>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <Button label="Cancel" @click="closeModal(closeCallback)" text rounded class="rounded w-100 text-light border-1 border-white hover:bg-light"></Button>
                            <Button label="Sign-In" type="submit" text rounded class="rounded w-100 text-light border-1 border-white hover:bg-light"></Button>
                        </div>
                    </div>
                </Form>
            </template>
        </Dialog>
    </div>
</template>

<script setup>
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import { Form, ErrorMessage, useForm } from 'vee-validate';
import axios from "axios";
import { login } from '@/services/authService';

const { values, setFieldValue, errors, handleSubmit } = useForm();

const onSubmit = handleSubmit(async (creds) => {

    try {
        response = await login(creds);
        console.log(response);
    } catch (error) {
        console.log(error);
    }
});

const props = defineProps({
    visible: Boolean
});

const emit = defineEmits(['update:visible']);

// Watch for changes in visible prop
const closeModal = () => {
  emit('update:visible', false); // Emit the event to close the modal
};

</script>