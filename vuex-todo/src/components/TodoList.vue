<template>
    <div>
      <TodoItem v-for="(todo, index) in todos" :key="index" :todo="todo" />
    </div>
</template>

<script>
import TodoItem from "./TodoItem";
export default {
    components:{
        TodoItem
    },
    computed:{
        todos(){
            return this.$store.state.todos;
        }
    }
}
</script>

<style>

</style>