<template>
    <h1 class="fs-3 mb-4">Birth Certificate Form</h1>
    <Form @submit="onSubmit" :validation-schema="schema">
        <div class="d-flex align-items-start justify-content-between mb-5 gap-3">
            <div class="row col-md-6">
                <div class="row">
                    <div class="form-group col-md-7 mb-3">
                        <label for="applicantName" class="mb-2">Applicant Name</label>
                        <InputText
                            type="text"
                            id="applicantName"
                            @change="(e) => handleInputChange(e, 'applicantName')"
                            class="col-md-12 py-1"
                        />
                        <ErrorMessage name="applicantName" class="text-danger" />
                    </div>

                    <div class="form-group col-md-5 mb-3">
                        <label for="applicantCnic" class="mb-2">Applicant CNIC No.</label>
                        <InputMask
                            id="applicantCnic"
                            @change="(e) => handleInputChange(e, 'applicantCnic')"
                            class="col-md-12 py-1"
                            mask="99999-9999999-9"
                        />
                        <ErrorMessage name="applicantCnic" class="text-danger" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 mb-3">
                        <label for="fatherName" class="mb-2">Father Name</label>
                        <InputText
                            type="text"
                            id="fatherName"
                            @change="(e) => handleInputChange(e, 'fatherName')"
                            class="col-md-12 py-1"
                        />
                        <ErrorMessage name="fatherName" class="text-danger" />
                    </div>

                    <div class="form-group col-md-5 mb-3">
                        <label for="fatherCnic" class="mb-2">Father CNIC No.</label>
                        <InputMask
                            id="fatherCnic"
                            @change="(e) => handleInputChange(e, 'fatherCnic')"
                            class="col-md-12 py-1"
                            mask="99999-9999999-9"
                        />
                        <ErrorMessage name="fatherCnic" class="text-danger" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 mb-3">
                        <label for="motherName" class="mb-2">Mother Name</label>
                        <InputText
                            type="text"
                            id="motherName"
                            @change="(e) => handleInputChange(e, 'motherName')"
                            class="col-md-12 py-1"
                        />
                        <ErrorMessage name="motherName" class="text-danger" />
                    </div>

                    <div class="form-group col-md-5 mb-3">
                        <label for="motherCnic" class="mb-2">Mother CNIC No.</label>
                        <InputMask
                            id="motherCnic"
                            @change="(e) => handleInputChange(e, 'motherCnic')"
                            class="col-md-12 py-1"
                            mask="99999-9999999-9"
                        />
                        <ErrorMessage name="motherCnic" class="text-danger" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 mb-3">
                        <label for="grandFatherName" class="mb-2">Grand Father Name</label>
                        <InputText
                            type="text"
                            id="grandFatherName"
                            @change="(e) => handleInputChange(e, 'grandFatherName')"
                            class="col-md-12 py-1"
                        />
                        <ErrorMessage name="grandFatherName" class="text-danger" />
                    </div>

                    <div class="form-group col-md-5 mb-3">
                        <label for="grandFatherCnic" class="mb-2">Grand Father CNIC No.</label>
                        <InputMask
                            id="grandFatherCnic"
                            @change="(e) => handleInputChange(e, 'grandFatherCnic')"
                            class="col-md-12 py-1"
                            mask="99999-9999999-9"
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
                        <InputText
                            type="text"
                            id="religion"
                            @change="(e) => handleInputChange(e, 'religion')"
                            class="col-md-12 py-1"
                        />
                        <ErrorMessage name="religion" class="text-danger" />
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="gender" class="mb-2">Gender</label>
                        <Field id="gender" name="gender" type="select" class="form-control py-1"
                            @change="setFieldValue('gender', $event.target.value)" />
                        <!-- <Dropdown 
                            :options="genderOptions"
                            optionLabel="name"
                            optionValue="code"
                            placeholder="Select Gender"
                            class="col-md-12"
                            size="small"
                            @change="(e) => handleInputChange(e, 'gender', true)"
                        /> -->
                        <ErrorMessage name="gender" class="text-danger" />
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="districtOfBirth" class="mb-2">District of Birth</label>
                        <InputText
                            type="text"
                            id="districtOfBirth"
                            @change="(e) => handleInputChange(e, 'districtOfBirth')"
                            class="col-md-12 py-1"
                        />
                        <ErrorMessage name="districtOfBirth" class="text-danger" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="homeOrHospital" class="mb-2">Home / Hospital</label>
                        <InputText
                            type="text"
                            id="homeOrHospital"
                            @change="(e) => handleInputChange(e, 'homeOrHospital')"
                            class="col-md-12 py-1"
                        />
                        <ErrorMessage name="homeOrHospital" class="text-danger" />
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="disability" class="mb-2">Disability</label>
                        <InputText
                            type="text"
                            id="disability"
                            @change="(e) => handleInputChange(e, 'disability')"
                            class="col-md-12 py-1"
                        />
                        <ErrorMessage name="disability" class="text-danger" />
                    </div>
                    <div class="form-group col-md-5 mb-3">
                        <label for="cellNo" class="mb-2">Cell No.</label>
                        <InputMask
                            id="cellNo"
                            @change="(e) => handleInputChange(e, 'cellNo')"
                            class="col-md-12 py-1"
                            mask="9999-9999999"
                        />
                        <ErrorMessage name="cellNo" class="text-danger" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="address" class="mb-2">Address</label>
                        <Textarea
                            rows="2"
                            cols="54"
                            @change="(e) => handleInputChange(e, 'address')"
                        />
                        <ErrorMessage name="address" class="text-danger" />
                    </div>
                </div>
            </div>
        </div>
        <h1 class="fs-5 fw-bold mb-4">Children Details</h1>
        <div class="d-flex gap-3 col-md-8 mb-2">
            <small class="fs-6 col-md-1 text-center fw-semibold">S.no</small>
            <small class="fs-6 col-md-5 fw-semibold">Child name</small>
            <small class="fs-6 col-md-4 fw-semibold">Date of Birth</small>
        </div>
        <div v-for="(field, index) in fields" :key="field.key" class="form-group mb-3">
            <div class="d-flex gap-3">
                <div class="d-flex gap-3 col-md-8">
                    <span class="col-md-1 fs-5 align-self-center text-center">{{ index + 1 }}</span>
                    <div class="col-md-5">
                        <Field :name="`children[${index}].name`" type="text" class="form-control py-1"
                            @change="setFieldValue(`children[${index}].name`, $event.target.value)" />
                        <ErrorMessage :name="`children[${index}].name`" class="text-danger" />
                    </div>
                    <div class="col-md-3">
                        <!-- <input :name="`children[${index}].dateOfBirth`" type="date"
                            @change="setFieldValue(`children[${index}].dateOfBirth`, $event.target.value)"
                            class="form-control py-1" data-provide=datepicker /> -->
                        <Calendar
                            @update:modelValue="(e) => handleInputChange(e, `children[${index}].dateOfBirth`, 'datepicker')"
                            :modelValue="values.children[index].dateOfBirth"
                            showIcon iconDisplay="input"
                            inputClass="py-1"
                        />
                        <!-- <DatePicker
                            @change="setFieldValue(`children[${index}].dateOfBirth`, $event.target.value)"
                            inputClass="bg-white rounded py-1 border text-dark"
                            panelClass="bg-whit ext-dark"
                        /> -->
                        <ErrorMessage :name="`children[${index}].dateOfBirth`" class="text-danger" />
                    </div>
                    <button v-if="index > 0" type="button" @click="remove(index)" class="btn btn-danger py-1" style="padding-left: 10px; padding-right: 10px;">
                        <i class="bi bi-trash3"></i>
                    </button>
                    <button v-if="index == 0" type="button" @click="push({ name: '', dateOfBirth: '' })"
                        class="btn btn-dark px-2 py-0">
                        <i class="bi bi-plus-lg fs-5"></i>
                    </button>
                </div>
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
import InputMask from 'primevue/inputmask';
import InputText from 'primevue/inputtext';
import Dropdown from 'primevue/dropdown';
import Calendar from 'primevue/calendar';
import Textarea from 'primevue/textarea';
import { ref } from 'vue';


