<template>
    <div>
        <h1 class="fs-3 mb-2">Divorce Certificate Form</h1>
        <form @submit.prevent="handleSubmit" style="width: 100%;">
            <div class="d-inline-flex align-items-center gap-3 my-3 mb-5 py-2 px-3 bg-dark w-auto rounded p">
                <span class="fs-6 fw-semibold text-white">Nature of divorce</span>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary btn-sm">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Talaq
                    </label>
                    <label class="btn btn-secondary btn-sm">
                        <input type="radio" name="options" id="option3" autocomplete="off"> Khula
                    </label>
                </div>
            </div>
            <!-- Divorcer Details -->
            <div class="d-flex align-items-center mb-5 gap-4">
                <div class="w-25 text-center">
                    <i class="bi bi-1-circle-fill fs-1 text-secondary"></i>
                    <h1 class="fs-4"> Divorcer Details</h1>
                </div>
                <div class="vr text-success opacity-100" style="width: .3%;"></div>
                <div>
                    <div class="d-flex flex-wrap gap-4 py-3">
                        <div class="form-group col-md-3">
                            <label for="divorcerName" class="mb-2">Divorcer Name</label>
                            <input v-model="formData.divorcerName" type="text" id="divorcerName" class="form-control" />
                            <small v-if="errors.divorcerName && formSubmitted" class="text-danger">{{ errors.divorcerName }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="divorcerCnic" class="mb-2">CNIC No.</label>
                            <input v-model="formData.divorcerCnic" type="text" id="divorcerCnic" class="form-control" />
                            <small v-if="errors.divorcerCnic && formSubmitted" class="text-danger">{{ errors.divorcerCnic }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="divorcerFatherName" class="mb-2">Father Name</label>
                            <input v-model="formData.divorcerFatherName" type="text" id="divorcerFatherName" class="form-control" />
                            <small v-if="errors.divorcerFatherName && formSubmitted" class="text-danger">{{ errors.divorcerFatherName }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="divorcerFatherCnic" class="mb-2">CNIC No.</label>
                            <input v-model="formData.divorcerFatherCnic" type="text" id="divorcerFatherCnic" class="form-control" />
                            <small v-if="errors.divorcerFatherCnic && formSubmitted" class="text-danger">{{ errors.divorcerFatherCnic }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="divorcerAddress" class="mb-2">Address</label>
                            <textarea v-model="formData.divorcerAddress" type="text" id="divorcerAddress" class="form-control"></textarea>
                            <small v-if="errors.divorcerAddress && formSubmitted" class="text-danger">{{ errors.divorcerAddress }}</small>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Divorcee Details -->
            <div class="d-flex align-items-center gap-4 mb-5">
                <div class="w-25 text-center">
                    <i class="bi bi-2-circle-fill fs-1 text-secondary"></i>
                    <h1 class="fs-4">Divorcee Details</h1>
                </div>
                <div class="vr text-success opacity-100" style="width: .3%;"></div>
                <div>
                    <div class="d-flex flex-wrap gap-4 py-3">
                        <div class="form-group col-md-3">
                            <label for="divorceeName" class="mb-2">Divorcee Name</label>
                            <input v-model="formData.divorceeName" type="text" id="divorceeName" class="form-control" />
                            <small v-if="errors.divorceeName && formSubmitted" class="text-danger">{{ errors.divorceeName }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="divorceeCnic" class="mb-2">CNIC No.</label>
                            <input v-model="formData.divorceeCnic" type="text" id="divorceeCnic" class="form-control" />
                            <small v-if="errors.divorceeCnic && formSubmitted" class="text-danger">{{ errors.divorceeCnic }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="divorceeFatherName" class="mb-2">Father Name</label>
                            <input v-model="formData.divorceeFatherName" type="text" id="divorceeFatherName" class="form-control" />
                            <small v-if="errors.divorceeFatherName && formSubmitted" class="text-danger">{{ errors.divorceeFatherName }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="divorceeFatherCnic" class="mb-2">CNIC No.</label>
                            <input v-model="formData.divorceeFatherCnic" type="text" id="divorceeFatherCnic" class="form-control" />
                            <small v-if="errors.divorceeFatherCnic && formSubmitted" class="text-danger">{{ errors.divorceeFatherCnic }}</small>
                        </div>
                
                        <div class="form-group col-md-6">
                            <label for="divorceeAddress" class="mb-2">Address</label>
                            <textarea v-model="formData.divorceeAddress" type="text" id="divorceeAddress" class="form-control"></textarea>
                            <small v-if="errors.divorceeAddress && formSubmitted" class="text-danger">{{ errors.divorceeAddress }}</small>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Additional Details -->
            <div class="d-flex gap-4 mb-5">
                <div class="w-75 text-center">
                    <i class="bi bi-3-circle-fill fs-1 text-secondary"></i>
                    <h1 class="fs-4">Divorce Details</h1>
                </div>
                <div class="vr text-success opacity-100" style="width: .8%;"></div>
                <div>
                    <div class="d-flex flex-wrap gap-4 py-3">
                        <div class="form-group col-md-3">
                            <label for="authority" class="mb-2">Authority for granting Divorce</label>
                            <input v-model="formData.authority" type="text" id="authority" class="form-control" />
                            <small v-if="errors.authority && formSubmitted" class="text-danger">{{ errors.authority }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="details" class="mb-2">Details of Divorce and custody of children</label>
                            <textarea v-model="formData.details" id="details" class="form-control"></textarea>
                            <small v-if="errors.details && formSubmitted" class="text-danger">{{ errors.details }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="place" class="mb-2">Place of Marriage</label>
                            <input v-model="formData.place" type="text" id="place" class="form-control" />
                            <small v-if="errors.place && formSubmitted" class="text-danger">{{ errors.place }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="arbitration" class="mb-2">Details of Proceeding of Arbitration</label>
                            <textarea v-model="formData.arbitration" id="arbitration" class="form-control"></textarea>
                            <small v-if="errors.arbitration && formSubmitted" class="text-danger">{{ errors.arbitration }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="children" class="mb-2">No of Children from Wedlock</label>
                            <input v-model="formData.children" type="number" id="children" class="form-control" />
                            <small v-if="errors.children && formSubmitted" class="text-danger">{{ errors.children }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="husbandDivorces" class="mb-2">No of Previous Divorces of Husband</label>
                            <input v-model="formData.husbandDivorces" type="number" id="husbandDivorces" class="form-control" />
                            <small v-if="errors.husbandDivorces && formSubmitted" class="text-danger">{{ errors.husbandDivorces }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="wifeDivorces" class="mb-2">No of Previous Divorces of Wife</label>
                            <input v-model="formData.wifeDivorces" type="number" id="wifeDivorces" class="form-control" />
                            <small v-if="errors.wifeDivorces && formSubmitted" class="text-danger">{{ errors.wifeDivorces }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="reconciliation" class="mb-2">Reconciliation Proceeding Failure Date</label>
                            <input v-model="formData.reconciliation" type="date" id="reconciliation" class="form-control" />
                            <small v-if="errors.reconciliation && formSubmitted" class="text-danger">{{ errors.reconciliation }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="notice" class="mb-2">Date of Notice for Divorce</label>
                            <input v-model="formData.notice" type="date" id="notice" class="form-control" />
                            <small v-if="errors.notice && formSubmitted" class="text-danger">{{ errors.notice }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="registration" class="mb-2">Date of Registration</label>
                            <input v-model="formData.registration" type="date" id="registration" class="form-control" />
                            <small v-if="errors.registration && formSubmitted" class="text-danger">{{ errors.registration }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="marriage" class="mb-2">Date of Marriage</label>
                            <input v-model="formData.marriage" type="date" id="marriage" class="form-control" />
                            <small v-if="errors.marriage && formSubmitted" class="text-danger">{{ errors.marriage }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="effectiveness" class="mb-2">Date of Effectiveness of Divorce</label>
                            <input v-model="formData.effectiveness" type="date" id="effectiveness" class="form-control" />
                            <small v-if="errors.effectiveness && formSubmitted" class="text-danger">{{ errors.effectiveness }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="signature" class="mb-2">Application Signature</label>
                            <input v-model="formData.signature" type="text" id="signature" class="form-control" />
                            <small v-if="errors.signature && formSubmitted" class="text-danger">{{ errors.signature }}</small>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="cellNo" class="mb-2">Cell No</label>
                            <input v-model="formData.cellNo" type="tel" id="cellNo" class="form-control" />
                            <small v-if="errors.cellNo && formSubmitted" class="text-danger">{{ errors.cellNo }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <button type="submit" class="btn btn-success float-end mx-5">Submit</button>
            </div>
    
        </form>
    </div>
</template>
  
<script>
import { ref } from 'vue';
import { useForm } from 'vee-validate';
import * as yup from 'yup';
  
export default {
    setup() {
        const formData = ref({
            divorcerName: '',
            divorcerCnic: '',
            divorcerFatherName: '',
            divorcerFatherCnic: '',
            divorcerAddress: '',
            divorceeName: '',
            divorceeCnic: '',
            divorceeFatherName: '',
            divorceeFatherCnic: '',
            divorceeAddress: '',
            authority: '',
            details: '',
            place: '',
            arbitration: '',
            children: '',
            husbandDivorces: '',
            wifeDivorces: '',
            reconciliation: '',
            notice: '',
            registration: '',
            marriage: '',
            effectiveness: '',
            signature: '',
            cellNo: '',
        });

        const { errors, validate } = useForm({
            validationSchema: yup.object().shape({
                divorcerName: yup.string().required('Divorcer Name is required'),
                divorcerCnic: yup.string().required('CNIC No. is required'),
                divorcerFatherName: yup.string().required('Father Name is required'),
                divorcerFatherCnic: yup.string().required('CNIC No. is required'),
                divorcerAddress: yup.string().required('Address is required'),
                divorceeName: yup.string().required('Divorcee Name is required'),
                divorceeCnic: yup.string().required('CNIC No. is required'),
                divorceeFatherName: yup.string().required('Father Name is required'),
                divorceeFatherCnic: yup.string().required('CNIC No. is required'),
                divorceeAddress: yup.string().required('Address is required'),
                authority: yup.string().required('Authority for granting Divorce is required'),
                details: yup.string().required('Details of Divorce and custody of children are required'),
                place: yup.string().required('Place of Marriage is required'),
                arbitration: yup.string().required('Details of Proceeding of Arbitration are required'),
                children: yup.number().required('No of Children from Wedlock is required').min(0),
                husbandDivorces: yup.number().required('No of Previous Divorces of Husband is required').min(0),
                wifeDivorces: yup.number().required('No of Previous Divorces of Wife is required').min(0),
                reconciliation: yup.date().required('Reconciliation Proceeding Failure Date is required'),
                notice: yup.date().required('Date of Notice for Divorce is required'),
                registration: yup.date().required('Date of Registration is required'),
                marriage: yup.date().required('Date of Marriage is required'),
                effectiveness: yup.date().required('Date of Effectiveness of Divorce is required'),
                signature: yup.string().required('Application Signature is required'),
                cellNo: yup.string().required('Cell No is required').matches(/^((\+92)|(0092))-?3[0-9]{2}-?[0-9]{7}$/, 'Invalid phone number'),
            }),
            initialValues: formData.value,
        });

        const formSubmitted = ref(false);

        const handleSubmit = async () => {
            formSubmitted.value = true;
            console.log(formSubmitted.value);
            const isValid = await validate();
            if (isValid) {
                try {
                    const response = await axios.post('/api/submit-divorce-form', formData.value);
                    responseMessage.value = 'Form submitted successfully!';
                    // Clear form
                    for (const key in formData.value) {
                        formData.value[key] = '';
                    }
                    formSubmitted.value = false;

                } catch (error) {
                    responseMessage.value = 'There was an error submitting the form.';
                }
            }
            
        };
  
        return {
            formData,
            handleSubmit,
            errors,
            formSubmitted,
            // submitForm
        };
    },
};
</script>
  