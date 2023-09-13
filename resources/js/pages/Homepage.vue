<template>
    <div class="w-full flex justify-center">
        <div class="w-1/2 flex flex-col justify-center items-center rounded-md p-2 m-5 shadow-lg border border-gray-200">
            <h3 class="font-semibold text-2xl m-3">Task Manager</h3>
            <draggable v-model="list" 
            :animation="200"
            ghost-class="move-event"
            group="users"
            class="w-full max-w-md">
                <transition-group>
                    <li v-for="element in list" :key="element.id"
                        class="p-4 mb-3 flex justify-between items-center bg-white shadow-md rounded-lg cursor-move border border-gray-200"
                    >
                        <div class="flex items-center w-full">
                            <div class="flex flex-col w-full">
                                <p class="ml-2 text-gray-700 font-semibold font-sans tracking-wide">{{element.name}}</p>
                                <p class="ml-2 text-gray-500">Description: {{element.description}}</p>
                                <p class="ml-2 text-gray-500">Project: {{element.project.name}}</p>
                            </div>
                            <div class="flex justify-end w-1/2">
                                <button class="p-1 focus:outline-none focus:shadow-outline text-blue-400 hover:text-blue-600"><font-awesome-icon icon="fa-edit" /></button>
                                <button class="p-1 focus:outline-none focus:shadow-outline text-red-400 hover:text-red-600"><font-awesome-icon icon="fa-trash" /></button>
                            </div>
                        </div>
                    </li>
                </transition-group>
            </draggable>
            <div class="flex justify-center w-full">
                <button class="w-1/5 h-10 m-2 rounded-sm bg-blue-200" @click="showTaskModal = true">Create Task</button>
                <button class="w-1/5 h-10 m-2 rounded-sm bg-blue-200" @click="showProjectModal = true">Create new project</button>
            </div>
        </div>
    </div>
    <!-- use the modal component -->
    <transition name="modal">
        <div class="w-1/2" v-if="showTaskModal" @close="showTaskModal = false">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                    
                    <h3 class="font-semibold m-3">Create a new task</h3>

                    <div class="row m-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium">Name</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
                    </div>
                    <div class="row m-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium">Description</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
                    </div>
                    <div class="modal-footer flex justify-center">
                        <slot name="header">
                            <button class="w-1/5 h-10 m-2 rounded-sm bg-green-200" @click="showTaskModal = false">Create</button>
                            <button class="w-1/5 h-10 m-2 rounded-sm bg-red-200" @click="showTaskModal = false">Close</button>
                        </slot>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
     <!-- use the modal component -->
    <transition name="modal">
        <div class="w-1/2" v-if="showProjectModal" @close="showProjectModal = false">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                    
                    <h3 class="font-semibold m-3">Create a new project</h3>

                    <div class="row m-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium">Name</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
                    </div>
                    <div class="row m-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium">Description</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
                    </div>
                    <div class="modal-footer flex justify-center">
                        <slot name="header">
                            <button class="w-1/5 h-10 m-2 rounded-sm bg-green-200" @click="showProjectModal = false">Create</button>
                            <button class="w-1/5 h-10 m-2 rounded-sm bg-red-200" @click="showProjectModal = false">Close</button>
                        </slot>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import { VueDraggableNext } from 'vue-draggable-next'
export default {
    name: 'Hompeage',
    components: {
         draggable: VueDraggableNext,
    },
    data () {
        return {
            form:{},
            showTaskModal:false,
            showProjectModal:false,
            list:[
                {"id": 1, "name": "test", "description": "This is an description", "project": {
                    "name": "test project"
                }},
                {"id": 2, "name": "test2", "description": "This is an description", "project": {
                    "name": "test project"
                }},
                {"id": 3, "name": "test3", "description": "This is an description", "project": {
                    "name": "test project"
                }},
            ]
        }
    },
    methods: {
    }
}
</script>