<template>
    <div class="container mx-auto mt-20">
        <h1 class="text-3xl font-bold mb-4">Students</h1>
        <ul>
            <li class="flex justify-between items-center py-2 border-b">
                <span class="text-lg w-1/4">Name</span>
                <span class="text-lg w-1/4">Email</span>
                <span class="text-lg w-1/4">Username</span>
                <span class="w-1/4">Actions</span>
                <!-- Adjust width for Actions -->
            </li>
            <li
                v-for="student in students"
                :key="student.id"
                class="flex justify-between items-center py-2 border-b"
            >
                <span class="text-lg w-1/4">{{ student.name }}</span>
                <span class="text-lg w-1/4">{{ student.email }}</span>
                <span class="text-lg w-1/4">{{ student.username }}</span>
                <span class="w-1/4">
                    <button
                        @click="editStudent(student)"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                    >
                        Edit
                    </button>
                    <button
                        @click="deleteStudent(student)"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    >
                        Delete
                    </button>
                </span>
            </li>
        </ul>
        <button
            @click="goToCreatePage"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block"
        >
            Create User
        </button>
    </div>
</template>

<script>
import { router, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
    setup() {
        const { data } = usePage().props;
        const students = ref(data.students);

        const editStudent = (student) => {
            // Redirect to edit page with student id
            // Note: You need to import useRouter from 'vue-router' to access this.$router
            router.get(`/students/${student.id}/edit`);
        };

        const deleteStudent = (student) => {
            if (confirm("Are you sure you want to delete this student?")) {
                // Perform delete operation
                router.visit(`/students/${student.id}`, { method: "DELETE" });
            }
        };

        const goToCreatePage = () => {
            // this.$inertia.get(route("students.create"));
            router.visit("/students/create");
        };

        return {
            students,
            editStudent,
            deleteStudent,
            goToCreatePage,
        };
    },
};
</script>
