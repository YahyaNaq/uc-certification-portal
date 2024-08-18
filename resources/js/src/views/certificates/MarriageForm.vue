<template>
    <h1 class="fs-3 mb-4">Death Certificate Form</h1>
    <form @submit.prevent="onSubmit">
        <div class="d-flex align-items-center mb-5 gap-4">
            <div class="w-50 text-center">
                <i class="bi bi-1-circle-fill fs-1 text-success"></i>
                <h1 class="fs-4 fw-semibold">Particulars of Groom</h1>
            </div>
            <div class="vr text-success opacity-100" style="width: .3%;"></div>
            <div class="row">
                <div class="form-group col-md-5 mb-3">
                    <label for="groomName" class="mb-2">Name</label>
                    <input id="groomName" v-model="formData.groomName" type="text" class="form-control" />
                    <small v-if="errors.groomName" class="text-danger">{{ errors.groomName }}</small>
                </div>
            
                <div class="form-group col-md-3 mb-3">
                    <label for="groomCnic" class="mb-2">CNIC. No.</label>
                    <input id="groomCnic" v-model="formData.groomCnic" type="text" class="form-control" />
                    <small v-if="errors.groomCnic" class="text-danger">{{ errors.groomCnic }}</small>
                </div>
            
                <div class="form-group col-md-3 mb-3">
                    <label for="groomAge" class="mb-2">Age</label>
                    <input id="groomAge" v-model="formData.groomAge" type="number" class="form-control" />
                    <small v-if="errors.groomAge" class="text-danger">{{ errors.groomAge }}</small>
                </div>
            
                <div class="form-group col-md-3 mb-3">
                    <label for="groomMaritalStatus" class="mb-2">Marital Status</label>
                    <input id="groomMaritalStatus" v-model="formData.groomMaritalStatus" type="text" class="form-control" />
                    <small v-if="errors.groomMaritalStatus" class="text-danger">{{ errors.groomMaritalStatus }}</small>
                </div>
            
                <div class="form-group col-md-5 mb-3">
                    <label for="groomFatherName" class="mb-2">Father's Name</label>
                    <input id="groomFatherName" v-model="formData.groomFatherName" type="text" class="form-control" />
                    <small v-if="errors.groomFatherName" class="text-danger">{{ errors.groomFatherName }}</small>
                </div>
            
                <div class="form-group col-md-3 mb-3">
                    <label for="groomFatherCnic" class="mb-2">Father's CNIC.</label>
                    <input id="groomFatherCnic" v-model="formData.groomFatherCnic" type="text" class="form-control" />
                    <small v-if="errors.groomFatherCnic" class="text-danger">{{ errors.groomFatherCnic }}</small>
                </div>
            
                <div class="form-group col-md-7 mb-3">
                    <label for="groomAddress" class="mb-2">Address</label>
                    <textarea
                        v-model="formData.groomAddress"
                        type="text"
                        id="groomAddress"
                        class="form-control"
                        :class="{'is-invalid': errors.groomAddress }"
                    ></textarea>
                    <small v-if="errors.groomAddress" class="text-danger">{{ errors.groomAddress }}</small>
                </div>
            </div>
        </div>
    
        <div class="d-flex align-items-center mb-5 gap-4">
            <div class="w-50 text-center">
                <i class="bi bi-2-circle-fill fs-1 text-success"></i>
                <h1 class="fs-4 fw-semibold">Particulars of Bride</h1>
            </div>
            <div class="vr text-success opacity-100" style="width: .3%;"></div>
            <div class="row">
                <div class="form-group col-md-5 mb-3">
                    <label for="brideName" class="mb-2">Name</label>
                    <input id="brideName" v-model="formData.brideName" type="text" class="form-control" />
                    <small v-if="errors.brideName" class="text-danger">{{ errors.brideName }}</small>
                </div>
            
                <div class="form-group col-md-3 mb-3">
                    <label for="brideCnic" class="mb-2">CNIC. No.</label>
                    <input id="brideCnic" v-model="formData.brideCnic" type="text" class="form-control" />
                    <small v-if="errors.brideCnic" class="text-danger">{{ errors.brideCnic }}</small>
                </div>
            
                <div class="form-group col-md-3 mb-3">
                    <label for="brideAge" class="mb-2">Age</label>
                    <input id="brideAge" v-model="formData.brideAge" type="number" class="form-control" />
                    <small v-if="errors.brideAge" class="text-danger">{{ errors.brideAge }}</small>
                </div>
            
                <div class="form-group col-md-3 mb-3">
                    <label for="brideMaritalStatus" class="mb-2">Marital Status</label>
                    <input id="brideMaritalStatus" v-model="formData.brideMaritalStatus" type="text" class="form-control" />
                    <small v-if="errors.brideMaritalStatus" class="text-danger">{{ errors.brideMaritalStatus }}</small>
                </div>
            
                <div class="form-group col-md-5 mb-3">
                    <label for="brideFatherName" class="mb-2">Father's Name</label>
                    <input id="brideFatherName" v-model="formData.brideFatherName" type="text" class="form-control" />
                    <small v-if="errors.brideFatherName" class="text-danger">{{ errors.brideFatherName }}</small>
                </div>
            
                <div class="form-group col-md-3 mb-3">
                    <label for="brideFatherCnic" class="mb-2">Father's CNIC.</label>
                    <input id="brideFatherCnic" v-model="formData.brideFatherCnic" type="text" class="form-control" />
                    <small v-if="errors.brideFatherCnic" class="text-danger">{{ errors.brideFatherCnic }}</small>
                </div>
            
                <div class="form-group col-md-7 mb-3">
                    <label for="brideAddress" class="mb-2">Address</label>
                    <textarea
                        v-model="formData.brideAddress"
                        type="text"
                        id="brideAddress"
                        class="form-control"
                        :class="{'is-invalid': errors.brideAddress }"
                    ></textarea>
                    <small v-if="errors.brideAddress" class="text-danger">{{ errors.brideAddress }}</small>
                </div>
            </div>
        </div>
    
        <div class="d-flex align-items-center mb-5 gap-4">
            <div class="w-50 text-center">
                <i class="bi bi-3-circle-fill fs-1 text-success"></i>
                <h1 class="fs-4 fw-semibold">Additional Details</h1>
            </div>
            <div class="vr text-success opacity-100" style="width: .3%;"></div>
            <div class="row">
                <div class="form-group col-md-5 mb-3">
                    <label for="marriageSolemnizedName" class="mb-2">Marriage Solemnized Name</label>
                    <input id="marriageSolemnizedName" v-model="formData.marriageSolemnizedName" type="text" class="form-control" />
                    <small v-if="errors.marriageSolemnizedName" class="text-danger">{{ errors.marriageSolemnizedName }}</small>
                </div>
            
                <div class="form-group col-md-4 mb-3">
                    <label for="solemnizedCnic" class="mb-2">Solemnized CNIC. No.</label>
                    <input id="solemnizedCnic" v-model="formData.solemnizedCnic" type="text" class="form-control" />
                    <small v-if="errors.solemnizedCnic" class="text-danger">{{ errors.solemnizedCnic }}</small>
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="dateOfMarriage" class="mb-2">Date of Marriage</label>
                    <input id="dateOfMarriage" v-model="formData.dateOfMarriage" type="date" class="form-control" />
                    <small v-if="errors.dateOfMarriage" class="text-danger">{{ errors.dateOfMarriage }}</small>
                </div>
            
                <!-- <div class="form-group col-md-7 mb-3">
                    <label for="nikaRegistrarStamp" class="mb-2">Nika Registrar Stamp</label>
                    <input id="nikaRegistrarStamp" v-model="formData.nikaRegistrarStamp" type="text" class="form-control" />
                    <small v-if="errors.nikaRegistrarStamp" class="text-danger">{{ errors.nikaRegistrarStamp }}</small>
                </div>
            
                <div class="form-group col-md-7 mb-3">
                    <label for="applicantSignature" class="mb-2">Applicant Signature</label>
                    <input id="applicantSignature" v-model="formData.applicantSignature" type="text" class="form-control" />
                    <small v-if="errors.applicantSignature" class="text-danger">{{ errors.applicantSignature }}</small>
                </div> -->
            
                <div class="form-group col-md-3 mb-3">
                    <label for="cellNo" class="mb-2">Cell No.</label>
                    <input id="cellNo" v-model="formData.cellNo" type="text" class="form-control" />
                    <small v-if="errors.cellNo" class="text-danger">{{ errors.cellNo }}</small>
                </div>
            </div>
        </div>
  
        <div class="container d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
  </template>
  
  <script>
  import { reactive } from 'vue';
  
  export default {
    setup() {
      const formData = reactive({
        groomName: '',
        groomCnic: '',
        groomAge: '',
        groomMaritalStatus: '',
        groomFatherName: '',
        groomFatherCnic: '',
        groomAddress: '',
        brideName: '',
        brideCnic: '',
        brideAge: '',
        brideMaritalStatus: '',
        brideFatherName: '',
        brideFatherCnic: '',
        brideAddress: '',
        dateOfMarriage: '',
        marriageSolemnizedName: '',
        solemnizedCnic: '',
        nikaRegistrarStamp: '',
        applicantSignature: '',
        cellNo: ''
      });
  
      const errors = reactive({});
  
      const validate = () => {
        errors.groomName = !formData.groomName ? 'Groom Name is required.' : '';
        errors.groomCnic = !formData.groomCnic ? 'Groom CNIC. No. is required.' : '';
        errors.groomAge = !formData.groomAge ? 'Groom Age is required.' : '';
        errors.groomMaritalStatus = !formData.groomMaritalStatus ? 'Groom Marital Status is required.' : '';
        errors.groomFatherName = !formData.groomFatherName ? 'Groom Father\'s Name is required.' : '';
        errors.groomFatherCnic = !formData.groomFatherCnic ? 'Groom Father\'s CNIC. No. is required.' : '';
        errors.groomAddress = !formData.groomAddress ? 'Groom Address is required.' : '';
        
        errors.brideName = !formData.brideName ? 'Bride Name is required.' : '';
        errors.brideCnic = !formData.brideCnic ? 'Bride CNIC. No. is required.' : '';
        errors.brideAge = !formData.brideAge ? 'Bride Age is required.' : '';
        errors.brideMaritalStatus = !formData.brideMaritalStatus ? 'Bride Marital Status is required.' : '';
        errors.brideFatherName = !formData.brideFatherName ? 'Bride Father\'s Name is required.' : '';
        errors.brideFatherCnic = !formData.brideFatherCnic ? 'Bride Father\'s CNIC. No. is required.' : '';
        errors.brideAddress = !formData.brideAddress ? 'Bride Address is required.' : '';
  
        errors.dateOfMarriage = !formData.dateOfMarriage ? 'Date of Marriage is required.' : '';
        errors.marriageSolemnizedName = !formData.marriageSolemnizedName ? 'Marriage Solemnized Name is required.' : '';
        errors.solemnizedCnic = !formData.solemnizedCnic ? 'Solemnized CNIC. No. is required.' : '';
        errors.nikaRegistrarStamp = !formData.nikaRegistrarStamp ? 'Nika Registrar Stamp is required.' : '';
        errors.applicantSignature = !formData.applicantSignature ? 'Applicant Signature is required.' : '';
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
  