import React from "react";
import classes from './App.module.css'
import AddNewUniverse from "./components/universe/AddNewUniverse/AddNewUniverse";

const App = () => {

   return (
        <div className={classes.test}>
            <AddNewUniverse />
        </div>
    );
}

export default App