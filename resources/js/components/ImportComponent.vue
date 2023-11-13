<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
				<input @click.prevent="getUsers" class="btn btn-primary" value="импорт пользователей">
				<div><strong>Всего: </strong><span>{{ totaling }}</span></div>
				<div><strong>Добавлено: </strong><span>{{ importing }}</span></div>
				<div><strong>Обновлено: </strong><span>{{ updating }}</span></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
		
		name: 'ImportComponent',
		
		data() {
			return {
				totaling: this.count,
				importing: 0,
				updating: 0,
			}
		},
		
		props: [
			'count',
		],
		
		methods: {
			getUsers() {
				axios.post('/api/importing', {start: 1})
					.then( res => {
						this.totaling = res.data.count_total,
						this.importing = res.data.count_insert,
						this.updating = res.data.count_update
					})
			}
		}
    }
</script>
