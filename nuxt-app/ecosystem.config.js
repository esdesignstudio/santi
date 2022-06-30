module.exports = {
	apps: [{
        name: 'NuxtTemplate',
        script: './.output/server/index.mjs', // Nuxt3 官網上面說的方式
		instances: 'max', // 負載平衡模式下的 cpu 數量
		exec_mode: 'cluster', // cpu 負載平衡模式
		max_memory_restart: '1G', // 緩存了多少記憶體重新整理
		env_prod: {
			name: 'Bolon_prod',
			PORT: 4001
		},
	}]
}