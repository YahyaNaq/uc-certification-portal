<template>
	<div>
		<Dialog
			v-model:visible="isDocumentsModalVisible"
			modal
			header="Header"
			:style="{ width: '50vw' }"
			:breakpoints="{ '1199px': '75vw', '575px': '90vw' }"
		>
			<div class="text-center mb-">
				<!-- <Button
					icon="pi pi-image"
					class="rounded"
					label="Original Copy of Hospital Birth Certificate"
					severity="contrast"
				/> -->
				<Image :src="UCLogo" alt="Image" width="250" preview />
			</div>
			<template #footer>
				<Button class="rounded" label="Verify Documents" />
				<Button class="rounded" label="Reject Documents" severity="danger" />
			</template>
		</Dialog>
		<h1 class="fs-3 mb-2">Birth Certificates</h1>
		<div class="card">
			<DataTable
				:value="certificates"
				ref="dt"
				stripedRows
				showGridlines="true"
				paginator :rows="10" :rowsPerPageOptions="[5, 10, 20, 50, 100]"
				size="small"
				removableSort
				tableStyle="min-width: 50rem"
			>
				<template #header>
					<div style="text-align: right; border-radius: 8px;">
						<Button icon="pi pi-external-link text-sm" size="small" class="rounded" label="Export" @click="exportPDF($event)" />
					</div>
				</template>
				<Column
					v-for="col in columns"
					:key="col.field"
					:field="col.field"
					:header="col.header"
					headerClass="bg-light"
					:style="col.style"
					:sortable="col.sortable"
					:body="col.body"
				>
					<template v-if="col.field === 'action'" #body="{data}">
						<SplitButton
						label="Actions"
						size="small"
						rounded="true"
						:model="actionItems"
						@click="save(data)"
						/>
					</template>
					<template v-else #body="{data}">
						{{ data?.[col.field]}}
					</template>
				</Column>
				<template class="py-2 my-2" #empty> No certificates found. </template>
			</DataTable>
		</div>
	</div>
</template>

<script>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputMask from 'primevue/inputmask';
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

export default {
	components: {
		DataTable,
		Column,
		Button,
		InputMask,
		SplitButton,
		Dialog,
		Image
	},
	setup() {

		const certificates = ref([]);
		const dt = ref();
		const isDocumentsModalVisible = ref(false);

		const statusBodyTemplate = (rowData) => {
			return rowData.status_id === 1 ? 'Pending' : 'Verified';
		};

		const actionItems = [
			{
				label: 'View Documents',
				command: () => {
					isDocumentsModalVisible.value = true;
				}
			},
			{
				label: 'Reject',
				command: () => {
					toast.add({ severity: 'success', summary: 'Updated', detail: 'Data Updated', life: 3000 });
				}
			},
		];



		const columns = [
			{ field: 'serialNo', header: 'Sno.', style: "min-width: 70px; text-align: center", sortable:true },
			{ field: 'applicant_name', header: 'Applicant Name', style: "min-width: 150px", sortable: true },
			{ field: 'applicant_cnic', header: 'Applicant CNIC', style: "min-width: 150px", sortable: true },
			{ field: 'father_name', header: 'Father Name', style: "min-width: 150px", sortable:true },
			{ field: 'father_cnic', header: 'Father CNIC', style: "min-width: 150px", sortable:true },
			{ field: 'mother_name', header: 'Mother Name', style: "min-width: 150px", sortable:true },
			{ field: 'mother_cnic', header: 'Mother CNIC', style: "min-width: 150px", sortable:true },
			{ field: 'religion', header: 'Religion', style: "min-width: 100px", sortable:true },
			{ field: 'gender', header: 'Gender', style: "min-width: 100px", sortable:true },
			{ field: 'district_of_birth', header: 'District of Birth', style: "min-width: 150px", sortable:true },
			{ field: 'home_or_hospital', header: 'Place of Birth', style: "min-width: 150px", sortable:true },
			{ field: 'disability', header: 'Disability', style: "min-width: 150px", sortable:true },
			// { field: 'grand_father_name', header: 'Grand Father Name', style: "min-width: 150px", sortable:true },
			// { field: 'grand_father_cnic', header: 'Grand Father CNIC', style: "min-width: 150px", sortable:true },
			{ field: 'address', header: 'Address', style: "min-width: 250px", sortable:true },
			// { field: 'registeredAuthority', header: 'Registered Authority', style: "min-width: 200px" },
			// { field: 'created_at', header: 'Registration Date', style: "min-width: 150px", sortable:true },
			// { field: 'signature', header: 'Signature', style: "min-width: 150px", sortable:true },
			{ field: 'phone_number', header: 'Phone Number', style: "min-width: 150px", sortable:true },
			{ field: 'label', header: 'Verification Status', style: "min-width: 150px", sortable:true, body: statusBodyTemplate },
			{ field: 'action', header: 'Action', style: "min-width: 150px", sortable:true },
		];

		onMounted(() => {
			axios.get('/api/certificates/birth-certificates')
				.then(response => {
					certificates.value = response.data.data.map((item, index) => ({
						...item,
						serialNo: index + 1,
					}));
					console.log(response.data.data);
				})
				.catch(error => {
					console.error('Error fetching certificates:', error);
				});
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

		return {
			certificates,
			columns,
			dt,
			actionItems,
			isDocumentsModalVisible,
			UCLogo,
			exportPDF,
			exportExcel
		};
	},
};
</script>

<style>
/* Add any custom styles if needed */
</style>
