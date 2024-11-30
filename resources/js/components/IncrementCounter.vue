<script setup>
import { ref } from 'vue'

const counter = ref(0)
const active = ref(true)
const toggle = function () {
    active.value = ! active.value
}
const arr = ref([
    {
        name: 'Vasya',
        old: 20,
        complete: false
    },
    {
        name: 'Kolya',
        old: 30,
        complete: true
    }
])
</script>

<template>
  <button
    type="button"
    @click="counter++"
    class="p-2 text-danger bg-gray-500 rounded"
  >
    Counter is: {{ counter }}
  </button>
  <button
    type="button"
    @click="toggle"
    class="p-2 bg-gray-500 rounded" :class="active ? 'text-danger' : 'text-success'"
  >
    Colored text {{ active }}
  </button>
  <ul>
    <li v-for="user in arr"><label>
        {{ user.name }}
        <input type="checkbox" v-model="user.complete">
    </label></li>
  </ul>
  <pre>
    {{ arr }}
  </pre>
</template>

