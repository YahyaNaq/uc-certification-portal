<template>
	<div>
		<h1 class="fs-3 mb-2">Divorce Certificates</h1>
		<DataTable :value="certificates">
			<Column
				v-for="col in columns"
				:key="col.field"
				:field="col.field"
				:header="col.header"
			></Column>
		</DataTable>
	</div>
</template>

<script>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

export default {
	components: {
		DataTable,
		Column
	},
	setup() {
		// Sample data representing divorce certificates
		let certificates = [
			{
				divorcerName: 'John Doe',
				divorcerCnic: '12345-6789012-3',
				divorcerFatherName: 'Robert Doe',
				divorcerFatherCnic: '12345-6789012-3',
				divorcerAddress: '123 Main St',
				divorceeName: 'Jane Smith',
				divorceeCnic: '12345-6789012-4',
				divorceeFatherName: 'William Smith',
				divorceeFatherCnic: '12345-6789012-4',
				divorceeAddress: '456 Elm St',
				authority: 'Court Authority',
				details: 'Details of the divorce and custody of children',
				place: 'New York',
				arbitration: 'Details of the arbitration proceeding',
				children: 2,
				husbandDivorces: 0,
				wifeDivorces: 1,
				reconciliation: '2022-01-01',
				notice: '2022-02-01',
				registration: '2022-03-01',
				marriage: '2010-05-01',
				effectiveness: '2022-04-01',
				signature: 'John Doe',
				cellNo: '0321-1234567'
			},
			// Add more records as needed
		];

		const columns = [
			{ field: 'divorcerName', header: 'Divorcer Name', style: "width: 100%" },
			{ field: 'divorcerCnic', header: 'Divorcer CNIC', style: "width: 25%" },
			{ field: 'divorcerFatherName', header: 'Divorcer Father Name', style: "width: 25%" },
			{ field: 'divorcerFatherCnic', header: 'Divorcer Father CNIC', style: "width: 25%" },
			{ field: 'divorcerAddress', header: 'Divorcer Address', style: "width: 25%" },
			{ field: 'divorceeName', header: 'Divorcee Name', style: "width: 25%" },
			{ field: 'divorceeCnic', header: 'Divorcee CNIC', style: "width: 25%" },
			{ field: 'divorceeFatherName', header: 'Divorcee Father Name', style: "width: 25%" },
			{ field: 'divorceeFatherCnic', header: 'Divorcee Father CNIC', style: "width: 25%" },
			{ field: 'divorceeAddress', header: 'Divorcee Address', style: "width: 25%" },
			{ field: 'authority', header: 'Authority for Divorce', style: "width: 25%" },
			{ field: 'details', header: 'Details of Divorce', style: "width: 25%" },
			{ field: 'place', header: 'Place of Marriage', style: "width: 25%" },
			{ field: 'arbitration', header: 'Arbitration Details', style: "width: 25%" },
			{ field: 'children', header: 'Number of Children', style: "width: 25%" },
			{ field: 'husbandDivorces', header: 'Husband\'s Previous Divorces', style: "width: 25%" },
			{ field: 'wifeDivorces', header: 'Wife\'s Previous Divorces', style: "width: 25%" },
			{ field: 'reconciliation', header: 'Reconciliation Failure Date', style: "width: 25%" },
			{ field: 'notice', header: 'Notice Date', style: "width: 25%" },
			{ field: 'registration', header: 'Registration Date', style: "width: 25%" },
			{ field: 'marriage', header: 'Marriage Date', style: "width: 25%" },
			{ field: 'effectiveness', header: 'Divorce Effective Date', style: "width: 25%" },
			{ field: 'signature', header: 'Signature', style: "width: 25%" },
			{ field: 'cellNo', header: 'Cell No', style: "width: 25%" }
		];

		return {
			certificates,
			columns
		};
	},
};
</script>

<style>
/* Add any custom styles if needed */
</style>
