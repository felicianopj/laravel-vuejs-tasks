<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <title>Laravel</title>
    </head>
    <body id="body">
        <div class="container">
            <tasks></tasks>    
        </div>

        <template id="tasks-template">
            <h1>My Tasks</h1>
            <h4>New Task</h4>
            <form action="#" method="POST" @submit.prevent="createTask">
                <span v-if="edit">{{ csrf_field() }} {{ method_field('PATCH') }}</span>
                <div class="input-group">
                    <input v-model="task.body" type="text" name="body" class="form-control" autofocus>
                    <span class="input-group-btn">
                        <button v-if="!edit" type="submit" class="btn btn-primary">New Task</button>
                        <button v-if="edit" @click="updateTask(task.id)" type="button" class="btn btn-primary">Edit Task</button>
                    </span>
                </div>
            </form>
            <h4>All Tasks</h4>
            <ul class="list-group">
                <li class="list-group-item" v-for="task in list">
                    @{{ task.body }}
                    {{ csrf_field() }}
                    <button @click="showTask(task.id)" class="btn btn-primary btn-xs">Edit</button>
                    <button @click="deleteTask(task.id)" class="btn btn-danger btn-xs">Delete</button>
                </li>
            </ul>
        </template>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>       
        <script src="/js/main.js"></script>
    </body>
</html>
