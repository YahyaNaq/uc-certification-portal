<template>
	<div>
		<Dialog
			v-model:visible="isDocumentsModalVisible"
			modal
			header="User Documents"
			:style="{ width: '70vw' }"
			:breakpoints="{ '1199px': '75vw', '575px': '90vw' }"
		>
			<div class="text-center mb-">
				<div class="text-center">
					<Image :src="imageUrls[0]" alt="Image" height="300" preview />
					<p class="fs-5 text-muted fw-semibold mb-5 mt-2">Original Copy of Hospital Birth Certificate</p>
				</div>

				<div class="text-center">
					<Image :src="imageUrls[1]" alt="Image" height="300" preview />
					<p class="fs-5 text-muted fw-semibold mb-5 mt-2">Copy of Father's NIC</p>
				</div>

				<div class="text-center">
					<Image :src="imageUrls[2]" alt="Image" height="300" preview />
					<p class="fs-5 text-muted fw-semibold mb-5 mt-2">Copy of Mother's NIC</p>
				</div>

				<div class="text-center">
					<Image :src="imageUrls[3]" alt="Image" height="300" preview />
					<p class="fs-5 text-muted fw-semibold mb-5 mt-2">Copy of Grand Father's NIC</p>
				</div>

				<div class="text-center">
					<Image :src="imageUrls[4]" alt="Image" height="300" preview />
					<p class="fs-5 text-muted fw-semibold mb-5 mt-2">Affidavit verified by the commisioner (For home birth)</p>
				</div>
			</div>
			<template #footer>
				<Button class="rounded mr-2" label="Verify Documents" @click="updateCertificateStatus(2)"/>
				<Button class="rounded" label="Reject Documents" severity="danger" @click="updateCertificateStatus(3)"/>
			</template>
		</Dialog>
		<h1 class="fs-3 mb-2">Birth Certificates</h1>
		<Card class="border">
			<template #content>
				<div class="d-flex flex-wrap gap-4">
					<Card class="bg-info bg-opacity-25 text-center p-0" style="min-width: 14rem;">
						<template #content>
								<h3 class="fw-semibold mb-2">{{certificates?.length}}</h3>
								<h6 class="fw-normal mb-0">Total Certificates</h6>
						</template>
					</Card>
					<Card class="bg-info bg-opacity-25 text-center p-0" style="min-width: 14rem;">
						<template #content>
								<h3 class="fw-semibold mb-2">{{statistics.pending}}</h3>
								<h6 class="fw-normal mb-0">Pending Certificates</h6>
						</template>
					</Card>
					<Card class="bg-info bg-opacity-25 text-center p-0" style="min-width: 14rem;">
						<template #content>
								<h3 class="fw-semibold mb-2">{{statistics.remotelyVerified}}</h3>
								<h6 class="fw-normal mb-0">Remotely Verified</h6>
						</template>
					</Card>
					<Card class="bg-info bg-opacity-25 text-center p-0" style="min-width: 14rem;">
						<template #content>
								<h3 class="fw-semibold mb-2">{{statistics.completelyVerified}}</h3>
								<h6 class="fw-normal mb-0">Completely Verified</h6>
						</template>
					</Card>
					<Card class="bg-info bg-opacity-25 text-center p-0" style="min-width: 14rem;">
						<template #content>
								<h3 class="fw-semibold mb-2">{{statistics.rejected}}</h3>
								<h6 class="fw-normal mb-0">Certificates Rejected</h6>
						</template>
					</Card>
					<Card class="bg-info bg-opacity-25 text-center p-0" style="min-width: 14rem;">
						<template #content>
								<h3 class="fw-semibold mb-2">{{statistics.issued}}</h3>
								<h6 class="fw-normal mb-0">Certificates Issued</h6>
						</template>
					</Card>
				</div>
				<Form @submit="onSubmit">
					<div class="d-flex gap-3 my-4 justify-content-end">
						<div class="col-md-2">
							<Calendar
								id="dateFrom"
								:modelValue="values.dateFrom"
								@update:modelValue="(value) => setFieldValue('dateFrom', value)"
								iconDisplay="input"
								inputClass="py-1"
								:maxDate="today"
							/>
						</div>
						<div class="col-md-2">
							<Calendar
								id="dateTo"
								:modelValue="values.dateTo"
								@update:modelValue="(value) => setFieldValue('dateTo', value)"
								iconDisplay="input"
								inputClass="py-1"
								:minDate="values.dateFrom"
								:maxDate="today"
							/>
						</div>
						<Button
							class="rounded py-1"
							size="small"
							severity="contrast"
							label="Search"
							type="submit"
						/>
					</div>
				</Form>
				<DataTable
					:value="certificates"
					ref="dt"
					stripedRows
					showGridlines
					paginator :rows="10" :rowsPerPageOptions="[5, 10, 20, 50, 100]"
					size="small"
					removableSort
					tableStyle="min-width: 50rem; border-width: 0px"
				>
					<template #header>
						<div style="text-align: right;">
							<Button icon="pi pi-external-link text-sm" size="small" class="rounded" label="Export" @click="exportPDF($event)" />
						</div>
					</template>
					<Column
						v-for="col in columns"
						:key="col.field"
						:field="col.field"
						:header="col.header"
						headerClass="bg-light py-3"
						:style="col.style"
						:sortable="col.sortable"
						:body="col.body"
					>
						<template v-if="col.field === 'action'" #body="{data}">
							<SplitButton
								ref="actionButtonRef"
								label="Actions"
								size="small"
								v-bind="$attrs"
								rounded
								:model="actionItems(data)"
							/>
						</template>
						<template v-else-if="col.field === 'gender'" #body="{data}" class="text-center">
							<Button v-if="data.gender == 'M'" icon="bi bi-person-standing" label="Male" :text="true" severity="contrast" />
							<Button v-if="data.gender == 'F'" icon="bi bi-person-standing-dress" label="Female" :text="true" severity="contrast" />
						</template>
						<template v-else-if="col.field === 'status'" #body="{data}">
							<Button
								:label="data.status"
								size="small"
								class="rounded px-2.5 py-1 p-text-sm"
								severity="contrast"
								:outlined="data.status_id != 5"
								style="font-size: 14px;"
							/>
						</template>
	
						<template v-else #body="{data}">
							{{ data?.[col.field]}}
						</template>
					</Column>
					<template class="py-2 my-2" #empty> No certificates found. </template>
				</DataTable>
			</template>
			<!-- <ConfirmPopup></ConfirmPopup> -->
		</Card>
	</div>
