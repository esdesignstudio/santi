export const globalListener = () => {
    
}

export const scrollListener = (args) => {
    const isScrolled = useScrolled()
    const scrV = args.scroll.y
    
    if (scrV > 300) {
        isScrolled.value = true
    } else {
        isScrolled.value = false
    }
    // console.log('listen scroll', isScrolled.value)
}