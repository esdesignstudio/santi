<template>
    <div id="wrapper" class="wrapper">
        <Header/>
        <main>
            <slot></slot>
        </main>
        <Footer/>
        <!-- <PageDev></PageDev> -->
    </div>
</template>

<script setup>
    const route = useRoute()

    let headerBlack = ref(false)

    watch(route, () => {
    })

    const setHeadColor = (name) => {
    }

    onMounted(() => {
    })
</script>
