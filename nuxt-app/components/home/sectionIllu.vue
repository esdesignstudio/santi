<template>
    <div class="paintwrapper">
        <div class="paintwrapper__ground">
            <img src="assets/img/basemap1.png" alt="">
            <img src="assets/img/basemap2.png" alt="">
            <img src="assets/img/basemap3.png" alt="">
            <img src="assets/img/basemap4.png" alt="">
        </div>
        <div class="paintwrapper__manyitems">
            <div class="item1">
                <img src="assets/img/01.png" alt="">
            </div>
            <div class="item2">
                <img src="assets/img/02.png" alt="">
            </div>
            <div class="item3">
                <img src="assets/img/03.png" alt="">
            </div>
            <div class="item4">
                <img src="assets/img/04.png" alt="">
            </div>
            <div class="item5">
                <img src="assets/img/05.png" alt="">
            </div>
            <div class="item6">
                <img src="assets/img/06.png" alt="">
            </div>
            <div class="item7">
                <img src="assets/img/07.png" alt="">
            </div>
            <div class="item8">
                <img src="assets/img/08.png" alt="">
            </div>
            <div class="item9">
                <img src="assets/img/09.png" alt="">
            </div>
            <div class="item10">
                <img src="assets/img/10.png" alt="">
            </div>
        </div>
        <div class="paintwrapper__animateitem">
            <div class="lightball">
                <img src="assets/img/ball.png" alt="">
            </div>
            <div class="light">
                <img src="assets/img/light.png" alt="">
            </div>
            <div class="bike">
                <img src="assets/img/bicyclist1.png" alt="">
            </div>
            <div class="bike2">
                <img src="assets/img/bicyclist2.png" alt="">
            </div>
            <div class="people">
                <img src="assets/img/people1.png" alt="">
            </div>
            <div class="bus">
                <img src="assets/img/bus.png" alt="">
            </div>
            <div class="buslight">
                <img src="assets/img/buslight.png" alt="">
            </div>
            <div class="car">
                <img src="assets/img/car1.png" alt="">
            </div>
            <div class="car2">
                <img src="assets/img/car2.png" alt="">
            </div>
            <div class="people2">
                <img src="assets/img/people2.png" alt="">
            </div>
            <div class="people3">
                <img src="assets/img/people3.png" alt="">
            </div>
        </div>
    </div>
</template>
<style lang="scss">
.paintwrapper {
    width: 100vw;
    &__ground {
        img{
            @include size(100%, 100%);
        }
    }
    &__manyitems{
        @include size(100%, 100%);
        &>div {
            position: absolute;
            &.item1{
               top: 9.5%;
               left: 22%;
               img{
                    width: 45vw;
               }
            }
            &.item2{
               top: 18%;
               right: 24%;
               img{
                    width: 25vw;
               }
            }
            &.item3{
               top: 20%;
               left: 45%;
               img{
                    width: 7vw;
               }
            }
            &.item4{
               top: 23.5%;
               left: 30%;
               img{
                    width: 15vw;
               }
            }
            &.item5{
               top: 30.2%;
               left: 48%;
               img{
                    width: 15vw;
               }
            }
            &.item6{
               top: 39%;
               left: 9.2%;
               img{
                    width: 21vw;
               }
            }
            &.item7{
               top: 44%;
               left: 48%;
               img{
                    width: 19vw;
               }
            }
            &.item8{
               top: 20.5%;
               right: 11.5%;
               img{
                    width: 8vw;
               }
            }
            &.item9{
               top: 77.5%;
               left: 30%;
               img{
                    width: 43vw;
               }
            }
            &.item10{
               top: 83.5%;
               left: 38.5%;
               img{
                    width: 24vw;
               }
            }
        }
    }
    &__animateitem {
        @include size(100%, 100%);
        &>div {
            position: absolute;
            &.lightball{
                top: 19.5%;
                right: 12.5%;
                img{
                    width: 3vw;
                    animation: updownInfi_S 2s infinite
                }
            }
            &.light{
                top: 22%;
                left: 36.5%;
                img{
                    width: 9.5vw;
                    animation: updownInfi_S 2s infinite
                }
            }
            &.bike{
                top: 13.3%;
                right: 25%;
                img{
                    width: 6.5vw;
                    animation: leftrightInfi 2s infinite
                }
            }
            &.bike2{
                top: 15.3%;
                right: 17%;
                img{
                    width: 6.5vw;
                    animation: leftrightInfi 2s .2s infinite
                }
            }
            &.people{
                top: 25%;
                right: 23%;
                img{
                    width: 7vw;
                    transform-origin: right bottom;
                    // animation: rotInfi 1s 5s infinite
                }
            }
            &.buslight{
                top: 59.2%;
                left: 33%;
                img{
                    width: 10vw;
                    animation: lights 1s infinite
                }
            }
            &.bus{
                top: 59%;
                left: 39%;
                img{
                    width: 30vw;
                }
            }
            &.car{
                top: 50.5%;
                left: 17%;
                img{
                    width: 16vw;
                    animation: leftrightInfi 2.5s .5s infinite
                }
            }
            &.car2{
                top: 50.5%;
                left: 39%;
                img{
                    width: 16vw;
                    animation: leftrightInfi 2.5s .6s infinite
                }
            }
            &.people2{
                top: 56.5%;
                left: 22%;
                img{
                    width: 11vw;
                }
            }
            &.people3{
                top: 63.5%;
                right: 17%;
                img{
                    width: 4.5vw;
                }
            }
        }
    }
}

@keyframes updownInfi_S {
    0% {
        transform: translateY(-.5rem);
    }
    50% {
        transform: translateY(.5rem);
    }
    100% {
        transform: translateY(-.5rem);
    }
}
@keyframes leftrightInfi {
    0% {
        transform: translateX(-.5rem);
    }
    50% {
        transform: translateX(.5rem);
    }
    100% {
        transform: translateX(-.5rem);
    }
}
@keyframes lights {
    0% {
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
    70% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
@keyframes rotInfi {
    0% {
        transform: rotate(0deg);
    }
    20% {
        transform: rotate(5deg);
    }
    30% {
        transform: rotate(0deg);
    }
    40% {
        transform: rotate(5deg);
    }
    60% {
        transform: rotate(0deg);
    }
}
</style>