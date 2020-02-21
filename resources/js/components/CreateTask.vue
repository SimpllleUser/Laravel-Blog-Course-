<template>
    <div>
        <h1>Create  : {{some_text()}}</h1>

        <input type="text">
            <select v-model="status_task">
                <option>Status</option>
              <option v-for="(stat, index) in statuses" :key="index" v-bind:value="{id:index}" >{{stat}}</option>
            </select>

                                <select v-model="type_task">
              <option v-for="(type, index) in types" :key="index" v-bind:value="{id:index}" >{{type}}</option>
            </select>
        <div class="form-group">
            <label for="title-task">Title-task</label>
            <input type="text" v-model="title" class="form-control" id="title-task">
        </div>
        <h1>{{title}}</h1>
        <h1>Status - {{status_task.id}}</h1>
        <h1>Type - {{type_task.id}}</h1>
        <button @click="send_data()">Send</button>
</div>
</template>

<script>
    import axios from "axios";
    export default {

        props: ['types', 'statuses'],
        data() {
            return {
                title: '',
                status_task: [],
                type_task: []
            }
        },
        methods: {
            some_text() {
                return "Hello!"
            },
            send_data() {
                console.log(':Sadas')
                let data = {
                    title: this.title,
                    slug: this.title,
                    user_id: '1',
                    type_id: this.type_task,
                    statu_id: this.status_task,

                }
                axios.post('http://127.0.0.1:8000/create_task/', data)
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>
