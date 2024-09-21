<template>
	<div class="container mx-auto">
		<TaskForm @form-submitted="fetchTasks" ref="taskForm" />
		<TaskList @edit-task="handleEdit" ref="taskList" />
	</div>
</template>

<script>
import TaskList from './components/TaskList.vue';
import TaskForm from './components/TaskForm.vue';

export default {
	components: {
		TaskList,
		TaskForm
	},
	methods: {
		handleEdit(task) {
			this.$refs.taskForm.editTask(task);
		},
		fetchTasks() {
			this.$refs.taskList.fetchTasks();
		}
	}
};
</script>

<style>
.container {
	max-width: 800px;
}
</style>
