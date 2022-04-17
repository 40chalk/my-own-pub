import React, {useRef} from "react";
import classes from './App.module.css'

const App = () => {
    const universeName = useRef()
    function universeFormHandler(event) {
        event.preventDefault()
        const data = new FormData()

        data.append('name', universeName.current.value)

        fetch('/wp-admin/admin-post.php?action=createUniverse', {
            method: 'POST',
            credentials: 'same-origin',
            body: data
        }).then(response => console.log(response))
    }

   return (
        <div className={classes.test}>
            <form onSubmit={universeFormHandler}>
                <label htmlFor="universe">2Universe</label>
                <input name="universe" id="universe" type="text" ref={universeName}/>
                <button type="submit">Submit</button>
            </form>
        </div>
    );
}

export default App