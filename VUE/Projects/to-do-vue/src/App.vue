<template>
  <h1>The To Do List</h1>
  <div id="app">
    <AddTask @add-task="addTask"/>
    <TaskList :tasks="tasks" @delete-task="deleteTask" @toggle-complete="toggleComplete"/>
  </div>
</template>

<script>
import axios from 'axios';

import AddTask from "./components/AddTask.vue";
import TaskList from "./components/TaskList.vue";

export default {  
  name: "App",
  components: {
    AddTask,
    TaskList
  },
  data(){
    return{
      tasks:[]
    };
  },
  mounted(){
    this.getTasks();
  },
  methods:{
    getTasks(){
      axios.get('http://localhost/back/index.php')
      .then(response => {
        this.tasks = response.data;
      })
      .catch(error => {
        console.error('Error fetching tasks:', error);
      });
    },
    addTask(task){
      console.log('Received task:', task); // Debugging
      axios.post(`http://localhost/back/index.php`,task)
      .then(response => {
        console.log('successfull response', response);
        this.getTasks();
      })
      .catch(error => {
        console.error('Error adding task:', error);
      });
    },
    deleteTask(id){
      console.log('Task Deleted requested:', id); // Debugging
      axios.delete(`http://localhost/back/index.php?id=${id}`)
        .then(() => {
          this.getTasks();
        })
        .catch(error => {
          console.error('Error deleting task:', error);
        });
    },
    toggleComplete(id, completed) {
      console.log('app toggle triggered',completed)
      axios.put(`http://localhost/back/index.php?id=${id}`, { completed: !id.completed })
        .then(() => {
          this.getTasks();
        })
        .catch(error => {
          console.error('Error toggling task completion:', error);
        });
    }
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
