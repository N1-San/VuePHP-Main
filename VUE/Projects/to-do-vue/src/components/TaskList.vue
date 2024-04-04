<template>
  <div>
    <ListItem v-for="task in tasks" :key="task.id" :task="task" @delete-task="deleteTask" @toggle-complete="toggleComplete"/>
  </div>
</template>
  <script>
import ListItem from "./ListItem.vue";

export default{
    props:['tasks'],
    components:{
        ListItem
    },
    methods:{
        deleteTask(id){
            this.$emit('delete-task', id);
        },
        toggleComplete(id,completed){
            this.$emit('toggle-complete',id,completed);
        }
    }
};

</script>