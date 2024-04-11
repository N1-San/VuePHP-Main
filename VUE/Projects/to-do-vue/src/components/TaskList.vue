<template>
  <div>
    <h2>Task List</h2>
    <ListItem v-for="(task,index) in tasks" :key="index" :task="task" :completed="task.completed" @delete="deleteTask" @toggle-complete="toggleComplete"/>
    <!-- <ListItem v-for="task in tasks" :key="task.id" :task="task" @delete-task="deleteTask" @toggle-complete="toggleComplete"/> -->
  </div>
</template>
  <script>
import ListItem from "./ListItem.vue";

export default{
    // props:['tasks'],
    props:{
      tasks:{
        type: Array,
        default:()=>[]
      }
    },
    components:{
        ListItem
    },
    methods:{
        deleteTask(id){
          console.log('delete button clicked');
            this.$emit('delete', id);
        },
        toggleComplete(id,completed){
            this.$emit('toggle-complete',id,completed);
        }
    }
};

</script>