</template>

<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import axios from 'axios';
import { onMounted, ref } from 'vue';
import Button from 'primevue/button';
import SplitButton from 'primevue/splitbutton';
import Image from 'primevue/image';
import Dialog from 'primevue/dialog';
import jsPDF from 'jspdf';
import 'jspdf-autotable';
import * as XLSX from 'xlsx';
import UCLogo from '../../assets/images/ucLogo.jpg';
import { toast } from 'vue3-toastify';
import { useConfirm } from "primevue/useconfirm";
import ConfirmPopup from 'primevue/confirmpopup';
import Carousel from 'primevue/carousel';
import Calendar from 'primevue/calendar';
import Card from 'primevue/card';
import { Form, Field, ErrorMessage, useForm, useFieldArray } from 'vee-validate';


const certificates = ref([]);
const statistics = ref({
	pending: 0,
	remotelyVerified: 0,
	rejected: 0,
	completelyVerified: 0,
	issued: 0,
});

const dt = ref();
const isDocumentsModalVisible = ref(false);
const imageUrls = ref([UCLogo]);
const viewDocumentsModalData = ref({});
const confirm = useConfirm();
const actionButtonRef = ref(null);

const today = new Date();
console.log(new Date().setDate(today.getDate() - 30));

const { values, setFieldValue, errors, handleSubmit } = useForm({
	initialValues: {
		dateFrom: new Date(new Date().setDate(today.getDate() - 30)),
		dateTo: today,
	}
});

