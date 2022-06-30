export const useProjectsTerms = () => {
    const term = useState('term', () => reactive({
        color: [],
        category: [],
        products: [],
        specifications: [],
        bolon_studio: [],
        space: [],
        nation: [],
        area: [],
        searchText: '',
        empty: true,
    }))
    return {
        term
    }
}
