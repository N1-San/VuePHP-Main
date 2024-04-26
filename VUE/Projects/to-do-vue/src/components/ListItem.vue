<template>
  <div>
    <input type="checkbox" v-model="completed" :checked="task.completed" @change="toggleComplete(task.id, task.completed)" />
    <!-- <input type="checkbox" v-model="completed" @change="toggleTask" /> -->
    <span>{{ task.task }}</span>
    <button @click="deleteTask(task.id)">Delete</button>
  </div>
</template>
<script>
export default{
    props: ['task'],
    data(){
      return{
        completed: Boolean,
      }
    },
    methods: {
        deleteTask(id){
            console.log('Task Deleted:', id); // Debugging
            this.$emit('delete-task', id);
        },
        toggleComplete(id,completed){
          console.log(this.completed)
            console.log('Task toggled:', id,this.completed);
            this.$emit('toggle-complete',id,this.completed);
        }
    }
};
</script>