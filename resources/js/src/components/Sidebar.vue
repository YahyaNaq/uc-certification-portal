<template>
    <div class="card d-flex justify-content-center">
        <Sidebar v-model:visible="visible">
            <template #container="{ closeCallback }">
                <div class="d-flex flex-column h-100">
                    <div class="d-flex align-items-center justify-content-between px-4 pt-3 flex-shrink-0">
                        <span class="d-inline-flex align-items-center gap-2">
                            <img
                                :src="UCLogo"
                                class="rounded"
                                style="width: 20%;"
                            />
                            <span class="fw-bolder fs-6 text-uppercase">UC Certification Portal</span>
                        </span>
                        <span>
                            <Button
                                type="button"
                                @click="closeCallback"
                                icon="pi pi-times"
                                size="small"
                                text severity="contrast"
                                style="padding:0px;"
                            ></Button>
                        </span>
                    </div>
                    <div class="overflow-auto">
                        <ul class="list-unstyled p-3 m-0">
                            <li>
                                <div
                                    v-ripple
                                    v-styleclass="{
                                        selector: '@next',
                                        enterClass: 'hidden',
                                        enterActiveClass: 'slidedown',
                                        leaveToClass: 'hidden',
                                        leaveActiveClass: 'slideup'
                                    }"
                                    class="p-3 d-flex align-items-center justify-content-between text-secondary cursor-pointer p-ripple"
                                >
                                    <router-link to="/create" class="mx-1 text-muted fs-6 d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple" exact-active-class="fw-semibold fs-5" @click="visible = true">
                                        Forms
                                    </router-link>
                                    <span class="fw-semibold">FAVORITES</span>
                                    <i class="pi pi-chevron-down"></i>
                                </div>
                                <ul class="list-unstyled p-0 m-0 overflow-hidden">
                                    <li>
                                        <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                            <i class="pi pi-home mr-2"></i>
                                            <span class="fw-semibold">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                            <i class="pi pi-bookmark mr-2"></i>
                                            <span class="fw-semibold">Bookmarks</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            v-ripple
                                            v-styleclass="{
                                                selector: '@next',
                                                enterClass: 'hidden',
                                                enterActiveClass: 'slidedown',
                                                leaveToClass: 'hidden',
                                                leaveActiveClass: 'slideup'
                                            }"
                                            class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple"
                                        >
                                            <i class="pi pi-chart-line mr-2"></i>
                                            <span class="fw-semibold">Reports</span>
                                            <i class="pi pi-chevron-down ml-auto"></i>
                                        </a>
                                        <ul class="list-unstyled py-0 pl-3 pr-0 m-0 hidden overflow-hidden transition-all transition-duration-400 transition-ease-in-out">
                                            <li>
                                                <a
                                                    v-ripple
                                                    v-styleclass="{
                                                        selector: '@next',
                                                        enterClass: 'hidden',
                                                        enterActiveClass: 'slidedown',
                                                        leaveToClass: 'hidden',
                                                        leaveActiveClass: 'slideup'
                                                    }"
                                                    class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple"
                                                >
                                                    <i class="pi pi-chart-line mr-2"></i>
                                                    <span class="fw-semibold">Revenue</span>
                                                    <i class="pi pi-chevron-down ml-auto"></i>
                                                </a>
                                                <ul class="list-unstyled py-0 pl-3 pr-0 m-0 hidden overflow-hidden transition-all transition-duration-400 transition-ease-in-out">
                                                    <li>
                                                        <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                                            <i class="pi pi-table mr-2"></i>
                                                            <span class="fw-semibold">View</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                                            <i class="pi pi-search mr-2"></i>
                                                            <span class="fw-semibold">Search</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                                    <i class="pi pi-chart-line mr-2"></i>
                                                    <span class="fw-semibold">Expenses</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                            <i class="pi pi-users mr-2"></i>
                                            <span class="fw-semibold">Team</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                            <i class="pi pi-comments mr-2"></i>
                                            <span class="fw-semibold">Messages</span>
                                            <span class="d-inline-flex align-items-center justify-content-center ml-auto bg-primary rounded-circle" style="min-width: 1.5rem; height: 1.5rem">3</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                            <i class="pi pi-calendar mr-2"></i>
                                            <span class="fw-semibold">Calendar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a v-ripple class="d-flex align-items-center cursor-pointer p-3 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                                            <i class="pi pi-cog mr-2"></i>
                                            <span class="fw-semibold">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-auto">
                        <hr class="mb-3 mx-3 border-top-1 border-light" />
                        <a v-ripple class="m-3 d-flex align-items-center cursor-pointer p-3 gap-2 border rounded text-secondary hover:bg-light transition duration-150 p-ripple">
                            <Avatar image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png" shape="circle" />
                            <span class="fw-semibold">Yahya Faheem</span>
                        </a>
                    </div>
                </div>
            </template>
        </Sidebar>
        <Button icon="pi pi-bars" class="rounded" severity="contrast" @click="visible = true" />
    </div>
</template>

<script setup>
import Button from "primevue/button";
import Sidebar from 'primevue/sidebar';
import Avatar from 'primevue/avatar';
import { ref } from "vue";
import UCLogo from '@/assets/images/ucLogo.jpg';

const visible = ref(false);
</script>

<style scoped>
a {
    text-decoration: none;
    font-size: small;
}
</style>
