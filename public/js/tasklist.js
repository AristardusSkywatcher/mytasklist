

// require('./bootstrap');

// window.Vue = require('vue');

new Vue({
    
    el: '#tasklistapp',
    name: 'tasklistapp',
    props: ['project', 'tasks', 'projectId'],


    data() {
        return {
            newTask: '',
            activePeer: false,
            typingTimer: false
        }
    },

    created() {
        console.log(this.projectId)
        window.Echo.private('tasks.' + this.projectId)
        .listen('TaskCreated', ({task}) => this.addTask(task))
        .listenForWhisper('typing', this.flashActivePeer)
    },

    methods: {
        flashActivePeer(e) {
            this.activePeer = e;

            if(this.typingTimer) clearTimeout(this.typingTimer);

            this.typingTimer = setTimeout(() => this.activePeer = false, 3000);
        },

        tagPeers() {
             window.Echo.private('tasks.' + this.projectId)
             .whisper('typing', { name: window.App.name })
        },
        
        save() {
            axios.post('/api/projects/${this.projectId}/tasks', {body: this.newTask})
            .then(response => response.data)
            .then(this.addTask)
        },

        addTask(task) {
            this.activePeer = false
            this.project.tasks.push(task)
            this.newTask = ''
        }
    }
});