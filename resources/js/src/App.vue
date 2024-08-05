<template>
    <div>
        <!-- Navbar -->
        <!-- <Sidebar /> -->
        <nav class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-between">
                    <div class="d-flex gap-3 align-items-center mb-2 mb-lg-0 text-white">
                        <img
                        src="./assets/images/ucLogo.jpg"
                        class="rounded"
                        style="width: 10%;"
                        />
                        <span class="fs-3 fw-semibold text-uppercase w-50 text-wrap lh-sm">UC Certification Portal</span>
                    </div>

                    <ul class="nav w-full col-12 col-lg-auto me-l-auto mb-2 justify-content-end mb-md-0">
                        <li><a href="#" class="nav-link px-2 text-secondary">Certificates</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Forms</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                    </ul>

                    <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                    </form> -->

                    <!-- <div class="text-end">
                        <button type="button" class="btn btn-outline-light me-2">Login</button>
                        <button type="button" class="btn btn-warning">Sign-up</button>
                    </div> -->
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container my-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script scoped>
// import Sidebar from './components/Sidebar.vue';
// import UCLogo from './assets/images/ucLogo.jpg';

export default {
    // name: 'App',
    components: {
        // Sidebar,
    },
};
</script>

<style>
/* Optionally add custom styles here */
</style>