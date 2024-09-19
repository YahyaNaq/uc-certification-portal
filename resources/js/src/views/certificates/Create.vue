<template>
    <div>
        <div class="btn-group mb-4" role="group">
            <button
                class="btn btn-success"
                :class="{'btn-success active': selectedForm === 'Birth' }"
                @click="selectForm('Birth')"
            >
                Birth
            </button>
            <button
                class="btn btn-success"
                :class="{'btn-success active': selectedForm === 'Death' }"
                @click="selectForm('Death')"
            >
                Death
            </button>
            <button
                class="btn btn-success"
                :class="{'btn-success active': selectedForm === 'Marriage' }"
                @click="selectForm('Marriage')"
            >
                Marriage
            </button>
            <button
                class="btn btn-success"
                :class="{'btn-success active': selectedForm === 'Divorce' }"
                @click="selectForm('Divorce')"
            >
                Divorce
            </button>
        </div>

        <div v-if="selectedForm === 'Birth'">
            <BirthForm />
        </div>
        <div v-if="selectedForm === 'Death'">
            <DeathForm />
        </div>
        <div v-if="selectedForm === 'Marriage'">
            <MarriageForm />
        </div>
        <div v-if="selectedForm === 'Divorce'">
            <DivorceForm />
        </div>

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-5 border-top">
                <div class="col-md-4 d-flex align-items-center">
                <img
                    src="../../assets/images/ucLogo.jpg"
                    class="rounded"
                    style="width: 20%;"
                />
                <span class="text-muted">&copy; 2024 UC-05 Gulshan</span>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import DivorceForm from './DivorceForm.vue';
import MarriageForm from './MarriageForm.vue';
import DeathForm from './DeathForm.vue';
import BirthForm from './BirthForm.vue';

export default {
    components: {
        DivorceForm,
        MarriageForm,
        DeathForm,
        BirthForm,
    },
    setup() {
        const selectedForm = ref('Birth');

        const selectForm = (form) => {
            selectedForm.value = form;
        };

        return {
            selectedForm,
            selectForm
        };
    }
};
</script>

<style>
.p-dropdown-items{
    padding:0;
	margin-bottom:0;
}
</style>
