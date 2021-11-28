<template>
    <div class="mark-new">
        <h2>Создать новый</h2>
        <mark-inputs v-bind:data=data></mark-inputs>
        <input class="btn btn-primary" @click="saveNewMark()" type="button" value="Сохранить">
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "MarkNew",
    data() {
        return {
            data: {
                year: '',
                country: {name: ''},
                denomination: '',
                material: '',
                diameter: '',
                coin_weight: '',
                circulation: '',
                edge: '',
                features: '',
                images: null,
            },
            files: '',
        }
    },
    methods: {
        saveNewMark() {
            axios.post('/api/mark/', {
                params: this.data
            })
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = '/mark/' + res.data;
                    }
                    console.log(res.data);
                });
        },
    },
}
</script>

<style scoped>
.mark-new .slide-img{
    width: 300px;
    height: 300px;
}
</style>
