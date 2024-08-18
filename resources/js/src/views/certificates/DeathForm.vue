<template>
    <h1 class="fs-3 mb-4">Death Certificate Form</h1>
    <form @submit.prevent="onSubmit">
        <div class="d-flex flex-wrap justify-content-between align-items-start">
            <div class="row col-md-6">
                <div class="form-group col-md-7 mb-3">
                    <label for="applicantName" class="mb-2">Applicant Name</label>
                    <input id="applicantName" v-model="formData.applicantName" type="text" class="form-control" />
                    <small v-if="errors.applicantName" class="text-danger">{{ errors.applicantName }}</small>
                </div>
    
                <div class="form-group col-md-5 mb-3">
                    <label for="applicantCnic" class="mb-2">Applicant CNIC No.</label>
                    <input id="applicantCnic" v-model="formData.applicantCnic" type="text" class="form-control" />
                    <small v-if="errors.applicantCnic" class="text-danger">{{ errors.applicantCnic }}</small>
                </div>
    
                <div class="form-group col-md-7 mb-3">
                    <label for="deceasedName" class="mb-2">Deceased Name</label>
                    <input id="deceasedName" v-model="formData.deceasedName" type="text" class="form-control" />
                    <small v-if="errors.deceasedName" class="text-danger">{{ errors.deceasedName }}</small>
                </div>
    
                <div class="form-group col-md-5 mb-3">
                    <label for="deceasedCnic" class="mb-2">Deceased CNIC No.</label>
                    <input id="deceasedCnic" v-model="formData.deceasedCnic" type="text" class="form-control" />
                    <small v-if="errors.deceasedCnic" class="text-danger">{{ errors.deceasedCnic }}</small>
                </div>
    
                <div class="form-group col-md-7 mb-3">
                    <label for="fatherName" class="mb-2">Father Name</label>
                    <input id="fatherName" v-model="formData.fatherName" type="text" class="form-control" />
                    <small v-if="errors.fatherName" class="text-danger">{{ errors.fatherName }}</small>
                </div>
    
                <div class="form-group col-md-5 mb-3">
                    <label for="fatherCnic" class="mb-2">Father CNIC No.</label>
                    <input id="fatherCnic" v-model="formData.fatherCnic" type="text" class="form-control" />
                    <small v-if="errors.fatherCnic" class="text-danger">{{ errors.fatherCnic }}</small>
                </div>
    
                <div class="form-group col-md-7 mb-3">
                    <label for="motherName" class="mb-2">Mother Name</label>
                    <input id="motherName" v-model="formData.motherName" type="text" class="form-control" />
                    <small v-if="errors.motherName" class="text-danger">{{ errors.motherName }}</small>
                </div>
    
                <div class="form-group col-md-5 mb-3">
                    <label for="motherCnic" class="mb-2">Mother CNIC No.</label>
                    <input id="motherCnic" v-model="formData.motherCnic" type="text" class="form-control" />
                    <small v-if="errors.motherCnic" class="text-danger">{{ errors.motherCnic }}</small>
                </div>
    
                <div class="form-group col-md-7 mb-3">
                    <label for="husbandName" class="mb-2">Husband Name</label>
                    <input id="husbandName" v-model="formData.husbandName" type="text" class="form-control" />
                    <small v-if="errors.husbandName" class="text-danger">{{ errors.husbandName }}</small>
                </div>
    
                <div class="form-group col-md-5 mb-3">
                    <label for="husbandCnic" class="mb-2">Husband CNIC No.</label>
                    <input id="husbandCnic" v-model="formData.husbandCnic" type="text" class="form-control" />
                    <small v-if="errors.husbandCnic" class="text-danger">{{ errors.husbandCnic }}</small>
                </div>

                <div class="form-group col-md-7 mb-3">
                    <label for="personDisposingBody" class="mb-2">Person's Name Causing Disposal of Body</label>
                    <input id="personDisposingBody" v-model="formData.personDisposingBody" type="text" class="form-control" />
                    <small v-if="errors.personDisposingBody" class="text-danger">{{ errors.personDisposingBody }}</small>
                </div>
    
                <div class="form-group col-md-5 mb-3">
                    <label for="personDisposingCnic" class="mb-2">Person's CNIC No.</label>
                    <input id="personDisposingCnic" v-model="formData.personDisposingCnic" type="text" class="form-control" />
                    <small v-if="errors.personDisposingCnic" class="text-danger">{{ errors.personDisposingCnic }}</small>
                </div>
            </div>
            <div class="vr text-success opacity-100" style="width: 0.2%;"></div>
            <div class="row col-md-6">
                <div class="form-group col-md-7 mb-3">
                    <label for="relationWithDeceased" class="mb-2">Relation of Applicant with Deceased</label>
                    <input id="relationWithDeceased" v-model="formData.relationWithDeceased" type="text" class="form-control" />
                    <small v-if="errors.relationWithDeceased" class="text-danger">{{ errors.relationWithDeceased }}</small>
                </div>

                <div class="form-group col-md-5 mb-3">
                    <label for="sicknessPeriod" class="mb-2">Sickness Period</label>
                    <input id="sicknessPeriod" v-model="formData.sicknessPeriod" type="text" class="form-control" />
                    <small v-if="errors.sicknessPeriod" class="text-danger">{{ errors.sicknessPeriod }}</small>
                </div>
    
                <div class="form-group col-md-4 mb-3">
                    <label for="religion" class="mb-2">Religion</label>
                    <input id="religion" v-model="formData.religion" type="text" class="form-control" />
                    <small v-if="errors.religion" class="text-danger">{{ errors.religion }}</small>
                </div>
    
                <div class="form-group col-md-3 mb-3">
                    <label for="gender" class="mb-2">Gender</label>
                    <input id="gender" v-model="formData.gender" type="text" class="form-control" />
                    <small v-if="errors.gender" class="text-danger">{{ errors.gender }}</small>
                </div>

                <div class="form-group col-md-5 mb-3">
                    <label for="dob" class="mb-2">Date of Birth</label>
                    <input id="dob" v-model="formData.dob" type="date" class="form-control"/>
                    <small v-if="errors.dob" class="text-danger">{{ errors.dob }}</small>
                </div>
    
                <div class="form-group col-md-7 mb-3">
                    <label for="homeOrHospital" class="mb-2">Home / Hospital</label>
                    <input id="homeOrHospital" v-model="formData.homeOrHospital" type="text" class="form-control" />
                    <small v-if="errors.homeOrHospital" class="text-danger">{{ errors.homeOrHospital }}</small>
                </div>
    
                <div class="form-group col-md-5 mb-3">
                    <label for="dod" class="mb-2">Date of Death</label>
                    <input id="dod" v-model="formData.dod" type="date" class="form-control"/>
                    <small v-if="errors.dod" class="text-danger">{{ errors.dod }}</small>
                </div>

                <div class="form-group col-md-7 mb-3">
                    <label for="graveyardName" class="mb-2">Graveyard Name</label>
                    <input id="graveyardName" v-model="formData.graveyardName" type="text" class="form-control" />
                    <small v-if="errors.graveyardName" class="text-danger">{{ errors.graveyardName }}</small>
                </div>

                <div class="form-group col-md-5 mb-3">
                    <label for="burialDate" class="mb-2">Date of Burial</label>
                    <input id="burialDate" v-model="formData.burialDate" type="date" class="form-control"/>
                    <small v-if="errors.burialDate" class="text-danger">{{ errors.burialDate }}</small>
                </div>
    
                <div class="form-group col-md-7 mb-3">
                    <label for="reasonOfDeath" class="mb-2">Reason of Death</label>
                    <input id="reasonOfDeath" v-model="formData.reasonOfDeath" type="text" class="form-control" />
                    <small v-if="errors.reasonOfDeath" class="text-danger">{{ errors.reasonOfDeath }}</small>
                </div>

                <div class="form-group col-md-5 mb-3">
                    <label for="cellNo" class="mb-2">Cell No.</label>
                    <input id="cellNo" v-model="formData.cellNo" type="text" class="form-control" />
                    <small v-if="errors.cellNo" class="text-danger">{{ errors.cellNo }}</small>
                </div>
    
                <div class="form-group mb-3">
                    <label for="address" class="mb-2">Address</label>
                    <textarea 
                    v-model="formData.address"
                    id="address"
                    class="form-control"
                    :class="{'is-invalid': errors.address }"
                    ></textarea>
                    <small v-if="errors.address" class="text-danger">{{ errors.address }}</small>
                </div>
    
                <!-- <div class="form-group col-md-4 mb-3">
                    <label for="applicantSignature" class="mb-2">Applicant's Signature</label>
                    <input id="applicantSignature" v-model="formData.applicantSignature" type="text" class="form-control" />
                    <small v-if="errors.applicantSignature" class="text-danger">{{ errors.applicantSignature }}</small>
                </div> -->
            </div>
        </div>

        <div class="d-flex justify-content-end my-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</template>

