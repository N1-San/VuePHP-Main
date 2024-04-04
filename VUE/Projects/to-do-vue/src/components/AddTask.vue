<template>
  <div>
    <h1>Add Task</h1>
    <input v-model="task" type="text" placeholder="Enter New Task">
    <button @click="addTask">Add Task</button>
  </div>
</template>
<script>
export default{
    data(){
        return{
            task:''
        };
    },
    methods:{
        addTask(){
            console.log('Adding task:', this.task);
            this.$emit('add-task', this.task);
            this.task='';
        }
    }
};
</script>
