<template>
  <div>
    <!-- <input type="checkbox" :checked="task.completed" @change="toggleComplete(task.id, task.completed)" /> -->
    <input type="checkbox" v-model="completed" @change="toggleTask" />
    <span>{{ task.task }}</span>
    <button @click="deleteTask(task.id)">Delete</button>
  </div>
</template>
<script>
export default{
    props: ['task'],
    methods: {
        deleteTask(id){
            console.log('Task Deleted:', id); // Debugging
            this.$emit('delete-task', id);
        },
        toggleComplete(id, completed){
            console.log('Task toggled:', id);
            this.$emit('toggle-complete',id,!completed);
        }
    }
};
</script>