<script>
import { reactive } from 'vue';

export default {
    setup() {
        const formData = reactive({
            applicantName: '',
            applicantCnic: '',
            deceasedName: '',
            deceasedCnic: '',
            relationWithDeceased: '',
            religion: '',
            gender: '',
            fatherName: '',
            fatherCnic: '',
            motherName: '',
            motherCnic: '',
            husbandName: '',
            husbandCnic: '',
            graveyardName: '',
            homeOrHospital: '',
            dob: '',
            dod: '',
            burialDate: '',
            sicknessPeriod: '',
            reasonOfDeath: '',
            address: '',
            personDisposingBody: '',
            personDisposingCnic: '',
            applicantSignature: '',
            cellNo: ''
        });

        const errors = reactive({});

        const validate = () => {
            errors.applicantName = !formData.applicantName ? 'Applicant Name is required.' : '';
            errors.applicantCnic = !formData.applicantCnic ? 'Applicant CNIC No. is required.' : '';
            errors.deceasedName = !formData.deceasedName ? 'Deceased Name is required.' : '';
            errors.deceasedCnic = !formData.deceasedCnic ? 'Deceased CNIC No. is required.' : '';
            errors.relationWithDeceased = !formData.relationWithDeceased ? 'Relation of applicant with Deceased is required.' : '';
            errors.religion = !formData.religion ? 'Religion is required.' : '';
            errors.gender = !formData.gender ? 'Gender is required.' : '';
            errors.fatherName = !formData.fatherName ? 'Father Name is required.' : '';
            errors.fatherCnic = !formData.fatherCnic ? 'Father CNIC No. is required.' : '';
            errors.motherName = !formData.motherName ? 'Mother Name is required.' : '';
            errors.motherCnic = !formData.motherCnic ? 'Mother CNIC No. is required.' : '';
            errors.husbandName = !formData.husbandName ? 'Husband Name is required.' : '';
            errors.husbandCnic = !formData.husbandCnic ? 'Husband CNIC No. is required.' : '';
            errors.graveyardName = !formData.graveyardName ? 'Graveyard Name is required.' : '';
            errors.homeOrHospital = !formData.homeOrHospital ? 'Home / Hospital is required.' : '';
            errors.dob = !formData.dob ? 'Date of Birth is required.' : '';
            errors.dod = !formData.dod ? 'Date of Death is required.' : '';
            errors.burialDate = !formData.burialDate ? 'Date of Burial is required.' : '';
            errors.sicknessPeriod = !formData.sicknessPeriod ? 'Sickness period is required.' : '';
            errors.reasonOfDeath = !formData.reasonOfDeath ? 'Reason of Death is required.' : '';
            errors.address = !formData.address ? 'Address is required.' : '';
            errors.personDisposingBody = !formData.personDisposingBody ? "Person's Name causing disposal of Body is required." : '';
            errors.personDisposingCnic = !formData.personDisposingCnic ? "Person's CNIC No. is required." : '';
            errors.applicantSignature = !formData.applicantSignature ? "Applicant's Signature is required." : '';
            errors.cellNo = !formData.cellNo ? 'Cell No. is required.' : '';
        };

        const onSubmit = () => {
            validate();
            if (Object.values(errors).every(error => !error)) {
                // Form is valid, proceed with form submission
                console.log('Form submitted:', formData);
            } else {
                console.log('Validation errors:', errors);
            }
        };

        return {
            formData,
            errors,
            onSubmit
        };
    }
};
</script>