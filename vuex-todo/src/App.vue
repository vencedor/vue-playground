<template>
  <div id="app">
    <img style="max-height:30px;" alt="Vue logo" src="./assets/logo.png">
    <h1>Todos</h1>
    <h3>Done: {{completedTodos}}</h3>
    <h3>Pending:{{pendingTodos}}</h3>
    <TodoList />
    <TodoForm />
  </div>
</template>

<script>
import {mapGetters} from "vuex";
import TodoList from './components/TodoList.vue';
import TodoForm from './components/TodoForm.vue';

export default {
  name: 'App',
  components: {
    TodoList,
    TodoForm
  },
  computed:{
    ...mapGetters({
      completedTodos: "completedTodos",
      pendingTodos: "pendingTodos"
    })
  }
}
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
