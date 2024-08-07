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
            <!-- <h1>B</h1> -->
            <BirthForm />
        </div>
        <div v-if="selectedForm === 'Death'">
            <!-- <h1>D</h1> -->
            <DeathForm />
        </div>
        <div v-if="selectedForm === 'Marriage'">
            <!-- <h1>M</h1> -->
            <MarriageForm />
        </div>
        <div v-if="selectedForm === 'Divorce'">
            <!-- <h1>Div</h1> -->
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
                <span class="text-muted">&copy; 2024 UC-Gulshan</span>
                </div>
            </footer>
        </div>
        <Button label="Check" icon="pi pi-check"></Button>
    </div>
</template>

<script>
import { ref } from 'vue';
import DivorceForm from './DivorceForm.vue';
import MarriageForm from './DivorceForm.vue';
import DeathForm from './DivorceForm.vue';
import BirthForm from './DivorceForm.vue';
import Button from "primevue/button"

export default {
    components: {
        DivorceForm,
        MarriageForm,
        DeathForm,
        BirthForm,
        Button
    },
    setup() {
        const selectedForm = ref('Divorce');

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
    /* .btn.active {
    background-color: #28a745;
    color: white;
    } */
</style>