export default {
    components: {
        Form,
        Field,
        ErrorMessage,
        InputMask,
        InputText,
        Textarea,
        Dropdown,
        Calendar
    },
    setup() {

        // Define validation schema
        const date = ref();

        const genderOptions = ref([
            { name: 'Male', code: 'M' },
            { name: 'Female', code: 'F' },
        ]);
        const schema = yup.object({
            // applicantName: yup.string().required('Applicant Name is required.'),
            // applicantCnic: yup.string(),
            // fatherName: yup.string().required('Father Name is required.'),
            // fatherCnic: yup.string().required('Father CNIC No. is required.'),
            // motherName: yup.string().required('Mother Name is required.'),
            // motherCnic: yup.string().required('Mother CNIC No. is required.'),
            // religion: yup.string().required('Religion is required.'),
            // gender: yup.string().required('Gender is required.'),
            // districtOfBirth: yup.string().required('District of Birth is required.'),
            // homeOrHospital: yup.string().required('Home / Hospital is required.'),
            // disability: yup.string().required('Disability is required.'),
            // grandFatherName: yup.string().required('Grand Father Name is required.'),
            // grandFatherCnic: yup.string().required('Grand Father CNIC No. is required.'),
            // address: yup.string().required('Address is required.'),
            // // applicantSignature: yup.string().required('Applicant Signature is required.'),
            // cellNo: yup.string().required('Cell No. is required.'),
        });

        // Initialize form
        const { values, setFieldValue, errors, handleSubmit } = useForm({
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
                cellNo: '',
                children: [{ name: '', dateOfBirth: '' }], // Initialize children array if needed
            },
            validateOnChange: true,
        });

        const handleInputChange = (e, field, inputType = 'input') => {
            console.log(1, e, inputType);

            let value;
            switch (inputType) {
                case 'datepicker':
                    value = e;
                    break;
                case 'dropdown':
                    value = e.value;
                    break;
                default:
                    value = e.target.value;
            }
            // let value = isDropdown ? e.value : e.target.value;
            setFieldValue(field, value);
        };

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
            date,
            genderOptions,
            values,
            remove,
            push,
            setFieldValue,
            onSubmit,
            handleInputChange
        };
    },
};
</script>

<style scoped>
.form-control-date {
    /* appearance: none;  */
    /* padding: 0.375rem 0.75rem;  */
    /* line-height: normal; */
    background: #fff;
    border: 1px solid #ced4da;
    color: #495057;
}

.form-control-date:focus {
    outline: none;
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
</style>
