<template>
    <div>
        <div>
            <h3 v-text="this.project.name"></h3>
        </div>

        <ul class="list-group">
            <li class="list group-item" v-for="task in this.tasks" v-text="task"></li>
        </ul>
        <form v-on:submit.prevent="noop">
            <input class="form-control" name="newTask" type="text" placeholder="New Task" @keyup.enter="noop" v-model="this.newTask" @keydown="tagPeers">
            <button class="form-control" name="button" type="submit" @click="save">SEND</button>
            <span v-if="activePeer" v-text="activePeer.name+' is typing...'"> </span>
        </form>
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
            projectId: window.App.projectId,
            chanId: window.App.chanId,
            newTask: '',
            activePeer: false,
            typingTimer: false
            
        }
    },

    computed: {

        channel() {
            
            return window.Echo.private(this.chanId)
        }
    },

    created() {

        console.log(this.chanId)
        
        this.channel
        .listen('TaskCreated', (task) => this.addTask(task.task))
        .listenForWhisper('typing', this.flashActivePeer)
    },

    methods: {
        flashActivePeer(e) {
            this.activePeer = e;

            if(this.typingTimer) clearTimeout(this.typingTimer);

            this.typingTimer = setTimeout(() => this.activePeer = false, 3000);
        },

        tagPeers() {
             this.channel
             .whisper('typing', { name: window.App.userName })
        },

        save() {
            // if (newTask != '') {
                axios.post('/api/projects/'+this.projectId+'/tasks', {body: newTask})
                .then((response) => response.data)
                .then(this.addTask)
               
                

            console.log(newTask + ' is saved')

                this.activePeer = false

                newTask = ''
            // }
        },

        addTask(task) {
            if (this.newTask != '') {
                
                this.activePeer = false
                this.tasks.push(this.newTask)

                console.log(this.newTask +' has been addedd to array too')
                this.newTask = ''
                this.task = ''

            }
            else {
                this.tasks.push(task.body)

                console.log(task.body +' has been addedd to array only')
            }
        },

        noop () {
            // do nothing ?
        }
    }

    
}

</script>
