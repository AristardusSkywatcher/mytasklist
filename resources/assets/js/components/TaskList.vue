<template>
    <div>
        <div>
            <h3 v-text="this.project.name"></h3>
        </div>

        <ul class="list-group">
            <li class="list group-item" v-for="task in this.tasks" :key="task.id" v-text="task"></li>
        </ul>
        <input class="form-control" name="task" type="text" placeholder="New Task" v-model="this.newTask" @blur="save" @keydown="tagPeers">
        <span v-if="activePeer" v-text="activePeer.name+' is typing...'"> </span>
    </div>
</template>

<script>
export default {

    // props: ['project', 'tasks', 'projectId'],


    data() {
        return {
            
            project: window.App.project,
            // tasks: [],
            tasks: window.App.tasks,
            newTask: '',
            activePeer: false,
            typingTimer: false
            
        }
    },

    computed: {

        channel() {

            return Echo.private('tasks.1')
        }
    },

    created() {
        
        Echo.private('tasks.1')
        // .listen('.App\\Events\\TaskCreated', ({task}) => this.addTask(task))
        .listen('.App\\Events\\TaskCreated', ({newTask}) => {
           this.task = newTask
           console.log('event olustu mu')
        })
        .listenForWhisper('typing', this.flashActivePeer)
        
        
    },

    methods: {
        flashActivePeer(e) {
            this.activePeer = e;

            if(this.typingTimer) clearTimeout(this.typingTimer);

            this.typingTimer = setTimeout(() => this.activePeer = false, 3000);
        },

        tagPeers() {
             Echo.private('tasks.1')
             .whisper('typing', { name: window.App.userName })
        },

        save() {
            if (newTask != '') {
                axios.post('/api/projects/1/tasks', {body: newTask})
                .then(response => {})
                .then(this.addTask)
                .then(newTask)
            }
        },

        addTask(task) {
            if (newTask != '') {
                
                this.activePeer = false
                this.tasks.push(newTask)

                console.log(newTask +' has been addedd')
                newTask = ''

                
            }
        }
    }

    
}

</script>
