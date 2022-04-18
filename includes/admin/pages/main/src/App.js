import React, {useEffect, useState} from "react";
import classes from './App.module.css'
import AddNewUniverse from "./components/universe/AddNewUniverse/AddNewUniverse";
import SelectUniverse from "./components/universe/SelectUniverse/SelectUniverse";
import WorksContext from "./store/works-context";

const App = () => {

    return (
            <div className={classes.test}>
                <AddNewUniverse/>
                <SelectUniverse/>
            </div>
    );
}

export default App