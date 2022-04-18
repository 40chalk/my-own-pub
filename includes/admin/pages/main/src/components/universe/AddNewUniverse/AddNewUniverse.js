import React, {useRef} from 'react';

const AddNewUniverse = () => {
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
        <form onSubmit={universeFormHandler}>
            <label htmlFor="universe">Universe</label>
            <input name="universe" id="universe" type="text" ref={universeName}/>
            <button type="submit">Submit</button>
        </form>
    );
};

export default AddNewUniverse;