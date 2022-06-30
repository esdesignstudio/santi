<template>
    <div class="page-index">
        <section>
            <HomeSectionWer />
            <HomeSectionIllu />
        </section>
	</div>
</template>
<script setup>
    const route = useRoute()


    useHead({
        title: '首頁 - BOLON 波龍藝術',
    })

    const { data: pageData } = useAsyncData('index', async () =>  {
        const res = await esFetch('/index');
        return res.data
    })


    onMounted(() => {
    })

    onUnmounted(() => {
    })

</script>
<style lang="scss">
    $class-name: page-index;
    .#{$class-name} {
        // @include size(100vw, 100vh);
        position: relative;
        section{
            margin: 300px 0 0;
        }
    }
</style>