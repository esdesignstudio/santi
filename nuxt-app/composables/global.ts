import { Body } from "nuxt/dist/head/runtime/components"

export const ESinit = () => {
    const router = useRouter()
    const { hook } = useNuxtApp()
    const { $ESscroll } = useNuxtApp()
    const isScrolled = useScrolled()
    const menuOpen = useMenuopen()

    // 初始先聽一次
    setTimeout(() => {
        document.body.classList.add('landed')
        document.body.classList.add('isLoaded')
        $ESscroll.on('scroll', scrollListener)
    },1500)
    
    // 離開頁面
    router.beforeEach(() => {
        isScrolled.value = false
        $ESscroll.destroy()
        document.body.classList.remove('isLoaded')
        document.body.classList.add('isLoading')

        setTimeout(() => { // 讓點擊動畫盡量同步
            menuOpen.value = false
        }, 500)
    })

    // 進入頁面
    router.afterEach(() => {
        nextTick(() => {
            setTimeout(() => {
                $ESscroll.init()
                $ESscroll.on('scroll', scrollListener) 
                document.body.classList.remove('isLoading')
                document.body.classList.add('isLoaded')
                
            },1000)
        })
    })

}
export const useMenuopen = () => useState<boolean>('isMenuopen', () => false)
export const useScrolled = () => useState<boolean>('isScrolled', () => false)