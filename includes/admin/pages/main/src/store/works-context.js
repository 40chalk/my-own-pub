import React, {useEffect, useState} from "react";

const WorksContext = React.createContext({})

export const WorksContextProvider = (props) => {
    const [works, setWorks] = useState(null)
    const [universe, setUniverse] = useState(null)
    const [world, setWorld] = useState(null)
    const [series, setSeries] = useState(null)
    const [book, setBook] = useState(null)
    const [story, setStory] = useState(null)
    const [appendix, setAppendix] = useState(null)

    useEffect(() => {
        fetch('/wp-admin/admin-post.php?action=selectUniverse')
            .then(response => response.json())
            .then(data => setWorks(data))
    }, [])

    function selectUniverseHandler(event) {
        const selected = {
            id: event.target.value
        }
        setUniverse(works.find((universe) => universe.id === selected.id))
        console.log(selected)
    }

    return (
        <WorksContext.Provider value={{
            works: works,
            universe: universe,
            world: world,
            series: series,
            book: book,
            story: story,
            appendix: appendix,
            onSelectUniverse: selectUniverseHandler,
        }}>
            {props.children}
        </WorksContext.Provider>
    )
}

export default WorksContext