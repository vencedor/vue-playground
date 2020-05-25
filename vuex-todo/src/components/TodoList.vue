<template>
    <div>
      <TodoItem v-for="(todo, index) in todos" :key="index" :todo="todo" />
    </div>
</template>

<script>
import {mapState} from "vuex";
import TodoItem from "./TodoItem";
export default {
    components:{
        TodoItem
    },
    computed:{
        ...mapState({
            todos: 'todos'
        })
    }
}
</script>

<style>

</style>