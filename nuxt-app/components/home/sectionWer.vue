<template>
    <div class="paintwrapper">
        <div class="paintwrapper__wers">
            <div class="paintwrapper__wers__text"><img src="assets/img/index_dec.png" alt=""></div>
        </div>
        <div class="paintwrapper__animateitems">
            <div class="bird"><img src="assets/img/bird1.png" alt=""></div>
            <div class="bird2"><img src="assets/img/bird2.png" alt=""></div>
            <div class="bird3"><img src="assets/img/bird3.png" alt=""></div>
            <div class="bird4"><img src="assets/img/bird4.png" alt=""></div>
        </div>
    </div>
</template>
<style lang="scss">
.paintwrapper {
    width: 100vw;
    // margin: 5rem 0;
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
    &__animateitems{
        @include size(100%, 100%);
        &>div {
            z-index: 150;
            position: absolute;
            &.bird{
                top: 0;
                left: 20%;
                img{
                    width: 9.5vw;
                    // animation: updownInfi_S 2s infinite
                }
            }
            &.bird2{
                top: 4.5%;
                left: 44%;
                img{
                    width: 9.5vw;
                    // animation: updownInfi_S 2s infinite
                }
            }
            &.bird3{
                top: -4%;
                right: 23%;
                img{
                    width: 9.5vw;
                    // animation: updownInfi_S 2s infinite
                }
            }
            &.bird4{
                top: 1%;
                right: 10%;
                img{
                    width: 15vw;
                    // animation: updownInfi_S 2s infinite
                }
            }
        }
    }
}
</style>