const onSubmit = handleSubmit((data) => {
	lazyLoadData();
});

const getDocuments = (id) => {
	axios.get(`/api/certificates/birth-certificates/documents?id=${id}`)
		.then((response) => {
			isDocumentsModalVisible.value = true;
			const fileUrls = response.data;
			imageUrls.value = fileUrls;

		}).catch((error) => {
			toast(error.response.data.message, {
				"type": "error",
				"dangerouslyHTMLString": true
			});
		});
};

const confirmAction = (event) => {
	confirm.require({
		target: event,
		message: 'Are you sure you want to complete verification for this certificate?',
		icon: 'pi pi-exclamation-triangle',
		rejectClass: 'p-button-secondary p-button-outlined p-button-sm',
		acceptClass: 'p-button-sm',
		rejectLabel: 'Cancel',
		acceptLabel: 'Confirm',
		accept: () => {
			updateCertificateStatus(4);
		},
		reject: () => {
		}
	});
}

const actionItems = (rowData) => {
	let actions = [
		{
			label: 'Edit',
			icon: 'pi pi-pencil',
			command: () => {
				alert('Edited');
			}
		},
		{
			label: 'View Documents',
			icon: 'pi pi-eye',
			class: "no-underline",
			command: () => {
				viewDocumentsModalData.value = { id: rowData.id };
				getDocuments(rowData.id);
			},
		},
	];

	if (rowData.status_id == 2) {
		actions.push({
			label: 'Complete Verification',
			icon: 'pi pi-verified',
			command: (event) => {
				viewDocumentsModalData.value = { id: rowData.id };
				updateCertificateStatus(4);
				// const target = actionButtonRef.value[0].$el; 
				// confirmAction(target);
			}
		});
	}
	else if (rowData.status_id == 4) {
		actions.push({
			label: 'Issue Certificate',
			icon: 'pi pi-check-circle',
			command: (event) => {
				viewDocumentsModalData.value = { id: rowData.id };
				updateCertificateStatus(5);
			}
		});
	}

	return actions;
};

const updateCertificateStatus = (status) => {
	axios.post('api/certificates/birth-certificates/update-status', { status, certificate: viewDocumentsModalData.value})
		.then((response) => {
			let data = response.data;
			toast(`Documents of <b>${data.applicant_name}</b> have been ${data.new_status}`, {
				"type": "success",
				"dangerouslyHTMLString": true
			});

			certificates.value = certificates.value.map((certificate) => {
				if (certificate.id == viewDocumentsModalData.value.id) {
					return { ...certificate, status: data.new_status, status_id: status };
				}
				return certificate;
			})
		}).catch((error) => {
			toast(error.response.data.message, {
				"type": "error",
				"dangerouslyHTMLString": true
			});
		});
};

