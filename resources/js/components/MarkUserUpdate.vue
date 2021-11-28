<template>
    <div class="mark-user-update">
        <h2>Редактировать</h2>
        <p>id: {{ data.id }}</p>
        <mark-desc v-bind:data=data.mark></mark-desc>
        <mark-user-inputs v-bind:data=data></mark-user-inputs>
        <input @click="editMark()" type="button" value="Сохранить">
        <input @click="deleteMark()" type="button" value="Удалить">
        <a v-bind:href="'/mark/'+ data.mark.id">Основная марка</a>
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "MarkUserUpdate",
    data: function() {
        return {
            data:{},
        }
    },
    props:{
        id:null,
    },
    mounted() {
        axios.get('/api/markuser/'+this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data = res.data;
                }
            });
    },
    methods:{
        editMark() {
            axios.put('/api/markuser/' + this.data.id, {
                params: this.data
            })
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = '/markuser/' + this.data.id;
                    }
                });
        },
        deleteMark() {
            axios.delete('/api/markuser/' + this.id)
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = "/marks";
                    }
                });
        },

    }
}
</script>

<style scoped>

</style>
