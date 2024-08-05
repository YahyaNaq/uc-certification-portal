<template>
    <div>
        <div class="btn-group mb-4" role="group">
            <button class="btn btn-success">Birth</button>
            <button class="btn btn-success">Death</button>
            <button class="btn btn-success">Marriage</button>
            <button class="btn btn-success active">Divorce</button>
        </div>
        <DivorceForm />
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-5 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <!-- <a href="/" class="mb-3 mb-md-0 text-muted text-decoration-none lh-1"> -->
                        <img
                            src="../../assets/images/ucLogo.jpg"
                            class="rounded"
                            style="width: 20%;"
                        />
                    <!-- </a> -->
                    <span class="text-muted">&copy; 2021 Company, Inc</span>
                </div>
            </footer>
        </div>
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
