<template>
  <div id="app">
    <img style="max-height:30px;" alt="Vue logo" src="./assets/logo.png">
    <h1>Todos</h1>
    <h3>Done: {{$store.getters.completedTodos}}</h3>
    <h3>Pending:{{$store.getters.pendingTodos}}</h3>
    <TodoList />
    <TodoForm />
  </div>
</template>

<script>
import TodoList from './components/TodoList.vue'
import TodoForm from './components/TodoForm.vue'

export default {
  name: 'App',
  components: {
    TodoList,
    TodoForm
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
