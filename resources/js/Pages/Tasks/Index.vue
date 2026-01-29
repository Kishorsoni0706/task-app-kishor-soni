<script setup>
import { useForm } from '@inertiajs/vue3'

defineProps({
    tasks: Object,
})

/*
|--------------------------------------------------------------------------
| Create / Edit Form
|--------------------------------------------------------------------------
*/
const form = useForm({
    id: null,
    title: '',
    description: '',
    status: 'pending',
})

function submit() {
    if (form.id) {
        form.put(`/tasks/${form.id}`, {
            onSuccess: resetForm,
        })
    } else {
        form.post('/tasks', {
            onSuccess: resetForm,
        })
    }
}

function editTask(task) {
    form.id = task.id
    form.title = task.title
    form.description = task.description
    form.status = task.status
}

function resetForm() {
    form.reset()
    form.clearErrors()
    form.id = null
}

function deleteTask(id) {
    if (confirm('Are you sure?')) {
        form.delete(`/tasks/${id}`)
    }
}
</script>

<template>
    <div style="max-width: 600px; margin: auto">
        <h1>Task Manager</h1>

        <!-- FORM -->
        <form @submit.prevent="submit">
            <div>
                <input
                    v-model="form.title"
                    placeholder="Task title"
                />
                <div v-if="form.errors.title" style="color:red">
                    {{ form.errors.title }}
                </div>
            </div>

            <div>
                <textarea
                    v-model="form.description"
                    placeholder="Description"
                />
            </div>

            <div>
                <select v-model="form.status">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <button type="submit">
                {{ form.id ? 'Update Task' : 'Create Task' }}
            </button>

            <button
                v-if="form.id"
                type="button"
                @click="resetForm"
            >
                Cancel
            </button>
        </form>

        <hr />

        <!-- TASK LIST -->
        <ul>
            <li v-for="task in tasks.data" :key="task.id">
                <strong>{{ task.title }}</strong>
                ({{ task.status }})

                <button @click="editTask(task)">Edit</button>
                <button @click="deleteTask(task.id)">Delete</button>
            </li>
        </ul>
    </div>
</template>
