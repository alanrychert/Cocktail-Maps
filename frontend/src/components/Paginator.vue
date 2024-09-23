<template>
    <div class="row justify-content-center">
        <div class="col s4 offset-s4 center-align">
            <ul class="pagination justify-content-center">
                <li class="waves-effect ">
                    <a class="page-link" href="#" @click="prevPage" v-show="currentPage > 1">
                        Anterior
                    </a>
                </li>
                <li class="active page-item">
                    <p class="page-link">{{ currentPage }}</p>
                </li>
                <li class="waves-effect page-item">
                    <a class="page-link" href="#" @click="nextPage" v-show="!lastPage">
                        Siguiente
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "paginator",
    props: ["currentPage", "lastPage"],
    methods: {
        prevPage() {
            let apiPage = this.currentPage - 1;
            this.$emit("update-page", apiPage);
        },
        nextPage() {
            let apiPage = this.currentPage + 1;
            this.$emit("update-page", apiPage);
        },
    },
};
</script>

<style></style>