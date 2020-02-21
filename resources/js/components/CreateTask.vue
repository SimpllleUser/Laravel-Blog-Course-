<template>
    <div>
        <h1>Create {{text}} : {{some_text()}}</h1>


            <select v-model="status_task">
                <option>Status</option>
              <option v-for="(stat, index) in statuses" :key="index" v-bind:value="{id:index}" >{{stat}}</option>
            </select>

                                <select v-model="type_task">
              <option v-for="(type, index) in types" :key="index" v-bind:value="{id:index}" >{{type}}</option>
            </select>
        <div class="form-group">
            <label for="title-task">Title-task</label>
            <input type="text" class="form-control" id="title-task">
        </div>
        <h1>Status - {{status_task.id}}</h1>
        <h1>Type - {{type_task.id}}</h1>
</div>
</template>

<script>
    import axios from "axios";
    export default {

        props: ['types', 'statuses'],
        data() {
            return {
                text: 'task',
                status_task: [],
                type_task: []
            }
        },
        methods: {
            some_text() {
                return "Hello!"
            },
            send_data() {

            }
        }
    }
</script>
