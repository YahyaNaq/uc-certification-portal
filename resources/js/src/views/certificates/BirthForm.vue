<template>
    <h1 class="fs-3 mb-4">Birth Certificate Form</h1>
    <Form @submit="onSubmit" :validation-schema="schema">
        <div class="d-flex align-items-start justify-content-between mb-5 gap-3">
            <div class="row col-md-6">
                <div class="row">
                    <div class="form-group col-md-7 mb-3">
                        <label for="applicantName" class="mb-2">Applicant Name</label>
                        <Field 
                            id="applicantName" 
                            name="applicantName" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('applicantName', $event.target.value)"
                        />
                        <ErrorMessage name="applicantName" class="text-danger" />
                    </div>

                    <div class="form-group col-md-5 mb-3">
                        <label for="applicantCnic" class="mb-2">Applicant CNIC No.</label>
                        <Field 
                            id="applicantCnic" 
                            name="applicantCnic" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('applicantCnic', $event.target.value)"
                        />
                        <ErrorMessage name="applicantCnic" class="text-danger" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 mb-3">
                        <label for="fatherName" class="mb-2">Father Name</label>
                        <Field 
                            id="fatherName" 
                            name="fatherName" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('fatherName', $event.target.value)"
                        />
                        <ErrorMessage name="fatherName" class="text-danger" />
                    </div>

                    <div class="form-group col-md-5 mb-3">
                        <label for="fatherCnic" class="mb-2">Father CNIC No.</label>
                        <Field 
                            id="fatherCnic" 
                            name="fatherCnic" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('fatherCnic', $event.target.value)"
                        />
                        <ErrorMessage name="fatherCnic" class="text-danger" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 mb-3">
                        <label for="motherName" class="mb-2">Mother Name</label>
                        <Field 
                            id="motherName" 
                            name="motherName" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('motherName', $event.target.value)"
                        />
                        <ErrorMessage name="motherName" class="text-danger" />
                    </div>

                    <div class="form-group col-md-5 mb-3">
                        <label for="motherCnic" class="mb-2">Mother CNIC No.</label>
                        <Field 
                            id="motherCnic" 
                            name="motherCnic" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('motherCnic', $event.target.value)"
                        />
                        <ErrorMessage name="motherCnic" class="text-danger" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 mb-3">
                        <label for="grandFatherName" class="mb-2">Grand Father Name</label>
                        <Field 
                            id="grandFatherName" 
                            name="grandFatherName" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('grandFatherName', $event.target.value)"
                        />
                        <ErrorMessage name="grandFatherName" class="text-danger" />
                    </div>

                    <div class="form-group col-md-5 mb-3">
                        <label for="grandFatherCnic" class="mb-2">Grand Father CNIC No.</label>
                        <Field 
                            id="grandFatherCnic" 
                            name="grandFatherCnic" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('grandFatherCnic', $event.target.value)"
                        />
                        <ErrorMessage name="grandFatherCnic" class="text-danger" />
                    </div>
                </div>
            </div>
            <div class="vr text-success opacity-100" style="width: 0.2%;"></div>
            <div class="row col-md-6">
                <div class="row">
                    <div class="form-group col-md-4 mb-3">
                        <label for="religion" class="mb-2">Religion</label>
                        <Field 
                            id="religion" 
                            name="religion" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('religion', $event.target.value)"
                        />
                        <ErrorMessage name="religion" class="text-danger" />
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="gender" class="mb-2">Gender</label>
                        <Field 
                            id="gender" 
                            name="gender" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('gender', $event.target.value)"
                        />
                        <ErrorMessage name="gender" class="text-danger" />
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="districtOfBirth" class="mb-2">District of Birth</label>
                        <Field 
                            id="districtOfBirth" 
                            name="districtOfBirth" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('districtOfBirth', $event.target.value)"
                        />
                        <ErrorMessage name="districtOfBirth" class="text-danger" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="homeOrHospital" class="mb-2">Home / Hospital</label>
                        <Field 
                            id="homeOrHospital" 
                            name="homeOrHospital" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('homeOrHospital', $event.target.value)"
                        />
                        <ErrorMessage name="homeOrHospital" class="text-danger" />
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="disability" class="mb-2">Disability</label>
                        <Field 
                            id="disability" 
                            name="disability" 
                            type="text" 
                            class="form-control"
                            @change="setFieldValue('disability', $event.target.value)"
                        />
                        <ErrorMessage name="disability" class="text-danger" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="address" class="mb-2">Address</label>
                        <Field 
                            as="textarea"
                            id="address" 
                            name="address" 
                            class="form-control"
                            @change="setFieldValue('address', $event.target.value)"
                        />
                        <ErrorMessage name="address" class="text-danger" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1 class="fs-6 text-uppercase col-md-1">S.no</h1>
            <h1 class="fs-6 text-uppercase col-md-4">Child name</h1>
            <h1 class="fs-6 text-uppercase col-md-4">Date of Birth</h1>
        </div>
        <div
            v-for="(field, index) in fields"
            :key="field.key"
            class="form-group mb-3"
            >
            <div class="d-flex gap-3">
                <div class="d-flex gap-3 col-md-8">
                    <span class="col-md-1 fs-5">{{ index + 1 }}</span>
                    <Field
                        :name="`children[${index}].name`"
                        type="text"
                        class="form-control"
                        @change="setFieldValue(`children[${index}].name`, $event.target.value)"
                        />
                        <ErrorMessage :name="`children[${index}].name`" class="text-danger" />
                        <Field
                        :name="`children[${index}].dateOfBirth`"
                        type="date"
                        class="form-control"
                        @change="setFieldValue(`children[${index}].dateOfBirth`, $event.target.value)"
                    />
                    <ErrorMessage :name="`children[${index}].dateOfBirth`" class="text-danger" />
                </div>
                <button v-if="index > 0" type="button" @click="remove(index)" class="btn btn-danger">
                    <i class="bi bi-trash3 text-light"></i>
                </button>
                <button v-if="index == 0" type="button" @click="push({ name: '', dateOfBirth: '' })" class="btn btn-dark">
                    <i class="bi bi-plus-lg fs-6 text-light"></i>
                </button>
            </div>
        </div>

        <div class="container d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </Form>