const columns = [
	{ field: 'serialNo', header: 'Sno.', style: "min-width: 70px; text-align: center", sortable:true },
	{ field: 'applicant_name', header: 'Applicant Name', style: "min-width: 170px", sortable: true },
	{ field: 'applicant_cnic', header: 'Applicant CNIC', style: "min-width: 160px", sortable: true },
	{ field: 'father_name', header: 'Father Name', style: "min-width: 150px", sortable:true },
	{ field: 'father_cnic', header: 'Father CNIC', style: "min-width: 150px", sortable:true },
	{ field: 'mother_name', header: 'Mother Name', style: "min-width: 150px", sortable:true },
	{ field: 'mother_cnic', header: 'Mother CNIC', style: "min-width: 150px", sortable:true },
	{ field: 'religion', header: 'Religion', style: "min-width: 100px", sortable:true },
	{ field: 'gender', header: 'Gender', style: "min-width: 100px" },
	{ field: 'district_of_birth', header: 'District of Birth', style: "min-width: 180px", sortable:true },
	{ field: 'home_or_hospital', header: 'Place of Birth', style: "min-width: 180px", sortable:true },
	{ field: 'disability', header: 'Disability', style: "min-width: 150px", sortable:true },
	// { field: 'grand_father_name', header: 'Grand Father Name', style: "min-width: 150px", sortable:true },
	// { field: 'grand_father_cnic', header: 'Grand Father CNIC', style: "min-width: 150px", sortable:true },
	{ field: 'address', header: 'Address', style: "min-width: 250px", sortable:true },
	// { field: 'registeredAuthority', header: 'Registered Authority', style: "min-width: 200px" },
	// { field: 'created_at', header: 'Registration Date', style: "min-width: 150px", sortable:true },
	// { field: 'signature', header: 'Signature', style: "min-width: 150px", sortable:true },
	{ field: 'phone_number', header: 'Phone Number', style: "min-width: 160px", sortable:true },
	{ field: 'status', header: 'Verification Status', style: "min-width: 190px", sortable:true },
	{ field: 'action', header: 'Action', style: "min-width: 150px", sortable:true },
];

const responsiveOptions = ref([
	{
		breakpoint: '1400px',
		numVisible: 2,
		numScroll: 1
	},
	{
		breakpoint: '1199px',
		numVisible: 3,
		numScroll: 1
	},
	{
		breakpoint: '767px',
		numVisible: 2,
		numScroll: 1
	},
	{
		breakpoint: '575px',
		numVisible: 1,
		numScroll: 1
	}
]);

const lazyLoadData = () => {
	if (!(values.dateFrom && values.dateTo)) {
		toast("Please select both dates", {
				"type": "error",
				"dangerouslyHTMLString": true
			});
	}
	axios.get('/api/certificates/birth-certificates', {
		params: {
			...values
		}
	})
		.then(response => {
			certificates.value = response.data.data.map((item, index) => ({
				...item,
				serialNo: index + 1,
			}));

		response.data.data.forEach((item) => {
		switch (item.status_id) {
			case 1:
				statistics.value.pending++;
				break;
			case 2:
				statistics.value.remotelyVerified++;
				break;
			case 3:
				statistics.value.rejected++;
				break;
			case 4:
				statistics.value.completelyVerified++;
				break;
			case 5:
				statistics.value.issued++;
				break;
			default:
				break;
		}
	});
		})
		.catch(error => {
			console.error('Error fetching certificates:', error);
		});
};

onMounted(() => {
	lazyLoadData();
});

const exportExcel = () => {
	// Convert data to worksheet
	const worksheet = XLSX.utils.json_to_sheet(certificates.value);

	// Create a new workbook and add the worksheet
	const workbook = XLSX.utils.book_new();
	XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

	// Write workbook to binary string
	const wbout = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

	// Create a Blob from the binary string and trigger download
	const blob = new Blob([wbout], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
	const url = window.URL.createObjectURL(blob);
	const link = document.createElement('a');
	link.href = url;
	link.download = 'data.xlsx';
	link.click();
	window.URL.revokeObjectURL(url);
};


const exportPDF = () => {
	var doc = new jsPDF({
		orientation: "landscape",
		unit: "mm",
		format: 'A4'
	});

	doc.autoTable({
		head: [columns.map(col => col.header)],
		pageBreak: 'auto',
		body: certificates.value.map(cert => columns.map(col => cert[col.field])),
		// startY: 20,
		styles: { fontSize: 8 }, 
		styles: { overflow: 'linebreak' },
		margin: { top: 10, right: 10, bottom: 10, left: 10 },
	});

	doc.save('birth_certificates.pdf');
};

</script>

<style>

</style>
