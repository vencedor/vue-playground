<template>
  <div style="width:250px;margin:5px auto;display:flex;justify-content:space-between;border-top:1px dashed #CCC;padding-top:15px;">
        <input type="text" v-model="newTodoItem" ref="todoinput" @keyup.enter="addNewTodoItem()" />
        <button @click="addNewTodoItem()">submit</button>
  </div>
</template>

<script>
export default {
    data(){
        return {
            newTodoItem:""
        }
    },
    methods:{
        addNewTodoItem(){
            this.$store.dispatch('addNewTodo',this.newTodoItem);
            this.newTodoItem='';
            this.$refs.todoinput.focus();
        }
    },
    mounted:function(){
        this.$refs.todoinput.focus();
    }
}
</script>

<style>

</style>