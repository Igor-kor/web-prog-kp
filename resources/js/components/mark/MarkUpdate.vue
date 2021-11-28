<template>
    <div class="mark-update">
        <h2>Редактировать</h2>
        <p>id: {{ data.id }}</p>
        <mark-inputs v-bind:data=data></mark-inputs>
        <input @click="editMark()" type="button" value="Сохранить">
        <input @click="deleteMark()" type="button" value="Удалить">
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "MarkUpdate",
    data: function() {
        return {
            data:{},
        }
    },
    props:{
        id:null,
    },
    mounted() {
        axios.get('/api/mark/'+this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data = res.data;
                }
            });
    },
    methods: {
        editMark() {
            axios.put('/api/mark/'+ this.data.id, {
                params: this.data
            })
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = '/mark/' + res.data;
                    }
                });
        },
        deleteMark() {
            axios.delete('/api/mark/'+this.id)
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = "/mark";
                    }
                });
        }
    }
}
</script>

<style scoped>

</style>
