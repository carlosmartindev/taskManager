<template>
	<div class="p-5">
		<h2 class="text-2xl font-bold mb-4 text-verde">{{ isEditing ? 'Editar Tarea' : 'Nueva Tarea' }}</h2>
		<form @submit.prevent="submitForm" class="bg-white shadow-md rounded-lg p-4">
			<div class="mb-4">
				<label class="block text-gray-700">Título</label>
				<input type="text" v-model="task.titulo" class="mt-1 p-2 border rounded w-full" required />
			</div>
			<div class="mb-4">
				<label class="block text-gray-700">Descripción</label>
				<textarea v-model="task.descripcion" class="mt-1 p-2 border rounded w-full"></textarea>
			</div>
			<div class="mb-4">
				<label class="block text-gray-700">Estado</label>
				<select v-model="task.estado" class="mt-1 p-2 border rounded w-full">
					<option value="pendiente">Pendiente</option>
					<option value="completada">Completada</option>
				</select>
			</div>
			<button type="submit" class="bg-verde text-white py-2 px-4 rounded">
				{{ isEditing ? 'Actualizar' : 'Crear' }}
			</button>
			<button type="button" @click="clearForm" class="bg-gray-300 text-gray-700 py-2 px-4 rounded ml-2">Cancelar</button>
		</form>
	</div>
</template>

<script>
import axios from 'axios';

export default {
	data() {
		return {
			task: {
				id: null,
				titulo: '',
				descripcion: '',
				estado: 'pendiente' // Valor por defecto
			},
			isEditing: false
		};
	},
	methods: {
		async submitForm() {
			if (this.isEditing) {
				await axios.put(process.env.VUE_APP_API_URL, this.task);
			} else {
				await axios.post(process.env.VUE_APP_API_URL, this.task);
			}
			this.clearForm();
			this.$emit('form-submitted');
		},
		clearForm() {
			this.task = { id: null, titulo: '', descripcion: '', estado: 'pendiente' };
			this.isEditing = false;
		},
		editTask(task) {
			this.task = { ...task };
			this.isEditing = true;
		}
	}
};
</script>

<style scoped>
/* Estilos personalizados si es necesario */
</style>
