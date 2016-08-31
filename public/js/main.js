Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name=_token]').attr('content')
Vue.component('tasks', {

    template: '#tasks-template',
    
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
            this.$http.post('api/tasks/store', this.task)
            this.fetchTaskList()
        },

        updateTask: function(id) {
            this.$http.patch('api/task/' + id, this.task)
            this.fetchTaskList()
        },

        showTask: function(id) {
            this.edit = true
            this.$http.get('api/task/' + id).then(function(response) {
                this.task.id = response.data.id
                this.task.body = response.data.body
            })
        },

        deleteTask: function (id) {
            this.$http.delete('api/tasks/' + id)
            this.fetchTaskList()
        },
    }
});

new Vue({
    el: 'body'
});