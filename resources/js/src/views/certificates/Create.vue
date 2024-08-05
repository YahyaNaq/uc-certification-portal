<template>
    <div>
        <div class="btn-group mb-4" role="group">
            <button class="btn btn-success active">Birth</button>
            <button class="btn btn-success">Death</button>
            <button class="btn btn-success">Marriage</button>
            <button class="btn btn-success">Divorce</button>
        </div>
        <DivorceForm />
    </div>
</template>
  
<script>

import DivorceForm from './DivorceForm.vue';

export default {
    components: {
        DivorceForm,
    },
};
</script>

<style scoped>
    /* Add styles specific to this component */
</style>
