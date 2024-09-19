<template>
    <div>
        <!-- Navbar -->
        <!-- <Sidebar /> -->
        <nav class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-between">
                    <div class="d-flex gap-3 align-items-center mb-2 mb-lg-0 text-white">
                        <img
                        :src="UCLogo"
                        class="rounded"
                        style="width: 10%;"
                        />
                        <span class="fs-3 fw-semibold text-uppercase w-50 text-wrap lh-sm">UC Certification Portal</span>
                    </div>

                    <ul class="nav w-full col-12 col-lg-auto me-l-auto mb-2 justify-content-end align-items-center mb-md-0">
                        <li>
                            <router-link to="/" class="nav-link mx-1 text-white" exact-active-class="fw-semibold fs-5">
                                Certificates
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/create" class="nav-link mx-1 text-white" exact-active-class="fw-semibold fs-5">
                                Forms
                            </router-link>
                        </li>
                        <!-- <li>
                            <router-link to="/about" class="nav-link mx-1 text-white" exact-active-class="fw-semibold fs-5">
                                About
                            </router-link>
                        </li> -->
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
import UCLogo from './assets/images/ucLogo.jpg';
import { ref } from 'vue';

export default {
    // name: 'App',
    components: {
        // Sidebar,
    },
    setup() {
        const UClogo = ref(UCLogo);

        return {
            UCLogo
        };
    }
};
</script>

<style>
.fs-4-1 {
    font-size: 18px;
};
.p-dropdown-items{
    padding:0;
	margin:0;
}
.p-menuitem-link{
	color: black;
	text-decoration: none;
}
.p-tieredmenu-root-list {
	padding:0;
	margin:0;
}
.p-splitbutton{
	border-radius: 2px !important;
}
.p-splitbutton-menubutton{
    border-radius: 0 6px 6px 0;
}
.p-splitbutton-defaultbutton{
    border-radius: 6px 0 0 6px;
}
</style>