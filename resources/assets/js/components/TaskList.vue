<template>
    <div>
        <ul class="list-group">
            <li class="list group-item" v-for="task in tasks" v-bind:key="task" v-text="task.body"></li>
        </ul>
        <input class="form-control" type="text" placeholder="New Task" v-model="newTask" @blur="save" @keydown="tagPeers">
        <span v-if="activePeer" v-text="activePeer.name"> is typing...</span>
    </div>
</template>

<script>
export default {

    props: ['project', 'tasks', 'projectId'],


    data() {
        return {
            
            project: project,
            newTask: '',
            activePeer: false,
            typingTimer: false,
            // tasks: tasks
        }
    },

    created() {
        
        window.Echo.private('tasks.' + 1)
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
             window.Echo.private('tasks.1')
             .whisper('typing', { name: 'hasan' })
        },
        
        save() {
            axios.post('/api/projects/1/tasks', {body: this.newTask})
            .then(response => response.data)
            .then(this.addTask)
        },

        addTask(task) {
            console.log(task)
            this.activePeer = false
            this.project.tasks.push(task)
            this.newTask = ''
        }
    }

    
}

</script>
