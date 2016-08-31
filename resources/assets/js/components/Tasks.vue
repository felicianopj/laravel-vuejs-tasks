<template>
    <h1>My Tasks</h1>
    <h4>New Task</h4>
    <form action="#" @submit.prevent="edit ? updateTask(task.id) : createTask()">
        <div class="input-group">
            <input v-model="task.body" v-el:taskinput type="text" name="body" class="form-control" autofocus>
            <span class="input-group-btn">
                <button v-show="!edit" type="submit" class="btn btn-primary">New Task</button>
                <button v-show="edit" type="submit" class="btn btn-primary">Edit Task</button>
            </span>
        </div>
    </form>
    <h4>All Tasks</h4>
    <ul class="list-group">
        <li class="list-group-item" v-for="task in list">
            {{ task.body }}
            <button @click="showTask(task.id)" class="btn btn-primary btn-xs">Edit</button>
            <button @click="deleteTask(task.id)" class="btn btn-danger btn-xs">Delete</button>
        </li>
    </ul>
</template>

<script>
    export default {
        data: function() {
            return {
                edit: false,
                list: [],
                task: {
                    id: '',
                    body: ''
                }
            };
        },
        
        ready: function() {
            this.fetchTaskList();
        },
        
        methods: {
            fetchTaskList: function() {
                this.$http.get('api/tasks').then(function (response) {
                    this.list = response.data
                });
            },

            createTask: function () {
                this.$http.post('api/task/store', this.task)
                this.task.body = ''
                this.edit = false
                this.fetchTaskList()
            },

            updateTask: function(id) {
                this.$http.patch('api/task/' + id, this.task)
                this.task.body = ''
                this.edit = false
                this.fetchTaskList()
            },

            showTask: function(id) {
                this.$http.get('api/task/' + id).then(function(response) {
                    this.task.id = response.data.id
                    this.task.body = response.data.body
                })
                this.$els.taskinput.focus()
                this.edit = true
            },

            deleteTask: function (id) {
                this.$http.delete('api/task/' + id)
                this.fetchTaskList()
            },
        }
    }
</script>