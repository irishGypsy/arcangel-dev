<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <carousel>
                    <img class="img-fluid" v-for="(img, index) in images" :src="img.path" :key="index">
                </carousel>
            </div>
        </div>
    </div>
</template>
<script>
import carousel from "vue-owl-carousel";
export default {
    components: {
        carousel
    },
    name: "Owl Carousel",
    props: {
        msg: String
    },
    data() {
        return {
            images: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:3000/slider')
            .then(response => {
                this.images = response.data;
            });
    }
};
</script>
