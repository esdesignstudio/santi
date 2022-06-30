<template>
    <div>
        <!-- <div id="preloading">
            <div>
                <span>
                    <i>A</i><i>SLOGAN</i><i>FOR</i><i>LOADING</i>
                </span>
            </div>
        </div> -->
        <NuxtLayout name="default">
            <NuxtPage />
        </NuxtLayout>
    </div>
</template>
<style lang="scss">
// #preloading{
//     position: fixed;
//     top: 0;
//     left: 0;
//     width: 100%;
//     height: 100%;
//     background: #534f49;
//     transition: all 1s;
//     z-index: 9999;
//     color: #fff;
//     display: flex;
//     align-items: center;
//     justify-content: center;
//     transform-origin: 0 0;
//     transition: transform 1s cubic-bezier(0.76, 0, 0.24, 1);
//     div {
//         overflow: hidden;
//         span {
//             display: block;
//             font-size: 3rem;
//             i {
//                 opacity: 0;
//                 margin: 0 1rem;
//                 display: inline-block;
//                 animation: getIn 1s .3s both cubic-bezier(0.16, 1, 0.3, 1);
//                 &:nth-child(2) {
//                     animation-delay: .4s;
//                 }
//                 &:nth-child(3) {
//                     animation-delay: .5s;
//                 }
//                 &:nth-child(4) {
//                     animation-delay: .5s;
//                 }
//                 &:nth-child(5) {
//                     animation-delay: .6s;
//                 }
//             }
//         }
//     }
// }
// .landed #preloading {
//     pointer-events: none;
//     transform: scaleY(0);
//     div {
//         span {
//             opacity: 0 !important;
//         }
//     }
// }
// @keyframes getIn {
//     0% {
//         opacity: 0;
//         transform: translate3d(0, 100%, 0);
//     } 100% {
//         opacity: 1;
//         transform: translate3d(0, 0, 0);
//     }
// }
</style>