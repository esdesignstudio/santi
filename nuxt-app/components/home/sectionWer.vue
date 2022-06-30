<template>
    <div class="paintwrapper">
        <div class="paintwrapper__wers">
            <div class="paintwrapper__wers__text"><img src="assets/img/index_dec.png" alt=""></div>
        </div>
    </div>
</template>
<style lang="scss">
.paintwrapper {
    width: 100vw;
    margin: 3rem 0;
    &__wers{
        display: flex;
        justify-content: center;
        &__text{
            width: 40vw;
        }
        img{
            @include size(100%, 100%);
        }
    }
}
</style>