</template>

<script>
import { Form, Field, ErrorMessage, useForm, useFieldArray } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';
import { toast } from "vue3-toastify";

export default {
    components: {
        Form,
        Field,
        ErrorMessage,
    },
    setup() {
        // Define validation schema
        const schema = yup.object({
            applicantName: yup.string().required('Applicant Name is required.'),
            applicantCnic: yup.string().required('Applicant CNIC No. is required.'),
            fatherName: yup.string().required('Father Name is required.'),
            fatherCnic: yup.string().required('Father CNIC No. is required.'),
            motherName: yup.string().required('Mother Name is required.'),
            motherCnic: yup.string().required('Mother CNIC No. is required.'),
            religion: yup.string().required('Religion is required.'),
            gender: yup.string().required('Gender is required.'),
            districtOfBirth: yup.string().required('District of Birth is required.'),
            homeOrHospital: yup.string().required('Home / Hospital is required.'),
            disability: yup.string().required('Disability is required.'),
            grandFatherName: yup.string().required('Grand Father Name is required.'),
            grandFatherCnic: yup.string().required('Grand Father CNIC No. is required.'),
            address: yup.string().required('Address is required.'),
            // applicantSignature: yup.string().required('Applicant Signature is required.'),
            // cellNo: yup.string().required('Cell No. is required.'),
        });

        // Initialize form
        const { setFieldValue, errors, handleSubmit } = useForm({
            initialValues: {
                applicantName: '',
                applicantCnic: '',
                fatherName: '',
                fatherCnic: '',
                motherName: '',
                motherCnic: '',
                religion: '',
                gender: '',
                districtOfBirth: '',
                homeOrHospital: '',
                disability: '',
                grandFatherName: '',
                grandFatherCnic: '',
                address: '',
                // applicantSignature: '',
                // cellNo: '',
                children: [{ name: '', dateOfBirth: '' }], // Initialize children array if needed
            },
            validateOnChange: true,
        });

        const { remove, push, fields } = useFieldArray('children');

        // Handle form submission
        const onSubmit = handleSubmit(async (formValues) => {
            console.log(formValues.children);
            await axios
            .post('/api/certificates/birth-certificates/store', formValues)
            .then((response) => {
                toast("Form submitted successfully", {
                    "type": "success",
                    "dangerouslyHTMLString": true
                });
            }).catch((error) => {
                toast("Something went wrong!", {
                    "type": "error",
                    "dangerouslyHTMLString": true
                });
            });
        });

        return {
            schema,
            errors,
            fields,
            remove,
            push, 
            setFieldValue,
            onSubmit,
        };
    },
};
</script>

<style scoped>
/* Add any styles you need here */
</style>
