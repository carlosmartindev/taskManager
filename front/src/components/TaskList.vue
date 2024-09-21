<template>
	<div class="p-5">
		<h2 class="text-2xl font-bold mb-4 text-verde">Lista de Tareas</h2>
		<div class="bg-white shadow-md rounded-lg p-4">
			<ul>
				<li v-for="task in tasks" :key="task.id" class="flex justify-between items-center mb-2">
					<div>
						<strong>{{ task.titulo }}</strong>
						<p class="text-gray-600">{{ task.descripcion }}</p>
						<p class="text-gray-500">Estado: {{ task.estado }}</p>
					</div>
					<div>
						<button @click="editTask(task)" class="text-verde hover:underline">Editar</button>
						<button @click="deleteTask(task.id)" class="text-red-500 hover:underline ml-2">Eliminar</button>
					</div>
				</li>
			</ul>
		</div>
	</div>
</template>

<script>
import axios from 'axios';

export default {
	data() {
		return {
			tasks: []
		};
	},
	methods: {
		async fetchTasks() {
			const response = await axios.get(process.env.VUE_APP_API_URL);
			this.tasks = response.data;
		},
		async deleteTask(id) {
			try {
				const response = await axios.delete(process.env.VUE_APP_API_URL, { data: { id } });
				console.log("Respuesta del servidor:", response.data);
				if (response.data.success) {
					this.fetchTasks();
				} else {
					console.error("Error al eliminar la tarea:", response.data.error);
				}
			} catch (error) {
				console.error("Error al realizar la solicitud:", error.response ? error.response.data : error.message);
			}
			},
		editTask(task) {
			this.$emit('edit-task', task);
		}
	},
	mounted() {
		this.fetchTasks();
	}
};
</script>

<style scoped>
/* Estilos personalizados si es necesario */
</style>
